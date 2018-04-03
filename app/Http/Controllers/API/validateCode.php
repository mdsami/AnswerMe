<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use DB;
class validateCode extends Controller
{
 
  public function validateCode(Request $request){
        

        $validate=Validator::make($request->all(), [
                'code'=>'required|min:5',
                'email'=>'required|email',
                ]);


        if($validate->fails())
                   return response()->json(['status'=>403]);



        //in this api we just case Register , Forget Password:
        
        $user_chk=DB::select('SELECT count(*) as count,
                                      users.is_verified as is_verified,
                                      users.id as id   from users where users.email=?',[$request->email]);        
              if($user_chk[0]->count == 0)
                    return response()->json(['status'=>400]);
     

          $user=User::find($user_chk[0]->id);

    if($request->code !=$user->verificationCode)
            return response()->json(['status'=>405]);


              // in this case he just  Register
        if($user_chk[0]->is_verified == 0){
              $user=User::find($user_chk[0]->id);
              $user->is_verified=1;
              $user->verificationCode="";
              $user->save();
              return response()->json(['status'=>200,"apiToken"=>$user->apiToken]);
        }elseif ($user_chk[0]->is_verified == 1) {
                
                $tmp_apiToken=str_random(64);
                $user->tmpToken=$tmp_apiToken;
                $user->verificationCode="";
                $user->save();
                return response()->json(['status'=>200,"tmpToken"=>$tmp_apiToken]);
        }else  return response()->json(['status'=>403]);          
 











  }
}
