<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;
use AnswerMe\User;
use AnswerMe\GhostImage;
use Illuminate\Validation\Rule;
use Hash;
class UsersMangemantController extends Controller
{
	public function index(){

		$users=DB::select('SELECT 
							users.id as id,
							users.name as name,
							users.is_active as is_active,
							users.photo as photo
					    	 from users limit 20');
			$GhostImage=GhostImage::all();
		return view('admin.users.index',compact('users'),compact('GhostImage'));
	}


	public function loadMore(Request $request){
	
		$page=$request->page;

		$users=DB::select('SELECT 
							users.id as id,
							users.name as name,
							users.is_active as is_active,
							users.photo as photo
					    	 from users limit 20 offset ?',[$page*20]);
	 	 return	$users;
	}


	public function edit_user($id){
		$chk_user=DB::select('SELECT count(*) as count from users where users.id=?',[$id]);
			if($chk_user[0]->count == 0)
					return redirect('/adminpanel/UsersMangemant')->with(['status'=>"ﻻ يوجد مستخدم بهذة البيانات"]);

			$user_info=User::find($id);
			$GhostImage=GhostImage::all();

			return view('admin.users.edit',compact('user_info'),compact('GhostImage'));
	}


	public function update_user(Request $request,$id){
		$chk_user=DB::select('SELECT count(*) as count from users where users.id=?',[$id]);
			if($chk_user[0]->count == 0)
					return redirect('/adminpanel/UsersMangemant')->with(['status'=>"ﻻ يوجد مستخدم بهذة البيانات"]);
		$this->validate($request, [
			'name'=>'required|min:3',
			'phone'=>'required|min:5|unique:users,phone,'.$id.',id|regex:/^[0-9]*$/',
			'email'=>'required|email|unique:users,email,'.$id.'id',
			'is_verified'=>['required',Rule::in(['1','0'])],
			'is_active'=>['required',Rule::in(['1','0'])],
			'ghostName'=>'required|min:3',
			'GhostImage'=>'required|integer',

		]);
		$name=$request->name;
		$phone=$request->phone;
		$email=$request->email;
		$is_verified=$request->is_verified;
		$is_active=$request->is_active;
		$ghostName=$request->ghostName;
		$GhostImage=$request->GhostImage;
		if(strlen($request->password) >=1){
			if(strlen($request->password) <3)
				return back()->with(['status'=>'تاكد من قيامك بادخال الرقم السري والتاكيد بالطريقة الصحيحة وان يكون ثﻻثة حروف فاكثر']);
			if ($request->password != $request->password_confir)
				return back()->with(['status'=>'تاكد من قيامك بادخال الرقم السري والتاكيد بالطريقة الصحيحة وان يكون ثﻻثة حروف فاكثر']);

			$hash=Hash::make($request->password);
		}
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$file=$request->file('photo');
		    if($file){
		            $extension =  $file->clientExtension();
		            if(in_array($extension,$allowedExts)){
		            		$file=$request->photo;
		            		$ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
		            		$file->move( public_path('uploades/users') , $ad_photo);
		            		$url=Request()->root().'/uploades/users/'.$ad_photo;	    
		       			}else
		       				return back()->with(['status'=>'برجاة اختيار الصور (gif,jpeg,jpg,png)']);

		         }
		$user=User::find($id); 
		$user->name=$name;
		$user->phone=$phone;
		$user->email=$email;
		$user->is_verified=$is_verified;
		$user->is_active=$is_active;
		$user->ghostName=$ghostName;
		$user->ghost_images_id=$GhostImage;
		if(strlen($request->password) >=3)
		$user->password=$hash;
		if($request->photo !="")
		$user->photo=$url;
		$user->save();    
		return redirect('/adminpanel/UsersMangemant')->with(['status'=>'تم تعديل بيانات المستخدم بنجاح']);    
	}


	public function add_users(){
			$GhostImage=GhostImage::all();
			return view('admin.users.add',compact('GhostImage'));
	}
	public function insert_user(Request $request){
		$this->validate($request, [
			'name'=>'required|min:3',
			'phone'=>'required|min:5|unique:users|regex:/^[0-9]*$/',
			'email'=>'required|email|unique:users|email',
			'is_verified'=>['required',Rule::in(['1','0'])],
			'is_active'=>['required',Rule::in(['1','0'])],
			'ghostName'=>'required|min:3',
			'GhostImage'=>'required|integer',
			'password'=>'required|min:3',
			'password_confir'=>'required|min:3|same:password',
			'photo'=>'required|image',
		]);
		$name=$request->name;
		$phone=$request->phone;
		$email=$request->email;
		$is_verified=$request->is_verified;
		$is_active=$request->is_active;
		$ghostName=$request->ghostName;
		$GhostImage=$request->GhostImage;
		$hash=Hash::make($request->password);
		$photo=$request->photo;
		$file=$request->photo;
		$ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
		$file->move( public_path('uploades/users') , $ad_photo);
		$url=Request()->root().'/uploades/users/'.$ad_photo;	    
		$user=new User();
		$user->name=$name;
		$user->phone=$phone;
		$user->email=$email;
		$user->is_verified=$is_verified;
		$user->is_active=$is_active;
		$user->ghostName=$ghostName;
		$user->ghost_images_id=$GhostImage;
		$user->password=$hash;
		$user->apiToken=str_random(64);
		$user->photo=$url;
		$user->save();
		return redirect('/adminpanel/UsersMangemant')->with(['status'=>'تم اضافة مستخدم جديد بنجاح']);   
	}


	public function search_info(Request $request ){
		$users=DB::select('SELECT 
								users.id as id,
								users.name as name,
								users.is_active as is_active,
								users.photo as photo
								 from users
									WHERE
									  users.name LIKE ? or 
									  users.ghostName LIKE ? or 
								 	  users.phone LIKE ? or 
									  users.email LIKE ?',[ '%'.$request->content.'%',
															'%'.$request->content.'%',
												    		'%'.$request->content.'%',
													    	'%'.$request->content.'%']);
		return $users;
	}
	public function edit_ghost($id){
		$ghost_info=GhostImage::find($id);
		if (empty($ghost_info))
			return redirect('adminpanel/UsersMangemant')->with(['status'=>"ﻻ يوجد معلومات عن صورة الشبح المختارة"]);
		return view('admin.ghost.edit',compact('ghost_info'));
	}


	public function update_ghost(Request $request,$id){
	
		$this->validate($request, [
			'image'=>'required|image'
		]);		
		$ghost_info=GhostImage::find($id);
			if(empty($ghost_info))
			return redirect('/adminpanel/UsersMangemant')->with(['status'=>"ﻻ يوجد معلومات عن صورة الشبح المختارة"]);
		$file=$request->image;
		$ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
		$file->move( public_path('uploades/ghost') , $ad_photo);
		$url=Request()->root().'/uploades/ghost/'.$ad_photo;
		$ghost_info->imgUrl=$url;
		$ghost_info->save();
		return back()->with(['status'=>'تم التعديل بنجاح']);
	}


	public function index_ghost(){
		$GhostImage=GhostImage::all();
		return view('admin.ghost.index',compact('GhostImage'));
	}

	public function insert_ghost(Request $request){
	

		$this->validate($request, [
			'image'=>'required|image'
		]);	

		$ghost_info=new GhostImage();
		$file=$request->image;
		$ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
		$file->move( public_path('uploades/ghost') , $ad_photo);
		$url=Request()->root().'/uploades/ghost/'.$ad_photo;
		$ghost_info->imgUrl=$url;
		$ghost_info->save();
		return back()->with(['status'=>'تم اﻻضافة بنجاح']);
	}


	public function user_profile($id){

		$user_chk=User::find($id);
			if(count($user_chk) ==0 )
					return redirect('adminpanel/UsersMangemant')->with('ﻻ يوجد مستخدم بهذة البيانات');

		$user_profile=DB::select('SELECT
									users.id as id ,
									users.name as name,
									users.phone as phone,
									users.email as email,
									users.photo as photo,
									users.is_verified as is_verified,
									users.is_active as is_active,
									users.ghostName as ghostName,
									users.created_at as created_at
							    	 from users where users.id=?',[$id]);
		$user_info=DB::select('
				SELECT
				(SELECT COUNT(*) from actions WHERE actions.target_users_id=? and actions.type="follow") as followers,
				(SELECT COUNT(*) from actions WHERE actions.users_id=? AND actions.type="follow") as following,
				(SELECT count(*) from actions WHERE actions.users_id=? and actions.type="block") as block',[$id,$id,$id]);
		$following=DB::select('SELECT	
			   			    actions.target_users_id as id,
					    	users.name as name,
							users.photo as photo
			  		from actions
						INNER JOIN users on 
						actions.target_users_id=users.id
			 WHERE actions.users_id=? AND actions.type="follow"',[$id]);


		$followers=DB::select('SELECT	
			   			    actions.users_id as id,
					    	users.name as name,
							users.photo as photo
			  		from actions
						INNER JOIN users on 
						actions.target_users_id=users.id
			 WHERE actions.target_users_id=? AND actions.type="follow"',[$id]);


		$block=DB::select('SELECT	
			   			    actions.target_users_id as id,
					    	users.name as name,
							users.photo as photo
			  		from actions
						INNER JOIN users on 
						actions.users_id=users.id
				 WHERE actions.users_id=? AND actions.type="block"',[$id]);




		$posts=loadMorePostsController::posts_createdat($id,0);





		$arrayName = array('user_profile' =>$user_profile ,
							'user_info'=>$user_info,
							'following'=>$following,
							'followers'=>$followers,
							'block'=>$block,
							'posts'=>$posts);


		return view('admin.users.profile',compact('arrayName'));
	}





	public function delete_user(Request $request){
		$user=User::find($request->user_id);
		if(empty($user))
			return redirect('/adminpanel/UsersMangemant')->with(['status'=>'ﻻ يوجد مستخدم بهذة البيانات']) ;
		$user->delete();
		return redirect('/adminpanel/UsersMangemant')->with(['status'=>'تم حذف المستخدم']) ;
	}


	public function disactive_user(Request $request){
		$user=User::find($request->user_id);
		$user->is_active=0;
		$user->save();
	}

	public function active_user(Request $request){
		$user=User::find($request->user_id);
		$user->is_active=1;
		$user->save();
	}





	









}
