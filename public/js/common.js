/**
 * =============================================================================
 *  [YICMS] (C)2015-2099 Yicms Inc.
 *  by: king
 *  update: 2017/01/07
 * =============================================================================
 */

/**
 * 检查用户名是否为空并且检验用户名是否符合格式
 * @param  string username 	 用户名
 * @param  Number min      	 最小长度.默认4
 * @param  Number max        最大长度,默认20
 * @return boolean           返回提示信息或者true false
 */
function checkUsername(username,min=4,max=20){
	var username = username.trim();
	if(username == ''){
		layer.msg('用户名不能为空!');
		return false;
	}
	var pattern = /^[a-zA-Z]\w{min,max}/
	var res = pattern.test(username);
	if(res){
		return true;
	}else{
		layer.msg('用户名应该是字母开头，后面字母数字、下划线的组合，至少'+min+'个字符,最多'+max+'字符');
		return false;
	}
}

/**
 * 验证手机号码是否为空并且检验手机号是否符合要求
 * @param  string mobile 手机号
 * @return boolean        返回提示信息或者true false
 */
function checkMobile(mobile){
	var mobile = mobile.trim();
	if(mobile == ''){
		layer.msg('手机号码不能为空!');
		return false;
	}
	var pattern =/^(13|15|18|14|17)+[0-9]{9}$/;
	var res = pattern.test(mobile);
	if(res){
		return true;
	}else{
		layer.msg('手机号码格式不符合要求');
		return false;
	}
}


/**
 * 验证Email是否为空并且检验Email是否符合要求
 * @param  string email   邮箱
 * @return boolean        返回提示信息或者true false
 */
function checkEmail(email){
	var email = email.trim();
	if(email == ''){
		layer.msg('Email不能为空!');
		return false;
	}
	var pattern =/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$/;
	var res = pattern.test(email);
	if(res){
		return true;
	}else{
		layer.msg('Email格式不符合规则');
		return false;
	}
}


/**
 * 检查密码
 * @param  string   pwd  密码
 * @param  Number   min 最小长度.默认6
 * @param  Number   max 最大长度,默认20
 * @return boolean      返回提示信息或者true false
 */
function checkPwd(pwd,min=6,max=20){
	var pwd = pwd.trim();
	if(pwd == ''){
		layer.msg('密码不能为空!');
		return false;
	}
	var pattern = /[a-zA-Z\d~!@#$%^&\*()\-_\+\?\|\.\{\}\[\]:;\'"<>\/]{min,max}/
	var res = pattern.test(pwd);
	if(res){
		return true;
	}else{
		layer.msg('密码应该是'+min+'-'+max+'位字母、数字、或特殊符号的组合');
		return false;
	}
}


/**
 * 检查输入的两次密码是否一致
 * @param  string Pwd     原密码
 * @param  string compare 比对密码
 * @return boolean        返回提示信息或者true false
 */
function comparePwd(Pwd,compare){
	var pwd = pwd.trim();
	var compare = compare.trim();
	if(pwd == '' || compare == ''){
		layer.msg('密码不能为空!');
		return false;
	}
	if(pwd == compare){
		return true;
	}else{
		layer.msg('两次密码不一致!');
		return false;
	}
}
