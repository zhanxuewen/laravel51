<?php

Auth::loginUsingId(40);

Route::get('/','PostsController@index');
Route::resource('article','ArticleController');
Route::resource('discussions','PostsController');
Route::resource('comment','CommentsController');


//------------使用默认类  及 方法----------------------------------------//
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');

Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::get('/auth/logout', 'Auth\AuthController@getLogout');

//-------------------------------------------------------//
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@signin');

Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@store');

Route::get('/user/logout', 'UserController@logout');
//////////////////////////////////////////////////////////////////

Route::get('/user/avatar', 'UserController@avatar');
Route::post('/avatar', 'UserController@changeAvatar');
Route::post('/crop/api', 'UserController@cropAvatar');

Route::get('/verify/{confirm_code}', 'UserController@confirmEmail');


Route::post('/posts/upload', 'PostsController@upload');

Route::post('/deploy', 'DeploymentController@deploy');



