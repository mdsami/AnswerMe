<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('register', 'API\register@register');
Route::any('policyTerms', 'API\policyTerms@policyTerms');
Route::any('ghostImages', 'API\ghostImages@ghostImages');
Route::any('validateCode', 'API\validateCode@validateCode');
Route::any('login', 'API\login@login');

Route::any('forgetPassword', 'API\forgetPassword@forgetPassword');
Route::any('changePassword', 'API\changePassword@changePassword');
Route::any('updatePassword', 'API\updatePassword@updatePassword');
Route::any('updateProfile', 'API\updateProfile@updateProfile');
Route::any('updatePhone', 'API\updatePhone@updatePhone');
Route::any('aboutUs', 'API\aboutUs@aboutUs');
Route::any('contactUs', 'API\contactUs@contactUs');
Route::any('addComplain', 'API\addComplain@addComplain');
Route::any('suggests', 'API\suggests@suggests');
Route::any('getFollowers', 'API\getFollowers@getFollowers');
Route::any('getFollowing', 'API\getFollowing@getFollowing');
Route::any('searchUsers', 'API\searchUsers@searchUsers');
Route::any('getProfile', 'API\getProfile@getProfile');
Route::any('userPosts', 'API\userPosts@userPosts');
Route::any('postInfo', 'API\postInfo@postInfo');
Route::any('postComments', 'API\postComments@postComments');
Route::any('categories', 'API\categories@categories');
Route::any('addPost', 'API\addPost@addPost');
Route::any('editPost', 'API\editPost@editPost');
Route::any('deletePost', 'API\deletePost@deletePost');
Route::any('postActions', 'API\postActions@postActions');
Route::any('commentActions', 'API\commentActions@commentActions');
Route::any('deleteComment', 'API\deleteComment@deleteComment');
Route::any('userActions', 'API\userActions@userActions');
Route::any('posts', 'API\posts@posts');
Route::any('getBlocked', 'API\getBlocked@getBlocked');
Route::any('search', 'API\search@search');
Route::any('getNotifications', 'API\getNotifications@getNotifications');
