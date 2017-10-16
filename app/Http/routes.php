<?php
// 使用facade
// Auth::User();  获取用户信息
// Auth::check()  检查用户是否登录
// Auth::attempt() 尝试登录
// Auth::logout()  用户退出登录
// Auth::login($user);  用「用户实例」做认证
 Auth::loginUsingId(40);// 方法来登录指定 ID 用户，这个方法接受要登录用户的主键
// Auth::once($credentials) 可以使用 once 方法来针对一次性认证用户，没有任何的 session 或 cookie 会被使用，
//                          这个对于构建无状态的 API 非常的有用，
//                          once 方法跟 attempt 方法拥有同样的传入参

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

// 添加重试密码方法  ---------------------------------TODO------------------/
// 密码重置链接的路由...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// token 代表什么？？
// 密码重置的路由...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

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


//---------------------------------phpunit试验---------------------------------//
Route::get('/phpunitexec/test1','phpUnitExecController@test1');
Route::get('/collection/test1','collectionController@test1');
Route::get('/event/test1','EventController@test1');
Route::get('/event/test2','EventController@test2');
Route::get('/redis/test1','redisController@test1');
