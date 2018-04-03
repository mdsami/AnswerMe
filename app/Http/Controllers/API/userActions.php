<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use AnswerMe\User;
use AnswerMe\Action;
use AnswerMe\Post;
use AnswerMe\Comment;
use AnswerMe\Notification;
use AnswerMe\UserNotification;
use DB;
use Illuminate\Validation\Rule;
use AnswerMe\Http\Controllers\API\userActions;
class userActions extends Controller
{






  public function userActions(Request $request){
      try{

                  $validate=Validator::make($request->all(), [
                     'apiToken'=>'required|min:64',
                     'action'=>['required',Rule::in(['follow','unfollow','hide_post','hide_suggest','block','unblock'])],
                          ]);
                  if($validate->fails())
                             return response()->json(['status'=>403]);


                 if($request->has('userID') == false && $request->has('postID') == false && $request->has('commentID')== false )    return response()->json(['status'=>403]);


                  $user_chk=DB::select('SELECT count(*) as count from users
                                    where users.apiToken=? and users.is_active=1',[$request->apiToken]);
                                  if($user_chk[0]->count == 0)
                                      return response()->json(['status'=>400]);

                 $user_info=DB::select('SELECT users.id as id from users where users.apiToken=?',[$request->apiToken]);




                 $user_target_id=0;

                        //get the user action 
                 if($request->has('userID') == true){
                      $user_chk_target=DB::select('SELECT  count(*) as count from users where users.id=?',[$request->userID]);
                      if($user_chk_target[0]->count == 0) return response()->json(['status'=>403]);
                      
                      $user_target_id=$request->userID; 
                 }
                 elseif ($request->has('postID') == true) {
                      //get post owner 
                      $post_owner=DB::select('SELECT posts.users_id as usersID ,count(*) as count from posts 
                                                  where posts.id=?',[$request->postID]);
                      if($post_owner[0]->count == 0)  return response()->json(['status'=>403]);
                       $user_target_id=$post_owner[0]->usersID;
                    }
                elseif ($request->has('commentID') == true) {
                      //get comment owner 
                      $comment_owner=DB::select('SELECT count(*) as count ,comments.users_id as usersID from comments
                                                      where comments.id=?',[$request->commentID]);  

                      if($comment_owner[0]->count == 0) return response()->json(['status'=>403]);
                      $user_target_id=$comment_owner[0]->usersID;                                  
                    }       else return response()->json(['status'=>404]);           










               
                 $user_chk_action=DB::select('SELECT
                                                actions.type as type from actions where
                                                actions.users_id=? and
                                                actions.target_users_id=?',[$user_info[0]->id,$user_target_id]);

           


                 if(count($user_chk_action) == 0){
                    
                      if($request->action == "unfollow" || $request->type == "unblock") 
                            return response()->json(['status'=>406]);

                    $this->create_action($user_info[0]->id,$user_target_id,$request->action);
                 
                    if($request->action == "follow")
                    $notify=userActions::create_notifcation($user_target_id,$user_info[0]->id);

             

                 }else{


                          

                      // ['follow','unfollow','hide_post','hide_suggest','block','unblock']

                          if($request->action == "follow") {
                                $result=userActions::chk_action($user_info[0]->id,$user_target_id,"follow");
                              
                                if($result == 1)  return response()->json(['status'=>406]);
                                $action=userActions::create_action($user_info[0]->id,$user_target_id,"follow");
                                $notify=userActions::create_notifcation($user_target_id,$user_info[0]->id);
                                
                          }elseif ($request->action =="unfollow" ) {
                                $result=userActions::chk_action($user_info[0]->id,$user_target_id,"follow");
                                if($result ==1) userActions::delete_action($user_info[0]->id,$user_target_id,"follow");
                                else return response()->json(['status'=>406]);
                          }elseif ($request->action == "hide_post") {
                             
                              $chk_action=userActions::chk_action($user_info[0]->id,$user_target_id,"hide_post");
                                if($chk_action == 1)
                                      return response()->json(['status'=>406]);  

                                $result=userActions::chk_action($user_info[0]->id,$user_target_id,"follow");
                               
                             
                                if($result == 1) userActions::update_action('follow',$user_info[0]->id,$user_target_id,"hide_post");
                                  else
                                  $action=userActions::create_action($user_info[0]->id,$user_target_id,"hide_post");
                                // create hide post action
                     
                          }elseif ($request->action == "hide_suggest") {
                              $chk_action=userActions::chk_action($user_info[0]->id,$user_target_id,"hide_suggest");
                                if($chk_action == 1)
                                      return response()->json(['status'=>406]);  

                                $action=userActions::create_action($user_info[0]->id,$user_target_id,"hide_suggest");      
                          }elseif ($request->action == "block") {
                                $chk_action=userActions::chk_action($user_info[0]->id,$user_target_id,"block");
                                  if($chk_action == 1)
                                        return response()->json(['status'=>406]);
                                  $action=userActions::create_action($user_info[0]->id,$user_target_id,"block");    
                          }elseif ($request->action == "unblock") {
                            $chk_action=userActions::chk_action($user_info[0]->id,$user_target_id,"block");
                              if($chk_action == 1) // delete action  block  
                                      userActions::delete_action($user_info[0]->id,$user_target_id,"block");
                              else    return response()->json(['status'=>406]);    
                          }





                 }       
                 return response()->json(['status'=>200]);

      }catch(Exception $e) {
        return response()->json(['status' =>404]);
      }                     
  }





  public function chk_action($user_id,$user_target_id,$action){

      $count=DB::select('SELECT count(*) as count from actions
       where  actions.users_id=? and
              actions.target_users_id=? and
              actions.type=?',[$user_id,$user_target_id,$action]);
      return $count[0]->count;
  
  }



 public function create_action($user_id,$user_target_id,$action){
    $insert_action=DB::insert('INSERT INTO actions (users_id,target_users_id,is_ghost,type,created_at) 
                                      VALUES (?,?,0,?,?)',[$user_id,$user_target_id,$action,Carbon::now()]);
 }




 public function create_notifcation($user_target_id,$user_id){
   $Notification=new Notification();
   $Notification->users_id=$user_target_id;
   $Notification->is_ghost=0;
   $Notification->type="follow";
   $Notification->created_at=Carbon::now();
   $Notification->save(); 

   $UserNotification=new UserNotification();
   $UserNotification->users_id=$user_id;
   $UserNotification->notifications_id=$Notification->id;
   $UserNotification->is_seen=0;
   $UserNotification->save();
 }


public function delete_action($user_id,$user_target_id,$action){
    $delete_action=DB::delete('DELETE from actions where actions.users_id=? and actions.target_users_id=? and actions.type=?',[$user_id,$user_target_id,$action]);
}


public function update_action($type_target,$user_id,$user_target_id,$action){
    $update_action=DB::update('UPDATE actions set type=? where actions.users_id=? and actions.target_users_id=? and actions.type=?',[$type_target,$user_id,$user_target_id,$action]);
}


}
