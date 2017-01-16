<?php 

/**
 * [mesReturn 封装一个返回参数的函数]
 * @param  [type] $status [状态 0 1]
 * @param  [type] $info   [消息]
 */
function mesReturn($status=1,$info='',$data = ''){
	return ['status'=>$status,'info'=>$info,'data'=>$data];
}

/**
 * 一套加盐的密码加密
 * 注册的时候只需要传入用户的密码即可,登录的时候传入密码和数据提取的盐值
 */
function handlePwd($password,$salt=''){
	$type = 0;
	//如果是注册,是不需要传salt的
	if(!$salt)$type = 1;
	//注册不需要传盐值,三元运算.注册的时候(由于默认值是空串)会获取第二个值
	// $salt = $salt ? $salt: base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
	$salt = $salt ? $salt: base64_encode(md5(microtime().uniqid()));
	$password=sha1($password.$salt);
	//成立说明是注册,返回密码和盐值,反之是核对密码,只需要返回密码
	return $type ? ['password'=>$password,'salt'=>$salt]: ['password'=>$password];
}