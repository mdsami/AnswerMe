<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;
class ContactUsController extends Controller
{
	public function index(){


		$contact_email=DB::select('SELECT contact_email  from app_settings');
		$phones=DB::select('SELECT * from contact_phones');
		return view('admin.contactUs.index',compact('contact_email'),compact('phones'));	
	}

	public function update_email(Request $request){
		$app=DB::table('app_settings')->update(['contact_email'=>$request->content]);
	}

	public function insert_phone(Request $request){
		$phone=DB::table('contact_phones')->insert(['phone'=>$request->content]);
	}



}
