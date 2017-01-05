<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Css Strart -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/weui.css')}}" rel="stylesheet" type="text/css">
    <!-- Css End-->
    @yield('css')

    <!-- Js Strart -->
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <!-- End Js -->
    @yield('js')
</head>
<body>
    @yield('content')
</body>
</html>