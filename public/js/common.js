/**
 * by: king
 * update: 2017/01/07
 */


/**
* 短信验证码倒计时,默认60秒,依赖layui插件弹窗
* @param  sendBtn    点击发送按钮Class属性
* @param  fontsColor 字体颜色Class属性
* @param  phone 	 手机号
* @param  url 	 	 ajax请求地址
* @param  num        倒计时时间
*/

function sendPhoneVerify(sendBtn,fontsColor,smsphone,url,time = 60){
	//点击发送手机验证码
	var enable = true;	//是否允许发送短信
		if(enable == false){
			layer.msg('请稍后再发送验证码!');
			return;
		}
		$(fontsColor).css({'font-size':'16px','color':'#888'});

		//发送aja请求,用于发送验证码
		$.ajax({
			url:url,
			dataType:'json',
			cache:false,
			data:{phone:smsphone},
			success:function(data){
				if(data.status == 0){
					layer.msg(data.message);
				}else if(data.status !== 0){
					layer.msg(data.message);
				}else{
					layer.msg(data.message[0]);
				}				
			},
			error:function(xhr,status,error){
				layer.msg(error);
				console.log(xhr);
				console.log(status);
				console.log(error);
			},
		});

		var num = time;
		enable = false; //点击一次就把值置为false,因为要等待多长时间再次发送
		var interval = window.setInterval(function(){
			$(sendBtn).html(--num + 's 重新发送');	//显示倒计时文字
			//当倒计时为0时就允许发送短信验证码
			if(num == 0){
				$(fontsColor).css({'font-size':'16px','color':'#3CC51F'});
				enable = true;
				window.clearInterval(interval)
				$(sendBtn).html('重新发送');
			}
		},1000);
}