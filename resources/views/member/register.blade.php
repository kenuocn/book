@extends('layouts')

@section('title','注册')

@section('content')
<!--注册-->
<div class="weui_cells_title">注册方式</div>
<div class="weui_cells weui_cells_radio">
  <label class="weui_cell weui_check_label" for="x11">
      <div class="weui_cell_bd weui_cell_primary">
          <p>手机号注册</p>
      </div>
      <div class="weui_cell_ft">
          <input type="radio" class="weui_check" name="register_type" id="x11" checked="checked">
          <span class="weui_icon_checked"></span>
      </div>
  </label>
  <label class="weui_cell weui_check_label" for="x12">
      <div class="weui_cell_bd weui_cell_primary">
          <p>邮箱注册</p>
      </div>
      <div class="weui_cell_ft">
          <input type="radio" class="weui_check" name="register_type" id="x12">
          <span class="weui_icon_checked"></span>
      </div>
  </label>
</div>
<!--手机注册-->
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="请输入11位手机号码" name="phone"/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_phone'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_phone_cfm'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">手机验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="" name='phone_code'/>
      </div>
      <p class="bk_important bk_phone_code_send">发送验证码</p>
      <div class="weui_cell_ft">
      </div>
  </div>
</div>
<!--End 手机注册 -->
<!-- Email注册 -->
<div class="weui_cells weui_cells_form" style="display: none;">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">邮箱</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="text" placeholder="请输入Email邮箱" name='email'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_email'>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_email_cfm'/>
      </div>
  </div>
  <div class="weui_cell weui_vcode">
      <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="text" placeholder="请输入验证码" name='validate_code'/>
      </div>
      <div class="weui_cell_ft">
          <img src="{{url('/service/captcha')}}" class="bk_validate_code"/>
      </div>
  </div>
</div>
<!--End Email <--></-->
<div class="weui_cells_tips"></div>
<div class="weui_btn_area">
  <a class="weui_btn weui_btn_primary" href="javascript:" onclick="onRegisterClick();">注册</a>
</div>
<a href="{{url('/member/login')}}" class="bk_bottom_tips bk_important">已有帐号? 去登录</a>
<!--End 注册-->
@endsection

@section('script')
<script type="text/javascript">
	//点击更换验证码
	$('.bk_validate_code').click(function(){
		$(this).attr('src','/service/captcha?random=' + Math.random());
	})

	//切换注册方式焦点选中状态
	$('#x12').next().hide();
	$('input:radio[name=register_type]').click(function(){
		$('input:radio[name=register_type]').attr('checked',false);	//没点击的取消勾选
		$(this).attr('checked',true);	//点击的就为勾选
		//判断选中的id值
		if($(this).attr('id') == 'x11'){
			$('#x11').next().show();
			$('#x12').next().hide();
			//显示隐藏手机号和Emaail注册表单`
			$('.weui_cells_form').eq(0).show();
			$('.weui_cells_form').eq(1).hide();
		}else if($(this).attr('id') == 'x12'){
			$('#x12').next().show();
			$('#x11').next().hide();
			//显示隐藏手机号和Emaail注册表单
			$('.weui_cells_form').eq(1).show();
			$('.weui_cells_form').eq(0).hide();
		}
	})

	//点击发送手机验证码
	// 手机号
	$('.bk_phone_code_send').click(function(){
		var phone = $('input[name=phone]').val();
		var ajaxUrl = '/service/sendsms';
		sendPhoneVerify(this,'.bk_important',phone,ajaxUrl);
	});
</script>
@endsection