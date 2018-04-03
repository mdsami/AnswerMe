<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use AnswerMe\Action;

class getFollowers extends Controller
{
  private $rules = [
    'apiToken'      => 'required|min:68|exists:users,apiToken',
    'page'          => 'numeric|min:1'
    ];

  private $messages = [
    'apiToken.required'     => 403,
    'apiToken.min'          => 405,
    'apiToken.exists'       => 400,

    'page.numeric'          => 404,
    'page.min'              => 404,
  ];

  public function getFollowers(Request $request){
    $validator = Validator::make($request->all(), $this->rules, $this->messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}

    $user = User::where('apiToken', $request->apiToken)->first();
    if($user->is_active == 0){ return response()->json(['status'=>401]); }

  $followers = array();
  if(isset($request->keyword) && !empty($request->keyword)){
  	$followers = Action::select('id AS userID', 'name', 'photo')
                      ->where('target_users_id', $user->id)->where('type', 'follow')
    				  ->where('name','LIKE', '%'.$request->keyword.'%')
                      ->join('users', 'actions.users_id', '=', 'users.id')
                      ->orderBy('name')
                      ->paginate(20);
  }else{
  	$followers = Action::select('id AS userID', 'name', 'photo')
                      ->where('target_users_id', $user->id)->where('type', 'follow')
                      ->join('users', 'actions.users_id', '=', 'users.id')
                      ->orderBy('name')
                      ->paginate(20);
  }
    
  foreach($followers as $follower){
  	$follower['isFollowing'] = Action::where('users_id',$user->id)->where('target_users_id',$follower['userID'])->first() != null;
  }

    if($followers->items() == NULL) return response()->json(['status'=>300]);
    return response()->json(['status'=>200, 'followers'=>$followers->items() ]);
  }
}
