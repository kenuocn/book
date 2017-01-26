<?php 
namespace App\Http\Controllers\Home\Service;
use Illuminate\Http\Request;
use App\Http\Models\Home\TempPhone;
use App\Http\Controllers\BaseController;
class MemberController extends BaseController{
	public function register(Request $request){
		$data = $request->all();
		/***************校验手机号注册***************/
		$rules = [
			'phone'=>'required|regex:/^1[34578][0-9]{9}$/',
			'password'=>'required|between:6,18|confirmed',
			'phone_code'=>'required|max:4'
		];
		$message = [
			'phone.required'=>'手机号码不能为空',
			'phone.regex'=>'手机号格式不正确',
			'password.required'=>'密码不能为空',
			'password.between'=>'密码长度须在6-18位之间',
			'password.confirmed'=>'两次密码输入不一致',
			'phone_code.required'=>'手机验证码不能为空',
			'phone_code.max'=>'手机验证码必须为4位数字',
		];
		//校验数据
        $is_passes = $this->validatorMake($data,$rules,$message);
        if(!$is_passes['status'])
                return $this->ajaxReturn(0,$is_passes['info']);
        $tempPhone = new TempPhone;
        $result = $tempPhone->dealRegister($data);
        //判断当前手机号码是否注册
        if($result['status']){
        	return $this->ajaxReturn(1,$result['info'],$result['data'],Route('User/index'));
        }else{
        	return $this->ajaxReturn(0,$result['info']);
        }
	}
}