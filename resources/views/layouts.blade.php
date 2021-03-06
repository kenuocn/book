<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <!-- Css Strart -->
    <link href="{{asset('/css/weui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- Css End-->
    @yield('css')

    <!-- Js Strart -->
    <script src="{{asset('/js/jquery-1.11.2.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
    <!-- End Js -->
    @yield('js')

    <!--Layer-->
    <script src="{{asset('/vendor/layer/layer.js')}}" type="text/javascript" charset="utf-8"></script>
    <!--End layer-->
</head>
<body>
    <div class="page">
        @yield('content')
    </div>
    <!-- tooltips -->
    <div class="bk_toptips">
        <span></span>
    </div>

    <div id="global_menu" onclick="onMenuClick();">
      <div></div>
    </div>

    <!--BEGIN actionSheet-->
    <div id="actionSheet_wrap">
        <div class="weui_mask_transition" id="mask"></div>
        <div class="weui_actionsheet" id="weui_actionsheet">
            <div class="weui_actionsheet_menu">
                <div class="weui_actionsheet_cell" onclick="onMenuItemClick(1)">个人中心</div>
                <div class="weui_actionsheet_cell" onclick="onMenuItemClick(2)">充值</div>
                <div class="weui_actionsheet_cell" onclick="onMenuItemClick(3)">积分</div>
                <div class="weui_actionsheet_cell" onclick="onMenuItemClick(4)">帮助</div>
            </div>
            <div class="weui_actionsheet_action">
                <div class="weui_actionsheet_cell" id="actionsheet_cancel">取消</div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
function hideActionSheet(weuiActionsheet, mask) {
    weuiActionsheet.removeClass('weui_actionsheet_toggle');
    mask.removeClass('weui_fade_toggle');
    weuiActionsheet.on('transitionend', function () {
        mask.hide();
    }).on('webkitTransitionEnd', function () {
        mask.hide();
    })
}

function onMenuClick () {
    var mask = $('#mask');
    var weuiActionsheet = $('#weui_actionsheet');
    weuiActionsheet.addClass('weui_actionsheet_toggle');
    mask.show().addClass('weui_fade_toggle').click(function () {
        hideActionSheet(weuiActionsheet, mask);
    });
    $('#actionsheet_cancel').click(function () {
        hideActionSheet(weuiActionsheet, mask);
    });
    weuiActionsheet.unbind('transitionend').unbind('webkitTransitionEnd');
}

function onMenuItemClick(index) {
  var mask = $('#mask');
  var weuiActionsheet = $('#weui_actionsheet');
  hideActionSheet(weuiActionsheet, mask);
  if(index == 1) {

  } else if(index == 2) {

  } else if(index == 3){

  } else {
    $('.bk_toptips').show();
    $('.bk_toptips span').html("敬请期待!");
    setTimeout(function() {$('.bk_toptips').hide();}, 2000);
  }
}
</script>
@yield('script')
</html>