<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use AnswerMe\Action;
use AnswerMe\Post;
use DB;
use Charts;
use Mail;
use AnswerMe\Admin;
use Hash;
class AdminpanelController extends Controller
{
	public function index(){

		$UserCount=DB::table('users')->count();
		$postsCount=DB::table('posts')->count();


		 $chartUsers=Charts::multiDatabase('line', 'highcharts')
		 	->dataset('المستخدمين',Action::all())
		 	->dataset('المنشورات',post::all())
			->title('العمليات اﻻسبوع الحالي')
			->elementLabel("Total")
			->dimensions(0, 0)
			->responsive(true)
			->colors(['#66bb6a ','red', '#66bb6a'])
			->lastByDay(7);


		$Users_actions=Charts::create('pie', 'highcharts')
				    ->title('اﻻحصائيات اﻻجمالية(المستخدمين : المنشورات)')
				    ->labels(['المستخدمين', 'المنشورات'])
				    ->values([$UserCount,$postsCount])
				    ->dimensions(1000,1000)
				    ->colors(['#66bb6a ','red', '#66bb6a'])
				    ->responsive(true);	





		$last_posts=DB::select('SELECT 
							posts.id as id,
				    		posts.title as title,
							posts.content as content,
							posts.image as image,
							posts.is_ghost as is_ghost,
		            		posts.created_at as created_at,
							categories.name_ar as cat_name,
							
							(SELECT COUNT(*) from posts_likes WHERE posts_likes.posts_id=posts.id) as likes,
							(SELECT COUNT(*) from posts_shares WHERE posts_shares.posts_id=posts.id) as share,
							(SELECT COUNT(*) from comments WHERE comments.posts_id=posts.id) as comments
						    	from posts
							        INNER JOIN categories on 
									categories.id=posts.categories_id
		 					   ORDER BY posts.created_at DESC limit 10');		    


		return view('admin.home.index',['chart' => $chartUsers,
										'Users_actions'=>$Users_actions,
										'last_posts'=>$last_posts]);
	}




	public function resetpassword(Request $request){
		$email=$request->email;
		
		$admin_chk=DB::select('SELECT count(*) as count from SUPER_ADMIN WHERE SUPER_ADMIN.email=?',[$email]);
			if($admin_chk[0]->count ==0)
					return redirect('/login')->with(['status'=>'ﻻ يوجد بريد  بهذة التفاصيل']);


				$user_info=DB::select('select * from SUPER_ADMIN WHERE SUPER_ADMIN.email=?',[$email]);

				$GLOBALS['email'] = $email;
				Mail::send('emails.adminpanel', ['user_info' => $user_info ], function ($message) {
				       $message->from('answerme@magdsoft.com', 'AdminpanelController');
				       $message->subject('forget password');
			 		   $message->to($GLOBALS['email']);
				      
				       });




				return redirect('/login')->with(['status'=>'برجاة التحقق من البريد اﻻلكتورني لتغير كلمة المرورو']);
				
	}


	public function create_password($remember_token){
			$user_chk=DB::select('SELECT count(*) as count from SUPER_ADMIN WHERE SUPER_ADMIN.remember_token=?',[$remember_token]);

			if($user_chk[0]->count == 0)
				return redirect('/login')->with(['status'=>'ﻻ يوجد بريد  بهذة التفاصيل']);


			return view('admin.admins.resetpassword',compact('remember_token'));

	}


	public function change_password(Request $request,$remember_token){
			$this->validate($request,[
				'password'=>'required|min:3',
				'password_con'=>'required|same:password|min:3'
			]);

			$user_chk=DB::select('SELECT count(*) as count from SUPER_ADMIN WHERE SUPER_ADMIN.remember_token=?',[$remember_token]);

			if($user_chk[0]->count == 0)
				return redirect('/login')->with(['status'=>'ﻻ يوجد بريد  بهذة التفاصيل']);


			$user_id=DB::select('select SUPER_ADMIN.id from SUPER_ADMIN WHERE SUPER_ADMIN.remember_token=?',[$remember_token]);

			$admin=Admin::find($user_id[0]->id);
			$admin->password=Hash::make($request->password);
			$admin->remember_token=str_random(64);
			$admin->save();
			return redirect('/login')->with(['status'=>'تم اعادة تعيين الرقم السري']);


	}



}
