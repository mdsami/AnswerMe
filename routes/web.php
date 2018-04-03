<?php

Route::get('/', function () { return view('welcome'); });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('DashboardIndex');


Route::post('/resetpassword','admin\AdminpanelController@resetpassword');
Route::get('/resetPassword/{remember_token}','admin\AdminpanelController@create_password');
Route::post('/passwordChange/{remember_token}','admin\AdminpanelController@change_password');

Route::group(['middleware' => 'auth'], function () {

		Route::get('/home','admin\AdminpanelController@index');
		Route::get('/adminpanel/UsersMangemant','admin\UsersMangemantController@index');
		Route::post('/adminpanel/loadUser','admin\UsersMangemantController@loadMore');
		Route::get('/adminpanel/UsersMangemant/edit/{id}','admin\UsersMangemantController@edit_user');
		Route::post('/adminpanel/UsersMangemant/updateUser/{id}','admin\UsersMangemantController@update_user');
		Route::get('/adminpanel/UsersMangemant/add','admin\UsersMangemantController@add_users');
		Route::post('/adminpanel/UsersMangemant/insert','admin\UsersMangemantController@insert_user');
		Route::post('/adminpanel/search','admin\UsersMangemantController@search_info');
		Route::get('/adminpanel/UsersMangemant/profile/{id}','admin\UsersMangemantController@user_profile');
		Route::post('/adminpanel/UsersMangemant/delete_user','admin\UsersMangemantController@delete_user');
		Route::post('/adminpanel/UsersMangemant/disactive','admin\UsersMangemantController@disactive_user');
		Route::post('/adminpanel/UsersMangemant/active','admin\UsersMangemantController@active_user');
		Route::get('/adminpanel/UsersMangemant/GhostImage/edit/{id}','admin\UsersMangemantController@edit_ghost');
		Route::post('/adminpanel/UsersMangemant/insertghost','admin\UsersMangemantController@insert_ghost');
		Route::post('/adminpanel/UsersMangemant/update/{id}','admin\UsersMangemantController@update_ghost');
		Route::get('/adminpanel/GhostImage','admin\UsersMangemantController@index_ghost');
		Route::get('/adminpanel/suggestions','admin\SuggestionsController@index');
		Route::post('/adminpanel/suggestions/delete','admin\SuggestionsController@delete_message');
		Route::get('/adminpanel/policy_terms','admin\policyTermsController@index');
		Route::post('/adminpanel/suggestions/update/arabic','admin\policyTermsController@update_arabic');
		Route::post('/adminpanel/suggestions/update/english','admin\policyTermsController@update_english');
		Route::get('/adminpanel/contactUs','admin\ContactUsController@index');
		Route::post('/adminpanel/contact_us/update/email','admin\ContactUsController@update_email');
		Route::post('/adminpanel/contact_us/insert_phone','admin\ContactUsController@insert_phone');
		Route::get('/adminpanel/aboutUs','admin\AboutUsController@index');
		Route::post('/adminpanel/aboutUs/update_arabic','admin\AboutUsController@update_arabic');
		Route::post('/adminpanel/aboutUs/update_english','admin\AboutUsController@update_english');
		Route::post('/adminpanel/UsersMangemant/profile/postsLoad','admin\PostsController@loadmore');
		Route::post('/adminpanel/UsersMangemant/profile/getLikes','admin\PostsController@getLikes');
		Route::post('/adminpanel/UsersMangemant/profile/getComment','admin\PostsController@getComment');
		Route::post('/adminpanel/UsersMangemant/profile/getShare','admin\PostsController@getShare');
		Route::post('/adminpanel/UsersMangemant/profile/delete_post','admin\PostsController@delete_post');
		Route::get('/adminpanel/admins','admin\AdminsController@index');
		Route::post('/adminpanel/admins/insert','admin\AdminsController@insert');
		Route::post('/adminpanel/admins/update','admin\AdminsController@update');
		Route::post('/adminpanel/admins/delete','admin\AdminsController@delete');
		Route::post('/adminpanel/UsersMangemant/delete_user','admin\UsersMangemantController@delete_user');





});

