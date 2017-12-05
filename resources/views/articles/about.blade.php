@extends('app')
@section('content')
    <h3 class="post-title">关于爱兰社</h3>
    <article>
        <p class="body">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司搞PHP得同事（澳洲海龟）离职，留下来些项目需要继续开发，发现后端用的是Laravel框架，前端是bootstrap + angularJS，
            于是乎为了了解此框架，搞了个爱兰社博客系统，来记录自己的一些技术分享及生活感悟。
            <br>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本网站用到了主要用到了Laravel、bootstrap、jquery、ckeditor 、mysql 。
            暂时只有文章发表功能，并且存在好多BUG，后续还会慢慢更新与修复。。。。。。。

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            更新日志：
            <br>
            =============2017-12-4<br>
            1. 增加文章评论功能<br>
            2. 增加最火文章列表
            <br>
            =============2017-12-2<br>
            1. 发帖功能<br>
            2. 登录/注册<br>
            3. 简单的权限控制（只能删除和修改自己的帖子）

        </p>
    </article>
@stop
