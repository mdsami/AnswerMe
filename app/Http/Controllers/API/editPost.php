<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use AnswerMe\Post;

class editPost extends Controller
{
  private $rules = [
    'apiToken'      => 'required|min:68|exists:users,apiToken,is_active,1',
    'postID'        => 'required|exists:posts,id',
    'title'         => '',
    'content'       => '',
    'image'         => 'image',
    ];

  private $messages = [
    'apiToken.required'     => 403,
    'apiToken.min'          => 405,
    'apiToken.exists'       => 400,

    'postID.required'       => 403,
    'postID.exists'         => 403,

    'title.required'        => 403,
    'image.image'           => 406,
  ];

  public function editPost(Request $request){
    $validator = Validator::make($request->all(), $this->rules, $this->messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}
    if(!$request->title && !$request->content && !$request->image){ return response()->json(['status'=>403]); }

    $user = User::where('apiToken', $request->apiToken)->first();

    $post = Post::find($request->postID);
    if($post->users_id != $user->id){ return response()->json(['status'=>402]); }

    if($request->title)   $post->title = $request->title;
    if($request->content) $post->content = $request->content;
    if($request->file('image')){
        $file=$request->image;
        $ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
        $file->move( public_path('/images/post') , $ad_photo);
        $url=Request()->root().'/images/post/'.$ad_photo;     
        $post->image=$url;
    } 
    $post->save();

    return response()->json(['status'=>200]);
  }
}
