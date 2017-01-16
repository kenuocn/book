<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BaseController extends Controller{
	/**
     * king (3522322@qq.com)
     * [ajaxReturn 封装ajax返回方法]
     * @param  int|integer $status [状态]
     * @param  [type]      $info   [弹出消息]
     * @param  [type]      $data   [数据]
     * @param  string      $url    [调整地址]
     * @param  boolean     $flush_self    [是否刷新本页面]
     */
    public function ajaxReturn($status = 1,$info,$data=null,$url='',$flush_self = 0){
		return response()->json(array(
		            'status' => $status,
		            'info' => $info,
		            'data'=>$data,
		            'url'=>$url,
                    'flush_self'=>$flush_self,
		        ));
    }

	/**
     * [validatorMake 验证规则]
     * 返回验证信息
     * @authors king (3522322@qq.com)
     * @version $Id$
     * @date    2016-12-09 10:16:28
     * 
     * @param  array  $data    [校验数据]
     * @param  array  $rules   [规则]
     * @param  array  $message [错误信息]
     */
	public function validatorMake(array $data,array $rules,array $message){
		$validator = Validator::make($data,$rules,$message);
		if(!$validator->passes()){
                $errorMes = $validator->messages();
                return $this->mesReturn(0,$errorMes->first());
            }
            return $this->mesReturn(1);
	}

	/**
     *
     * @authors @authors king (3522322@qq.com)
     * @version $Id$
     * @date    2016-12-09 10:16:28
     *
     * 
     * [mesReturn 普通返回函数]
     * @param  integer $status [状态]
     * @param  string  $info   [信息]
     */
    public function mesReturn($status=1,$info='',$data = ''){
        return ['status'=>$status,'info'=>$info,'data'=>$data];
    }

}