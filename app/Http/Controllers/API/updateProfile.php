<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use Validator;
use AnswerMe\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class updateProfile extends Controller
{
    
   


  public function updateProfile(Request $request){
  
   $apiToken = $request->apiToken;
     $rules = [
    'apiToken'  => 'required|min:68|exists:users,apiToken',
    'name'      => '',
    'ghostName' => '',
    'email'     => 'email',
    'email'      =>Rule::unique('users')->ignore($apiToken,'apiToken'),                            //|unique//:users,email,'.$apiToken.'.apiToken',
    'photo'     => 'image',
    ];

   $messages = [
    'apiToken.required' => 403,
    'apiToken.min'      => 405,
    'apiToken.exists'   => 400,

    'email.required'    => 403,
    'email.unique'      =>402,
    'email.email'       => 406,

    'photo.image'       => 407
  ];
  //dd($messages);
    $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()) {return response()->json(['status'=>(int)$validator->errors()->first()]);}

    $user = User::where('apiToken', $request->apiToken)->first();

    if($user->is_active == 0) return response()->json(['status'=>401]);

    if($request->name) $user->name = $request->name;
    if($request->ghostName) $user->ghostName = $request->ghostName;
    if($request->email) $user->email = $request->email;
    if($request->photo)
    {
     $extension=$request->photo->getClientOriginalExtension();
     $imageName =$request->photo->getFilename().'.'.$extension;
     $request->photo->move(public_path('/images/user'), $imageName);
     
     $user->photo =Request()->root().'/images/user/'. $imageName;
     $user->save();
    }



      /* $success=Storage::disk('public')->put("/ads/".$imageName, File::get($request->photo));*/
  

    $user->save();

    return response()->json(['status'=>200, 'imageURL'=> $user->photo]);
  }
}
