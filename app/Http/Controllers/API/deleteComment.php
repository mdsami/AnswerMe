<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use AnswerMe\Comment;
use DB;
class deleteComment extends Controller
{


  public function deleteComment(Request $request){

    try{

                $validate=Validator::make($request->all(), [
                        'apiToken'=>'required|min:64',
                        'commentID'=>'required|integer',
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

     

          $comment_chk_valid=DB::select('SELECT count(*) as count FROM comments
                                             INNER JOIN posts on 
                                                comments.posts_id=posts.id
                                             WHERE
                                                   comments.id=? and 
                                                   ( comments.users_id=? OR
                                                     posts.users_id=?)' ,[$request->commentID,$user_info[0]->id,$user_info[0]->id]);
          if($comment_chk_valid[0]->count == 0)
                return response()->json(['status'=>402]);


          $delete=DB::delete('DELETE from comments WHERE comments.id=?',[$request->commentID]);    

          return response()->json(['status'=>200]);






    }catch(Exception $e) {
                   return response()->json(['status' =>404]);
    }       
  }
}
