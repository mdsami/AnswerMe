<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use AnswerMe\superadmins;
use DB;
use Illuminate\Support\Facades\Validator; 
use Hash;
class AdminsController extends Controller
{
	
			public function index(){
					$admins=superadmins::paginate(20);
				return view('admin.admins.index',compact('admins'));
			}


		


			public function insert(Request $request){
				
					 $chk_email=DB::select('select count(*) as count from SUPER_ADMIN where email=?',[$request->email]);
					 if($chk_email[0]->count !=0)
					 		return "<div class='alert alert-danger'>تاكد من عدم تكرار البريد اﻻلكتورني</div>";
					   $name=$request->name;
					   $email=$request->email;
					   $password=$request->password;
				
					   $admin=new superadmins();
					   $admin->name=$name;
					   $admin->password=Hash::make($request->newPassword);
					   $admin->email=$email;
					   $admin->save();
				return "<div class='alert alert-success'>تم اضافة مسئول جديد بنجاح</div>";
			}


		

			public function update(Request $request){						
		
					$user_chk=DB::select('select count(*) as count from SUPER_ADMIN where email=? and id !=?',[$request->email,$request->id]);

					if($user_chk[0]->count !=0)
							return "<div class='alert alert-danger'>تاكد من عدم تكرار البريد اﻻلكتروني المدخل</div>";
				       $email=$request->email;
				       $password=$request->password;
				       $admin=superadmins::find($request->id);
				  
				       $admin->email=$email;
				       if(strlen($password) != 0)
				       $admin->password=Hash::make($request->password);
				       $admin->save();
				       return "<div class='alert alert-success'>تم تعديل بيانات المسئول بنجاح</div>";
				}

			public function delete(Request $request){
				$admin=superadmins::find($request->id);
						if(count($admin) !=1)
					 return  "<div class='alert alert-danger'>تاكد من قيامك باختيار المسئول بطريقة صحيحة</div>";

					$admin->delete();
						return "<div class='alert alert-success'> تم حذف المسئول بنجاح </div>";

			}
	
}
