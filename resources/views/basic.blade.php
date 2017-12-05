<html>
<head>
    <title>爱兰社</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('logo/als16x16.ico')}}">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('highlight/styles/darcula.css')}}">
    <script src="{{url('js/jquery-2.0.3.min.js')}}"></script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('ckeditor/config.js')}}"></script>
    <script src="{{url('ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>
    <script src="{{url('highlight/highlight.pack.js')}}"></script>
    <style>
         /*隐藏滚动条*/
        ::-webkit-scrollbar {display:none}
    </style>
</head>
<body style="background-color:#f9f9f9" >
@yield('main')
</body>
</html>