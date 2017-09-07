<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//
//Route::get('user/{name?}', function ($name='jellyBool') {
//    return 'Hello '.$name;
//});

Route::get('/','PostsController@index');
Route::get('article/create','ArticleController@create');
Route::get('article/{id}','ArticleController@show');
Route::post('article/store','ArticleController@store');

Route::resource('discussions','PostsController');
Route::get('/user/register', 'UserController@register');
Route::get('/user/login', 'UserController@login');
Route::get('/user/logout', 'UserController@logout');
Route::get('/user/avatar', 'UserController@avatar');
Route::post('/avatar', 'UserController@changeAvatar');
Route::post('/crop/api', 'UserController@cropAvatar');
Route::post('/posts/upload', 'PostsController@upload');

Route::post('/user/login', 'UserController@signin');
Route::get('/verify/{confirm_code}', 'UserController@confirmEmail');
Route::post('/user/register', 'UserController@store');


Route::post('/deploy', 'DeploymentController@deploy');

Route::resource('comment','CommentsController');
Route::resource('/test','TestsController');

