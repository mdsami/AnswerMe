<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use DB;
class getProfile extends Controller
{
  private $rules = [
    'apiToken'     => 'required|min:68|exists:users,apiToken',
    'userID'       => 'numeric|exists:users,id',
    'isGhost'      => 'in:0,1'
  ];

  private $messages = [
    'apiToken.required'     => 403,
    'apiToken.min'          => 405,
    'apiToken.exists'       => 400,

    'userID.numeric'        => 402,
    'userID.exists'         => 402,

    'isGhost.in'            => 403,
  ];

  public function getProfile(Request $request){
    $validator = Validator::make($request->all(), $this->rules, $this->messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}

    $user = User::where('apiToken', $request->apiToken)->first();
    if($user->is_active == 0){ return response()->json(['status'=>401]); }

    if($request->has('userID') == true){
      $user = User::find($request->userID);
    }


    $isGhost=0;
    if($request->has('isGhost') == true) $isGhost=$request->isGhost;

    $noFollowing = $user->Followings->Count();
    $noFollowers = $user->Followers->Count();
    $noPosts =DB::select('SELECT count(*) as count from posts where posts.users_id=? and posts.is_ghost=?',[$user->id,$isGhost]);

    return response()->json(['status'=>200, 'noFollowing'=>$noFollowing, 'noFollowers'=>$noFollowers, 'noPosts'=>$noPosts[0]->count]);
  }
}
