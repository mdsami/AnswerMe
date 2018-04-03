<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;
class AboutUsController extends Controller
{
	public function index(){
		$about=DB::select('SELECT about_us_ar , about_us_en from app_settings');
			return view('admin.aboutus.index',compact('about'));			
	}


	public function update_arabic(Request $request){
		$app=DB::table('app_settings')->update(['about_us_ar'=>$request->content]);
	}

	public function update_english(Request $request){
		$app=DB::table('app_settings')->update(['about_us_en'=>$request->content]);	
	}



}
