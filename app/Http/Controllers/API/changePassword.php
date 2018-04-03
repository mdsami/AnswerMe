<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Hash;
use Validator;
use AnswerMe\User;
use DB;
class changePassword extends Controller
{

  public function changePassword(Request $request){

          $validate=Validator::make($request->all(), [
                  'tmpToken'=>'required|min:60',
                  'newPassword'=>'required|min:3',
                  ]);   


          if($validate->fails())
                     return response()->json(['status'=>403]);



       $tmpchk=DB::select('SELECT count(*) as count from users where users.tmpToken=?',[$request->tmpToken]);
          if($tmpchk[0]->count == 0)  return response()->json(['status'=>405]);





    $user = User::where('tmpToken', $request->tmpToken)->first();

    if($user->is_active == 0) return response()->json(['status'=>401]);

    $user->password = Hash::make($request->newPassword);
    $user->save();

    return response()->json(['status'=>200]);

  }
}
