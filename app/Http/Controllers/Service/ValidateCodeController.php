<?php 
namespace App\Http\Controllers\Service;
use App\Vendor\Validate\ValidateCode;
use App\Http\Controllers\Controller;
class ValidateCodeController extends Controller{

	public function create(){
		$validateCode = new ValidateCode;
		return $validateCode->doimg();
	}
	
}