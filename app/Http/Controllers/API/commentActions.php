<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use AnswerMe\CommentLike;
use Illuminate\Validation\Rule;
use DB;
use Carbon\Carbon;
use AnswerMe\Notification;
use AnswerMe\UserNotification;
class commentActions extends Controller
{
        public function commentActions(Request $request){
            try{

                        $validate=Validator::make($request->all(), [
                                'apiToken'=>'required|min:64',
                                'commentID'=>'required|integer',
                                'action'=>['required',Rule::in(['like','dislike'])],
                                'isGhost'=>['required',Rule::in(['0','1'])],
                                ]);

                        if($validate->fails())
                                   return response()->json(['status'=>403]);

                         $user_chk=DB::select('SELECT count(*) as count
                                                       from users
                                                     where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                        if($user_chk[0]->count == 0)
                                  return response()->json(['status'=>400]);
             
                  $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);


                  $comments_chk=DB::select('SELECT count(*) as count from comments where comments.id=?',[$request->commentID]);
                  if($comments_chk[0]->count == 0)
                        return response()->json(['status'=>403]);
                

                  $comment_info=DB::select('SELECT 
                                                comments.posts_id as postID,
                                                comments.users_id as userID
                                                 from comments where comments.id=?',[$request->commentID]);








                        $like_chk=DB::select('SELECT count(*) as count from comments_likes where
                                                  comments_likes.users_id=? and comments_likes.comments_id=?',[$user_info[0]->id,$request->commentID]);

                    
                        if($like_chk[0]->count == 0){
                          $CommentLike=new CommentLike();
                          $CommentLike->users_id=$user_info[0]->id;
                          $CommentLike->comments_id=$request->commentID;
                          $CommentLike->type=$request->action;
                          $CommentLike->save();


                          if($request->action == "dislike"){

                    
                          $Notification=new Notification();
                          $Notification->users_id=$user_info[0]->id;
                          $Notification->is_ghost=$request->isGhost;
                          $Notification->type="unlike_comment";
                          $Notification->posts_id=$comment_info[0]->postID;
                          $Notification->created_at=Carbon::now();
                          $Notification->save();

                          $UserNotification=new UserNotification();
                          $UserNotification->users_id=$comment_info[0]->userID;
                          $UserNotification->notifications_id=$Notification->id;
                          $UserNotification->is_seen=0;
                          $UserNotification->save();

                          }
                            return response()->json(['status'=>200]);
                        }else{

                            $getType=DB::select('SELECT  comments_likes.type as type  from comments_likes where
                                                  comments_likes.users_id=? and comments_likes.comments_id=?',[$user_info[0]->id,$request->commentID]);

                              if($getType[0]->type == $request->action){
                                $delete=DB::delete('DELETE from comments_likes WHERE comments_likes.users_id=? and comments_likes.comments_id=?',[$user_info[0]->id,$request->commentID]);
                                  return response()->json(['status'=>200]);
                              }else{
                                
                                $action="";
                                if($getType[0]->type == "like") $action="dislike";
                                else if($getType[0]->type == "dislike")  $action="like"; 

                                $update=DB::update('update comments_likes set
                                    comments_likes.type=? where
                                    comments_likes.users_id=? and comments_likes.comments_id=? ',
                                    
                                    [ 
                                      $action,
                                      $user_info[0]->id,
                                      $request->commentID
                                    ]);


                             if($action == "dislike"){
                         
                                 $Notification=new Notification();
                                 $Notification->users_id=$user_info[0]->id;
                                 $Notification->is_ghost=$request->isGhost;
                                 $Notification->type="unlike_comment";
                                 $Notification->posts_id=$comment_info[0]->postID;
                                 $Notification->created_at=Carbon::now();
                                 $Notification->save();

                                 $UserNotification=new UserNotification();
                                 $UserNotification->users_id=$comment_info[0]->userID;
                                 $UserNotification->notifications_id=$Notification->id;
                                 $UserNotification->is_seen=0;
                                 $UserNotification->save();

                             }
                                return response()->json(['status'=>200]); 
                              }



                        }


             }catch(Exception $e) {
                  return response()->json(['status' =>404]);
             }               
        }
}
