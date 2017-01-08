<?php 
namespace App\Http\Models;
class M3Result{
	//状态码
	public $status;

	//提示信息
	public $message;

	public function toJson(){
		return json_encode($this,JSON_UNESCAPED_UNICODE);	
	}
}