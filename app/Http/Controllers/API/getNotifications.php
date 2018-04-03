<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\User;
use AnswerMe\Notification;
use AnswerMe\UserNotification;
use DB;
class getNotifications extends Controller
{
    public function getNotifications(Request $request){
        try{

                    $validate=Validator::make($request->all(), [
                            'apiToken'=>'required|min:64',
                            'page'=>'required|integer',
                            ]);
                    if($validate->fails())
                               return response()->json(['status'=>403]);



                             $user_chk=DB::select('SELECT count(*) as count
                                                      from users
                                                    where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                             if($user_chk[0]->count == 0)
                                 return response()->json(['status'=>400]);





                               $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);


                            $notify_users=DB::select('SELECT
                                                  notify_users.notifications_id as notificationsID,
                                                  notify_users.is_seen as isSeen,
                                                  notifications.posts_id as post_id,
                                                  notifications.users_id as users_info,
                                                  notifications.is_ghost as isGhost,
                                                  notifications.type as type,
                                                  UNIX_TIMESTAMP(notifications.created_at) as time


                                                  from notify_users
                                                   INNER join notifications on 
                                                  notifications.id=notify_users.notifications_id

                                                   WHERE
                                                   notify_users.users_id=?

                                               
                                                  order by notifications.created_at DESC limit 20 offset ?
                                                   ',[$user_info[0]->id,($request->page-1)*20]);

                          

                            $result=[];

              $qry_post='SELECT 

                                   posts.content as content ,
                                  (select count(*) from posts_likes where
                                    posts_likes.users_id='.$user_info[0]->id.' and posts_likes.posts_id=posts.id) as isLiked,

                                   (SELECT COUNT(*) FROM posts a WHERE
                                    a.users_id='.$user_info[0]->id.' and a.id=posts.id) as isOwner ,
                                  
                                   (SELECT count(*) FROM posts_shares WHERE
                                     posts_shares.users_id='.$user_info[0]->id.' and posts_shares.posts_id=posts.id) as isShared ,

                                   posts.is_ghost as is_ghost,

                                   (SELECT COUNT(*) from comments WHERE comments.posts_id=posts.id) as noComments ,
                                   (SELECT COUNT(*) from posts_likes WHERE posts_likes.posts_id=posts.id) as noLikes ,
                                   (SELECT COUNT(*) from posts_shares WHERE posts_shares.posts_id=posts.id) as noShare ,
                                IF(posts.is_ghost ="0",users.photo,ghost_images.imgUrl) as photo,
                                   posts.id as postID,
                                     posts.image as postImage ,
                                   UNIX_TIMESTAMP(posts.created_at) as time,
                                     posts.title as title ,
                                   posts.users_id as userID ,
                                       if(posts.is_ghost ="0",users.name,users.ghostName) as username 
                                   FROM posts 

                                INNER JOIN users on 
                                  posts.users_id=users.id
                                  INNER JOIN ghost_images on  
                                  users.ghost_images_id=ghost_images.id
                                          where posts.id=?';

                            foreach ($notify_users as $key) {
                                 
                                   
                                    if($key->type =="follow"){}
                                      else { $post_info=DB::select($qry_post,[$key->post_id]); }




                                    $qry='SELECT
                                      IF('.$key->isGhost.' ="0",users.name,users.ghostName) as username,
                                      users.id as userID,
                                      IF('.$key->isGhost.' ="0",users.photo,ghost_images.imgUrl) as photo
                                     from users
                                      INNER JOIN ghost_images on  
                                      users.ghost_images_id=ghost_images.id
                                      WHERE users.id=?';


                                  $user_in=DB::select($qry,[$key->users_info]);
                                

                                  if($key->type == "follow"){
                                    $re=['time'=>$key->time,
                                         'isSeen'=>$key->isSeen,
                                         'action'=>$key->type
                                       
                                       ];
                                  }else{
                                     $re=['time'=>$key->time,
                                         'isSeen'=>$key->isSeen,
                                         'action'=>$key->type,
                                         
                                         'post'=>$post_info]; 
                                  }

                                  


                                    array_push($result,$re);

                $UserNotification=DB::update('update
                   notify_users set notify_users.is_seen=1
                     where notify_users.users_id=? and
                       notify_users.notifications_id=?',[$user_info[0]->id,$key->notificationsID]);

                            }



              if(count($result) == 0)
                  return response()->json(['status'=>300]);

                            return response()->json(['status'=>200,'notifications'=>$result]);










         }catch(Exception $e) {
              return response()->json(['status' =>404]);
         }                    
    }
}
