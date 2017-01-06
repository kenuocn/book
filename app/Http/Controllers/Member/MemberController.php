<?php 
namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
class MemberController extends Controller{
	public function toLogin(){
		return view('Member.login');
	}

	public function toRegister(){
		return view('Member.register');
	}
}