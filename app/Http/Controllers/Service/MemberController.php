<?php 
namespace App\Http\Controllers\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\TempPhone;
use App\Http\Models\M3Result;
class MemberController extends Controller{
	public function register(Request $request){
		$this->validate($request,[
			'email'=>'required|email',
			
		]);
	}
}