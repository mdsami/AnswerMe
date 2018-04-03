<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;
use AnswerMe\Post;

use AnswerMe\Http\Controllers\admin\loadMorePostsController;
class PostsController extends Controller
{
	

	public function loadmore(Request $request){
				$user_id=$request->user_id;
				$page=$request->page;
				// type of createdat or likes or share or views
				$type=$request->type;
				if($type == "likes")
					return	$result=loadMorePostsController::posts_likes($user_id,$page);

				else if($type == "shares")
					return	$result=loadMorePostsController::posts_shares($user_id,$page);
				else if($type == "views") 
					return $result=loadMorePostsController::posts_views($user_id,$page);

				else if($type == "date")
					return $result=loadMorePostsController::posts_createdat($user_id,$page);
				else 
					return back()->with(['message'=>"برجاة التاكد من العملية المختارة للتصنيف"]);

	}

	public function getLikes(Request $request){
		$post_id=$request->id;
		$likes=DB::select('SELECT 
						posts_likes.users_id as user_id,
						users.name as name
					 FROM posts_likes
						INNER JOIN users on 
						posts_likes.users_id=users.id

					 WHERE posts_likes.posts_id=?',[$post_id]);
		return $likes;
	}

	public function getComment(Request $request){
		$post_id=$request->id;
		$comments=DB::select('SELECT 
							comments.id as id,
							comments.content as content,
							comments.is_ghost as is_ghost,
							comments.users_id as user_id,
							comments.created_at as created_at,
							users.name as user_name,
							users.photo as user_photo
						from comments
							INNER JOIN users on 
						    comments.users_id=users.id
						WHERE comments.posts_id=?',[$post_id]);
		return $comments;
	}

	public function getShare(Request $request){
		$post_id=$request->id;
		$shares=DB::select('SELECT 
							posts_shares.users_id as user_id,
							users.name as name
						from posts_shares
							INNER JOIN users on 
							users.id=posts_shares.users_id
						WHERE posts_shares.posts_id=?',[$post_id]);
		return $shares;
	}

	public function delete_post(Request $request){
			$post_id=$request->id;
			$post=Post::find($post_id);
			if(empty($post))
				return redirect('/adminpanel/Usermangemnt')->with(['message'=>'ﻻ يوجد منشور بهذة المواصفات']);
			$post->delete();
	}












}
