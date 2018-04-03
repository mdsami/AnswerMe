<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;

class policyTermsController extends Controller
{
 	public function index(){
 		$policy=DB::select('SELECT policy_terms_ar , policy_terms_en from app_settings');
 		
 			return view('admin.policy.index',compact('policy'));			
 	}

 	public function update_arabic(Request $request){
 		$app=DB::table('app_settings')->update(['policy_terms_ar'=>$request->content]);
 	}

 	public function update_english(Request $request){
 		$app=DB::table('app_settings')->update(['policy_terms_en'=>$request->content]);
 	}

 

}
