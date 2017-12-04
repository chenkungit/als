@extends('basic')
@section('main')
    <header class="navbar">
        <div class="container">
             <nav class="navbar navbar-inverse navbar-fixed-top">
                 <div class="container-fluid">
                     <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>
                         <a class="navbar-brand" href="{{url('articles')}}"><img src="{{url('logo/als.png')}}" style="width: 120px;height: 120px;margin-top: -50px;"/></a>
                     </div>
                     <div class="collapse navbar-collapse" id="navbar-collapse">
                         <ul class="nav navbar-nav">
                             <li class=""><a href="{{url('articles/create')}}"><span class="glyphicon glyphicon-pencil"></span> 发帖</a></li>
                             <li class="" onclick="changestatue(this)"><a href="{{url('articles')}}"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                             <li class="" onclick="changestatue(this)"><a href="{{url('articles/search/category/T/=')}}"><span class="glyphicon glyphicon-fire"></span> 技术分享</a></li>
                             <li class="" onclick="changestatue(this)"><a href="{{url('articles/search/category/N/=')}}"><span class="glyphicon glyphicon-tint"></span> 生活随笔</a></li>
                             <li class="" onclick="changestatue(this)"><a href="{{url('articles/about')}}"><span class="glyphicon glyphicon-question-sign"></span> 关于</a></li>
                         </ul>
                         <form class="navbar-form navbar-left " role="search" action="{{url('articles/search')}}" method="post">
                             <div class="form-group">
                                 <input type="text" name="condition" class="form-control" placeholder="Search" >
                                 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                             </div>
                             <button type="submit" class="btn btn-primary">搜一搜</button>
                         </form>
                         <ul class="nav navbar-nav navbar-right">
                         @if(is_null(Auth::user()))
                                {{--<a href="{{url('auth/login')}}"><button class="btn btn-info navbar-btn">登 录</button></a>--}}
                               <li><a href="{{url('auth/login')}}"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                               <li><a href="{{url('auth/register')}}"><span class="glyphicon glyphicon-registration-mark"></span> 注册</a></li>
                         @else
                             {{--已登录显示登录头像--}}

                                 <img id="uImg" src="{{url('upload/images/2017-12-01jYOYU7ofJz.jpg')}}" class="img-circle "  style="width: 40px;height: 40px;margin-left: 10px"/>
                                 <button id="userName" class="btn btn-link navbar-btn dropdown-toggle" data-toggle="dropdown"><span class="badge">{{Auth::user()->name}}</span></button>
                                 {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">下拉菜单</a>--}}
                                 <ul class="dropdown-menu">

                                     <li><a href="#" class="glyphicon glyphicon-user"> 个人资料</a></li>
                                     <li role="separator" class="divider"></li>
                                     <li><a href="{{url('auth/logout')}}" class="glyphicon glyphicon-log-out"> 登出</a></li>
                                 </ul>
                         @endif
                         </ul>
                     </div>
                 </div>
             </nav>
        </div>
    </header>
     <div class="container" id="main">
        @yield('content')
     </div>
    <div id="footer" class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer">
                        <a href="{{url('articles')}}">  <img src="{{url('logo/als.png')}}" style="width: 200px;height: 200px"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

