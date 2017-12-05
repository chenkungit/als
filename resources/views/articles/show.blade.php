@extends('app')


@section('content')

    <div class="col-md-8">
        <h1 class="post-title">{{$articles->title}}</h1>
        <ol class="breadcrumb display" >
            <li>{{App\User::findorFail($articles->user_id)->name}}</li>
            <li>{{$articles->published_at}}</li>
            <li><span class="glyphicon glyphicon-eye-open "></span> {{$articles->hits}}</li>
            <li><span class="glyphicon glyphicon-comment "></span></li>
        </ol>
        <hr>
        <article>
            <div class="body">
                {!! $articles->content !!}
            </div>
        </article>
    <hr>

            {!! Form::open(['url'=>url('/comments'),'method'=>'post']) !!}
                {!! Form::textarea('context',null,['class'=>'form-control','rows'=>'3']) !!}
            @if(!is_null(Auth::user()))
                {!! Form::input('hidden','user_id',Auth::user()->id,[]) !!}
                {!! Form::input('hidden','article_id',$articles->id,[]) !!}
                {!! Form::submit('提交评论',['class'=>'btn btn-primary','style'=>'margin:10px 0 10px 0']) !!}
                @else
                {!! Form::submit('提交评论',['class'=>'btn btn-primary','disabled'=>'disabled','style'=>'margin:10px 0 10px 0;']) !!}
                {!! Form::label('tip','登录后进行评论',['class'=>'label label-danger']) !!}
            @endif
            {!! Form::close() !!}

           @if(!is_null($comments))
           @foreach($comments as $comment)
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" src="{{url('logo/default.png')}}" alt="" style="height: 64px;width: 64px">
                    </a>

                </div>
                <div class="media-body">
                    <h4 class="media-heading form-inline">{{\App\User::findorFail($comment->user_id)->name}}</h4>
                    {{--<a href="#" id={{'replay'}}> <span class="glyphicon glyphicon-share-alt " style="float: right">回复</span></a>--}}
                    <span class="comment-time">{{$comment->created_at}}</span>
                    <br>
                    <span class="body">
                    {!!$comment->context!!}
                    </span>
                </div>
                <div class="hidden">
                    <textarea class="form-control"></textarea>
                </div>
            </div>

           @endforeach
               @endif
            <div>
                {!!$comments->render()!!}
            </div>
    </div>
    <div class="col-md-4">
    <div class="panel panel-primary panel-list hidden-xs hidden-sm">
            <!-- Default panel contents -->
            <div  id="collapse_panel" class="panel-heading" data-toggle="collapse">
                <a data-toggle="collapse" href="#collapse">
                    <div class="panel-title" style="color: white; font-size: 14px">
                        <span class="glyphicon glyphicon-fire"></span> 最近热文
                        <span id="collapse_span" style="float: right" class="glyphicon glyphicon-chevron-up"></span>
                    </div>
                </a>
            </div>

            <div id="collapse" class="panel-collapse collapse in body" >
                <!-- List group -->
                <ul class="list-group " >
                    @foreach($recentArticles as $recentArticle)
                        <a href="{{url('articles/'.$recentArticle->id)}}" class="line-limte-length list-group-item" >{{$recentArticle->title}}<span class="badge" style="background-color: #337AB7">{{$recentArticle->hits}}</span></a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            CKEDITOR.replace('context', {
                //filebrowserBrowseUrl: '{{url('uploads/images/')}}',
                filebrowserUploadUrl: '{{url('/articles/image')}}?_token={{csrf_token()}}',
                toolbarCanCollapse: true,
                toolbarStartupExpanded: false,
                height:200
            });
        });
    </script>
    @stop