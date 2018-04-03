<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\Action;
use AnswerMe\User;
use DB;
class suggests extends Controller
{

  public function suggests(Request $request){
      try{

                  $validate=Validator::make($request->all(), [
                          'apiToken'=>'required|min:64',
                          'keyword'=>'string|min:1',
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
                  
                  $users_hide_suggest=DB::select('SELECT actions.target_users_id as hide_id from actions where

                     actions.type="hide_posts" OR actions.type="follow"',[$user_info[0]->id]);





                   $option="";
                  if(count($users_hide_suggest) !=0){

                  
                   foreach ($users_hide_suggest as $key) {
                           $option=$option.$key->hide_id.',';
                   }
                     $option=$option.$user_info[0]->id;
                     $option="  and users.id NOT in(".$option.")";
                    }

                    print_r($users_hide_suggest);



                  if($request->has('keyword') == true){
                    $suggests=DB::select('SELECT users.id as userID,
                                                 users.name as name,
                                                 users.photo as photo  from users where users.name like ? '.$option.' limit 20 offset ?',['%'.$request->keyword.'%',($request->page-1)*20]);
                      if(count($suggests) == 0) return response()->json(['status'=>300]);

                    return response()->json(['status'=>200,'users'=>$suggests]);
                  

                  }else {

                 

                       $getFollowers=DB::select('SELECT actions.target_users_id as id from actions where actions.users_id=? and actions.type="follow"',[$user_info[0]->id]);


                        if(count($getFollowers) != 0){

                          $actions="";
                          foreach ($getFollowers as $key) 
                                  $actions=$actions.$key->id.',';
                          
                            $actions=substr($actions,0,-1);
                           $actions=" where actions.users_id  not IN(".$actions.")";
                           $getFloowing=DB::select('SELECT actions.target_users_id as id from actions '.$actions);


                          if(count($getFloowing) == 0) {
                               $suggest=suggests::getSuggest($user_info[0]->id,$option,$request->page);  
                                if(count($suggest) == 0) return response()->json(['status'=>300]);
                                    return response()->json(['status'=>200,'users'=>$suggest]);

                      }
                          else {

                            $_actions="";
                            foreach ($getFloowing as $key) 
                                    $_actions=$_actions.$key->id.',';
                            $_actions=$_actions.$user_info[0]->id;

                            $_actions=" users.id  IN(".$_actions.")  ".$option;

                            echo $_actions;
                                $suggests=DB::select('SELECT 
                                                           users.id as userID,
                                                           users.name as name,
                                                           users.photo as photo  from users where
                                                          
                                                          '.$_actions.' limit 20 offset ?',[($request->page-1)*20]);
                               

                                if(count($suggests) == 0) return response()->json(['status'=>300]);

                              return response()->json(['status'=>200,'users'=>$suggests]);

                              }
                        }else{
                         $suggest=suggests::getSuggest($user_info[0]->id,$option,$request->page);  
                          if(count($suggest) == 0) return response()->json(['status'=>300]);
                              return response()->json(['status'=>200,'users'=>$suggest]);
                        }

                      }


                  












      

      }catch(Exception $e) {
                     return response()->json(['status' =>404]);
      }                      
  }




  public function getSuggest($option,$page){
    $suggests=DB::select('SELECT 
                      users.id as userID,
                      users.name as name,
                      users.photo as photo  from users
                       where  '.$option.'                      
                                     limit 20 offset ?',[($page-1)*20]);
    return $suggests;
  }
}
