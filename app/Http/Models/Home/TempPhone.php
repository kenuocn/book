<?php
namespace App\Http\Models\Home;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BaseController;
class TempPhone extends Model
{
    protected $primaryKey = 'uid';
    protected $table ='temp_phone';
    public $timestamps = false;

    //手机号注册
    public function dealRegister($data){
    	$tempPhone = DB::table('temp_phone')->where('phone',$data['phone'])->first();
    	//判断验证码是否正确
    	if($data['phone_code'] == $tempPhone->code){
    		//判断验证码是否过期
    		$pwdData = handlePwd($data['password']);
    		if(time() > $tempPhone->deadline){
                $userModel = DB::table('member');
                //判断手机号是否注册
                $is_register = $userModel->select('uid')->where('phone',$data['phone'])->first();
                if($is_register){
                    return mesReturn( 0,'该用户已经注册过');
                }

    			$insertData = array(
    				'phone'=> $data['phone'],
    				'password'=>$pwdData['password'],
    				'salt'=>$pwdData['salt'],
                );
                if($id = $userModel->insertGetId($insertData)){
                    //默认登录
                    session(['uid'=>$id,'phone'=>$data['phone']]);
                    return mesReturn( 1,'注册成功',['id'=>$id,'phone'=>$data['phone']]);
                }else{
                    return mesReturn( 0,'注册失败');
                }
            }
    		return mesReturn( 0,'验证码不正确');
    	}	
    }


    //判断Email是否注册
    public function isEmail(){
        
    }
}
