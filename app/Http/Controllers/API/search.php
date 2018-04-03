<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\User;
use AnswerMe\Post;
use AnswerMe\Category;
use Illuminate\Support\Facades\DB;
use AnswerMe\Action;
use AnswerMe\PostLike;
use AnswerMe\PostShare;
use Illuminate\Validation\Rule;


class search extends Controller
{
      public function search(Request $request){
        try{

                    $validate=Validator::make($request->all(), [
                            'apiToken'=>'required|min:64',
                            'keyword'=>'required|string',
                            'type'=>['required',Rule::in(['posts','sections'])],
                            'page'=>'required|integer',
                            'lang'=>['required',Rule::in(['ar','en'])],
                            ]);
                    if($validate->fails())
                               return response()->json(['status'=>403]);



                          $user_chk=DB::select('SELECT count(*) as count
                                                   from users
                                                 where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                          if($user_chk[0]->count == 0)
                              return response()->json(['status'=>400]);


                

                   $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);                      
                 
                          if($request->type == "posts"){
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
                              $option="  and posts.users_id NOT in(".$option.")";
                           
                              }








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
                                      WHERE                     
                                                                posts.title like  ?  '.$option.' 
                                                                ORDER BY posts.created_at DESC
                                                                limit 20 offset ?';                  
                                                  

                          $posts=DB::select($qry,['%'.$request->keyword.'%',
                                                                      ($request->page-1)*20]);

                                              if(count($posts) == 0)
                                                  return response()->json(['status'=>300]);


                                              return response()->json(['status'=>200,'posts'=>$posts]); 
                  

                          }elseif($request->type == "sections") {

                              if($request->lang == "ar")
                                    $type='categories.name_ar as category,';
                              elseif($request->lang == "en")
                                   $type='categories.name_en as category,';

                              

                              $qry='SELECT 

                                      '.$type.'
                                      categories.id  as categoryID,
                                      categories.hex_color as hexColor
                                    From categories where
                                      categories.name_ar like ? OR categories.name_en like ?  
                                         limit 20 offset ?
                                        ';

                         $categories=DB::select($qry,['%'.$request->keyword.'%','%'.$request->keyword.'%',($request->page-1)*20]);

                                if(count($categories) == 0)
                                      return response()->json(['status'=>300]);
                                    return response()->json(['status'=>200,'sections'=>$categories]);

                            
                          }





                


  

          }catch(Exception $e) {
            return response()->json(['status' =>404]);
          }
      }
}
