<?php

namespace AnswerMe\Http\Controllers\admin;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use DB;
class loadMorePostsController extends Controller
{

	public static function posts_createdat($user_id,$page){
		$posts=DB::select('SELECT 
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
							         JOIN categories on 
									categories.id=posts.categories_id
		 					WHERE posts.users_id=? ORDER BY posts.created_at DESC limit 20 offset ?',[$user_id,$page*20]);
		return $posts;
	}

	public static function posts_likes($user_id,$page = 0){
				$posts=DB::select('SELECT 
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
						 		WHERE posts.users_id=? ORDER BY likes DESC limit 20 offset ?',[$user_id,$page*20]);
		return $posts;
	} 


	public static function posts_shares($user_id,$page =0){
					$posts=DB::select('SELECT 
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
							 		WHERE posts.users_id=? ORDER BY share DESC limit 20 offset ?',[$user_id,$page*20]);
			return $posts;
	}
	


	public static function posts_views($user_id,$page=0){
					$posts=DB::select('SELECT 
						posts.id as id,
						posts.title as title,
						posts.content as content,
						posts.image as image,
						posts.is_ghost as is_ghost,
						posts.created_at as created_at,
						posts.no_views as no_views,
						categories.name_ar as cat_name,
							(SELECT COUNT(*) from posts_likes WHERE posts_likes.posts_id=posts.id) as likes,
							(SELECT COUNT(*) from posts_shares WHERE posts_shares.posts_id=posts.id) as share,
							(SELECT COUNT(*) from comments WHERE comments.posts_id=posts.id) as comments
							from posts
								 INNER JOIN categories on 
									categories.id=posts.categories_id
							 	WHERE posts.users_id=? ORDER BY no_views DESC limit 20 offset ?',[$user_id,$page*20]);
			return $posts;
	}






}
