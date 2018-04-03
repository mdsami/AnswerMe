<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\Post;
use AnswerMe\User;
use AnswerMe\Comment;
use AnswerMe\PostLike;
use AnswerMe\PostShare;
use AnswerMe\Action;
use DB;
use AnswerMe\Notification;
use Illuminate\Validation\Rule;
use AnswerMe\UserNotification;
class postActions extends Controller
{
  public function postActions(Request $request){
      try{

                  $validate=Validator::make($request->all(), [
                          'apiToken'=>'required|min:64',
                          'postID'=>'required|integer',
                          'isGhost'=>['required',Rule::in(['0','1'])],
                          'comment'=>'string|min:2',
                          'action'=>['required',Rule::in(['like','share','comment'])],
                          ]);
                  if($validate->fails())
                             return response()->json(['status'=>403]);



                   if($request->action == 'comment')
                      if($request->has('comment') == false) 
                          return response()->json(['status'=>403]);       



                   $user_chk=DB::select('SELECT count(*) as count
                                            from users
                                          where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                   if($user_chk[0]->count == 0)
                       return response()->json(['status'=>400]);


                  $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);



                    $post_info=DB::select('SELECT 
                                            posts.users_id as users_id,
                                            posts.is_ghost as is_ghost,
                                            count(*) as count
                                             from posts where posts.id=?',[$request->postID]);
                    if($post_info[0]->count == 0)  return response()->json(['status'=>403]);



                    $chk_block=DB::select('SELECT count(*) as count from actions where
                     actions.users_id=? and
                     actions.target_users_id=?  and
                     actions.is_ghost=?         and
                     actions.type="block"
                     ',[$post_info[0]->users_id,$user_info[0]->id,$request->isGhost]);

                      if($request->action == "comment")
                          if($chk_block[0]->count >=1) return response()->json(['status'=>402]);




                    if($request->action == "like"){
                        $like_chk=DB::select('SELECT count(*) as count from posts_likes where 
                              posts_likes.users_id=? and posts_likes.posts_id=?',[$user_info[0]->id,$request->postID]);
                              if($like_chk[0]->count >= 1) {
                                  $delete=DB::delete('DELETE FROM posts_likes where
                                    posts_likes.users_id=? and posts_likes.posts_id=?',
                                    [$user_info[0]->id,$request->postID]);

                              } else{
                         $PostLike=new PostLike();
                         $PostLike->users_id=$user_info[0]->id;
                         $PostLike->posts_id=$request->postID;
                         $PostLike->save();
                         }
                   
                    }elseif ($request->action == "share") {
                         $share_chk=DB::select('SELECT count(*) as count from posts_shares where 
                            posts_shares.users_id=? and posts_shares.posts_id=?',[$user_info[0]->id,$request->postID]);
                                if($share_chk[0]->count >= 1)  return response()->json(['status'=>200]);

                          $PostShare=new PostShare();  
                          $PostShare->users_id=$user_info[0]->id;
                          $PostShare->posts_id=$request->postID;
                          $PostShare->save();  

                 
                    }elseif ($request->action == "comment") {
                        $Comment=new Comment();
                        $Comment->content=$request->comment;
                        $Comment->is_ghost=$request->isGhost;
                        $Comment->created_at=Carbon::now();
                        $Comment->users_id=$user_info[0]->id;
                        $Comment->posts_id=$request->postID;
                        $Comment->save();
                    } else return response()->json(['status'=>404]);       



                    //notify the owner post and 
                    //make notifcation



                    if($user_info[0]->id == $post_info[0]->users_id){
                        if($request->action == "comment")
                            return response()->json(['status'=>200,'commentID'=>$Comment->id]);

                        return response()->json(['status'=>200]);
                    }


                    $Notification=new Notification();
                    $Notification->users_id=$user_info[0]->id;
                    $Notification->is_ghost=$request->isGhost;
                    $Notification->type=$request->action;
                    $Notification->posts_id=$request->postID;
                    $Notification->created_at=Carbon::now();
                    $Notification->save();

                    $UserNotification=new UserNotification();
                    $UserNotification->users_id=$post_info[0]->users_id;
                    $UserNotification->notifications_id=$Notification->id;
                    $UserNotification->is_seen=0;
                    $UserNotification->save();



                    if($request->action == "comment")
                        return response()->json(['status'=>200,'commentID'=>$Comment->id]);

                    return response()->json(['status'=>200]);







      }catch(Exception $e) {
           return response()->json(['status' =>404]);
      }                         
  }
}
