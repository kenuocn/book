<?php

namespace App\Http\Models\Home;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BaseController;
class TempPhone extends Model
{
    protected $table ='temp_phone';
    public $timestamps = false;

    //检查手机号是否在数据库存在
    public function dealRegister($data){
    	$tempPhone = DB::table('temp_phone')->where('phone',$data['phone'])->first();
    	//判断验证码是否正确
    	if($data['phone_code'] == $tempPhone->code){
    		//判断验证码是否过期
    		$pwdData = handlePwd($data['password']);
    		if(time() > $tempPhone->deadline){
    			$userModel = DB::table('member');
    			$insertData = array(
    				'phone'=>$data['phone'],
    				'password'=>$pwdData,
    				'salt'=>$pwdData['salt'],
    			);
    			$id = $userModel->insertGetId($insertData);
    			dd($id);
    		}
    		return mesReturn( 0,'验证码不正确');
    	}	
    }
}
