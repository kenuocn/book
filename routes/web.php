<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// 注册登录
Route::get('/member/login','Member\MemberController@toLogin');
Route::get('/member/register','Member\MemberController@toRegister');

//验证码
Route::any('service/captcha','Service\ValidateCodeController@create');


// // Route::get('msg','MsgController@index');
// Route::match(['get','post'],'up','MsgController@up');
// Route::any('pp','MsgController@pp');
// Route::get('msg/{id?}','MsgController@show');
// /**
//  * 路由参数限制,和TP模型的自动验证类似
//  */
// Route::get('user/{name}',function($name){
// 	return $name;
// })->where('name','^\w+$');

// Route::get('Admin','Admin\IndexController@index');
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');
