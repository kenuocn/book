<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|	配置网站全局路由
| 	by:king
| 	Email:1402992668@qq.com
|
*/

// 注册登录
Route::get('/member/login','Member\MemberController@toLogin');
Route::get('/member/register','Member\MemberController@toRegister');

//验证码
Route::get('service/captcha','Service\ValidateCodeController@create');

//手机短信验证码
Route::get('service/sendsms','Service\ValidateCodeController@sendSMS');
Route::post('service/register','Service\MemberController@register');

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
