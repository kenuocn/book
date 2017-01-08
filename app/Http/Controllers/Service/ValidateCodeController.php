<?php 
namespace App\Http\Controllers\Service;
use App\Vendor\Validate\ValidateCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor\SMS\SendTemplateSMS;
use App\Http\Models\TempPhone;
use App\Http\Models\M3Result;
class ValidateCodeController extends Controller{

	//生成验证码
	public function create(){
		$validateCode = new ValidateCode;
		return $validateCode->doimg();
	}

	//发送短信验证码
	public function sendSMS(Request $request){
		$m3_result = new M3Result;
		$phone = $request->input('phone','');

		if($phone == ''){
			$m3_result->status = 1;
			$m3_result->message = '手机号码不能为空!';
			return $m3_result->toJson();
		}

		$sms = new SendTemplateSMS;
		$code = '';
		$charset = '1234567890';
		$_len = strlen($charset) - 1;
        for ($i = 0;$i < 4;++$i) {
            $code .= $charset[mt_rand(0, $_len)];
        }
		$m3_result = $sms->sendTemplateSMS($phone,array($code,60),1);
		if($m3_result->status == 0){
			$tempPhone = new TempPhone;
			$tempPhone->phone = $phone;
			$tempPhone->code = $code;
			$tempPhone->deadline = time();
			$tempPhone->save();
		}
		
		return $m3_result->toJson();
	}
	
}