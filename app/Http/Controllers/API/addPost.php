<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\User;
use AnswerMe\Post;
use DB;
use AnswerMe\Notification;
use AnswerMe\UserNotification;
class addPost extends Controller
{
  private $rules = [
    'apiToken'      => 'required|min:68|exists:users,apiToken,is_active,1',
    'isGhost'       => 'required|in:0,1',
    'categoryID'    => 'required|exists:categories,id',
    'title'         => 'required',
    'content'       => '',
    'image'         => 'image',
    ];

  private $messages = [
    'apiToken.required'     => 403,
    'apiToken.min'          => 405,
    'apiToken.exists'       => 400,

    'isGhost.required'      => 403,
    'isGhost.in'            => 406,

    'categoryID.required'   => 403,
    'categoryID.exists'     => 403,

    'title.required'        => 403,
    'image.image'           => 406,
  ];

  public function addPost(Request $request){
    $validator = Validator::make($request->all(), $this->rules, $this->messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}
    if(!$request->content && !$request->image){ return response()->json(['status'=>403]); }

    $user = User::where('apiToken', $request->apiToken)->first();

    $post = new Post;
    $post->users_id = $user->id;
    $post->is_ghost = $request->isGhost;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->categories_id = $request->categoryID;
    $post->created_at = Carbon::now();

    if($request->file('image')){
    $file=$request->image;
    $ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
    $file->move( public_path('/images/post') , $ad_photo);
    $url=Request()->root().'/images/post/'.$ad_photo;     
    $post->image=$url;
    }    
    $post->save();


    $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);
       

        $getFollowers=DB::select('SELECT actions.users_id as id  FROM actions where actions.target_users_id=?  and actions.type="follow"',[$user_info[0]->id,$request->isGhost]);


        if(count($getFollowers) == 0)
                return response()->json(['status'=>200, 'postID'=>$post->id]);



        $Notification=new Notification();
        $Notification->users_id=$user_info[0]->id;
        $Notification->is_ghost=$request->isGhost;
        $Notification->type="add_post";
        $Notification->posts_id=$post->id;
        $Notification->created_at=Carbon::now();
        $Notification->save();

        foreach ($getFollowers as $key) {
        $UserNotification=new UserNotification();
        $UserNotification->users_id=$key->id;
        $UserNotification->notifications_id=$Notification->id;
        $UserNotification->is_seen=0;
        $UserNotification->save();                
        }


    return response()->json(['status'=>200, 'postID'=>$post->id]);
  }
}
