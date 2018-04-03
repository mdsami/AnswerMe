<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\Comment;
use AnswerMe\User;
use AnswerMe\CommentLike;
use AnswerMe\Post;
use DB;
class postComments extends Controller
{
  public function postComments(Request $request){
      try{

                  $validate=Validator::make($request->all(), [
                          'apiToken'=>'required|min:64',
                          'postID'=>'required|integer',
                          'page'=>'required|integer',
                          ]);
                  if($validate->fails())
                             return response()->json(['status'=>403]);


                   $user_chk=DB::select('SELECT count(*) as count from users
                                                   where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                                             if($user_chk[0]->count == 0)
                                                 return response()->json(['status'=>400]);

                    
                    $post_chk=DB::select('SELECT count(*) as count from posts where posts.id=?',[$request->postID]);           if($post_chk[0]->count == 0)  return response()->json(['status'=>402]);


                   $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);



                   //If the page = 1 increase the post no_views by 1.
                   if($request->page == 1){
                      $Post=Post::find($request->postID);
                      $Post->no_views=$Post->no_views+1;
                      $Post->save();
                    }




                   //get Comment
                   $comments=DB::select('SELECT
                                      comments.id as commentID,
                                      IF(comments.is_ghost ="0",users.id,NULL) as userID,
                                      IF(comments.is_ghost ="0",users.name,users.ghostName) as userName,
                                      IF(comments.is_ghost ="0",users.photo,ghost_images.imgUrl) as userImg,
                                      comments.content as content,
                                      UNIX_TIMESTAMP(comments.created_at) as time,
                                  (SELECT count(*) from comments_likes where
                                    comments_likes.comments_id=comments.id and comments_likes.type="like") as noLikes,
                                  (SELECT count(*) from comments_likes where
                                    comments_likes.comments_id=comments.id and comments_likes.type="dislike") as noUnlike,

                                  (SELECT count(*) from comments where 
                                     comments.id=comments.id and comments.users_id=?) as isOwner,
                             
                                  (SELECT  

                                    IF(count(*)=0,0,
                                    IF(comments_likes.type="like","1","2"))
                               
                                        from comments_likes where 
                                    comments_likes.users_id=? and
                                    comments_likes.comments_id=comments.id  ) like_status


                                   from comments
                                    inner join users on 
                                    users.id= comments.users_id 

                                    inner join ghost_images on 
                                    ghost_images.id=users.ghost_images_id



                                     where comments.posts_id=?
                                             order by noLikes DESC
                                             limit 20 offset ?
                                              ',[$user_info[0]->id,$user_info[0]->id,$request->postID,($request->page-1)*20]);
                    
                    if(count($comments) == 0)
                          return response()->json(['status'=>300]);

                      return response()->json(['status'=>200,'comments'=>$comments]);



       }catch(Exception $e) {
         return response()->json(['status' =>404]);
       }                    
   }

}