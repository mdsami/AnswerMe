<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use AnswerMe\User;
use AnswerMe\Post;
use Carbon\Carbon;
use AnswerMe\Action;
use AnswerMe\PostLike;
use AnswerMe\PostShare;
use Illuminate\Validation\Rule;

class userPosts extends Controller
{


  public function userPosts(Request $request){
    try{

                $validate=Validator::make($request->all(), [
                        'apiToken'=>'required|min:64',
                        'userID'=>'numeric',
                        'isGhost'=>Rule::in(['0','1']),
                        'page'=>'required|integer'
                        ]);
                if($validate->fails())
                           return response()->json(['status'=>403]);



                      $user_chk=DB::select('SELECT count(*) as count
                                               from users
                                             where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                      if($user_chk[0]->count == 0)
                          return response()->json(['status'=>400]);



                        $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);


                      if($request->has('userID')){
                          $userID_chk=DB::select('SELECT count(*) as count from users
                                       where users.id=? and users.is_active=1',[$request->userID]);
                        
                        if($userID_chk[0]->count == 0)
                return response()->json(['status'=>403]);
                          }



                         




                          $option= $option="posts.users_id=".$user_info[0]->id." and";
                          $user_id=$user_info[0]->id;

                          if($request->has('userID'))
                                $option="posts.users_id=".$request->userID." and";
                    
                          
                              $is_Ghost=0;
                              if($request->has('isGhost'))
                                  $is_Ghost=$request->isGhost;



            


            $qry='SELECT

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
                 users.photo as photo ,
                 posts.id as postsID,
                   posts.image as postImage ,
                 UNIX_TIMESTAMP(posts.created_at) as time,
                   posts.title as title ,
                 posts.users_id as userID ,
                     users.name as username 
                 FROM posts 

                          INNER JOIN users on 
                               posts.users_id=users.id
                         WHERE                     '.$option.'
                                            posts.is_ghost=?
                                            ORDER BY posts.created_at DESC
                                            limit 20 offset ?';                  
                              

                          $posts=DB::select($qry,[$is_Ghost,($request->page-1)*20]);

                          if(count($posts) == 0)
                              return response()->json(['status'=>300]);


                          return response()->json(['status'=>200,'posts'=>$posts]);

      }catch(Exception $e) {
        return response()->json(['status' =>404]);
      }
  }
  
}
