@extends('layouts')

@include('component.loading')

@section('title','登录')

@section('content')
<!-- 登录 -->
<div class="weui_cells_title"></div>
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">帐号</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="tel" placeholder="邮箱或手机号"/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="tel" placeholder="不少于6位"/>
      </div>
  </div>
  <div class="weui_cell weui_vcode">
      <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="请输入验证码"/>
      </div>
      <div class="weui_cell_ft">
          <img src="{{url('/service/captcha')}}" class="bk_validate_code"/>
      </div>
  </div>
</div>
<div class="weui_cells_tips"></div>
<div class="weui_btn_area">
  <a class="weui_btn weui_btn_primary" href="javascript:" onclick="onLoginClick();">登录</a>
</div>
<a href="{{url('/member/register')}}" class="bk_bottom_tips bk_important">没有帐号? 去注册</a>
<!-- End 登录 -->
@endsection

@section('script')
<script type="text/javascript">
	//点击更换验证码
	$('.bk_validate_code').click(function(){
		$(this).attr('src','/service/captcha?random=' + Math.random());
	})
</script>
@endsection