<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use AnswerMe\User;
use AnswerMe\Complain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class addComplain extends Controller
{
  private $rules = [
    'apiToken' => 'required|min:68|exists:users,apiToken',
    'message'  => 'required',
    'image'    => 'image',
    ];

  private $messages = [
    'apiToken.required'     => 403,
    'apiToken.min'          => 405,
    'apiToken.exists'       => 400,
    'message.required'      => 403,
    'image.image'           => 406
  ];

  public function addComplain(Request $request){
    $validator = Validator::make($request->all(), $this->rules, $this->messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}

    $user = User::where('apiToken', $request->apiToken)->first();
    if($user->is_active == 0) return response()->json(['status'=>401]);

    $complain = new Complain;
    $complain->message = $request->message;
    $complain->users_id = $user->id;
    $complain->created_at = Carbon::now();
    if($request->file('image')){

     $file=$request->image;
     $file_name = str_random(30) . '.' . $file->getClientOriginalExtension();
     $file->move( public_path('uploades/complains/').'' , $file_name); 
     $cv_url=Request()->root().'/uploades/complains/'.$file_name;  
     $complain->image=$cv_url;
              }
    $complain->save();

    return response()->json(['status'=>200]);

  }
}
