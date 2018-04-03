<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use User;
use Complain;
use DB;
class SuggestionsController extends Controller
{
	public function index(){
		$complain=DB::table('complains')
			->join('users','users.id','=','complains.users_id')
			->select('complains.id','complains.message','complains.image','complains.created_at','users_id','users.name')
			->paginate(5);
		return view('admin.suggestion.index',compact('complain'));		  	
	}


	public function delete_message(Request $request){
		$complain=DB::table('complains')
					->where('complains.id','=',$request->id)
					->delete();
		return $complain;			
	}



}
