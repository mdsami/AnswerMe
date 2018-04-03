<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use AnswerMe\Post;
use AnswerMe\User;
use AnswerMe\Action;
use AnswerMe\PostLike;
use AnswerMe\PostShare;
use Illuminate\Validation\Rule;
class posts extends Controller
{
  public function posts(Request $request){
    try{

                $validate=Validator::make($request->all(), [
                        'apiToken'=>'required|min:64',
                        'page'=>'required|integer',
                        'lang'=>['required',Rule::in(['ar','en'])],
                        ]);
                if($validate->fails())
                           return response()->json(['status'=>403]);




              $user_chk=DB::select('SELECT count(*) as count from users
                                      where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                                if($user_chk[0]->count == 0)
                                    return response()->json(['status'=>400]);


                         

                         $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);




                        //   get the unwant posts and users 
                    $unwant_posts=DB::select('SELECT actions.target_users_id as user_id from actions where 
                                                actions.users_id=? and actions.type="hide_post"',[$user_info[0]->id]);
                   

                    $option="";
                    $WHERE="";
                   if(count($unwant_posts) !=0){

                   
                    foreach ($unwant_posts as $key) {
                            $option=$option.$key->user_id.',';
                    }
                      $option=substr($option,0,-1);
                     $WHERE="WHERE posts.users_id NOT in(".$option.")";
                     $option="  and posts.users_id NOT in(".$option.")";
                     }



                         //
                if($request->has('filter') == true){ 

                if ( $request->filter =='like')
                    $order_by= $WHERE."ORDER BY noLikes DESC"; 
                elseif ( $request->filter == 'view')
                    $order_by=$WHERE."ORDER BY posts.no_views";
                elseif ( $request->filter =='latest')
                    $order_by=$WHERE."ORDER BY posts.created_at DESC";
                else{
                    $validate=Validator::make($request->all(), [
                        'filter'=>'required|integer'
                    ]); 
                    if($validate->fails())
                               return response()->json(['status'=>407]);
                    $order_by="WHERE posts.categories_id=".$request->filter.$option;         
                }

              } elseif($request->has('filter') == false){


                  $followings=DB::select('SELECT
                       actions.target_users_id as id from actions
                         where actions.users_id=? and actions.type="follow"',[$user_info[0]->id]);

                    $string="";
                  foreach ($followings as $key ) {
                      $string=$string.$key->id.',';
                  }



                              $string=$string.$user_info[0]->id;



                    $order_by="WHERE posts.users_id in(".$string.") ".$option."  ORDER BY posts.created_at DESC ";
            


              } 
                               

                                     
                                                              


                                        
                    if($request->lang == "ar")
                  $catName="categories.name_ar";
              elseif($request->lang == "en")
                                  $catName="categories.name_en";
                  else return response()->json(['status'=>403]);
                  

                      
                      
                            $user_id=$user_info[0]->id;
                            $qry='SELECT

                                 posts.content as content ,
                                 (select count(*) from posts_likes where
                                   posts_likes.users_id='.$user_id.' and posts_likes.posts_id=posts.id) as isLiked,

                                 (SELECT COUNT(*) FROM posts a WHERE
                                  a.users_id='.$user_id.' and a.id=posts.id) as isOwner ,
                                
                                 (SELECT count(*) FROM posts_shares WHERE
                                   posts_shares.users_id='.$user_id.' and posts_shares.posts_id=posts.id) as isShared ,

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
                                    if(posts.is_ghost ="0",users.name,users.ghostName) as username,
                      '.$catName.'    as catName 
                                 FROM posts 

                                INNER JOIN users on 
                                   posts.users_id=users.id

                                INNER JOIN ghost_images on  
                                   users.ghost_images_id=ghost_images.id
                                   
                                inner join categories on 
                    categories.id=posts.categories_id   
                
                                                       
                                                            '.$order_by.'
                                                            limit 20 offset ? ';                  
                                              

                                          $posts=DB::select($qry,[($request->page-1)*20]);

                                          if(count($posts) == 0)
                                              return response()->json(['status'=>300]);


                                          return response()->json(['status'=>200,'posts'=>$posts]); 
                      




            


  

      }catch(Exception $e) {
        return response()->json(['status' =>404]);
      }
  }
}
