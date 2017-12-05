@extends('app')


@section('content')
        <div class="row">
            <div class="col-md-8">
                @foreach($articles as $article)
                    <div class="uArticle">
                        <article class="post">
                            <div class="post-head">
                                <h3 class="post-title line-limte-length"><a style="color: black" href="{{url('articles',$article->id)}}">{{$article->title}}</a></h3>
                                <ol class="breadcrumb author" >
                                    <li>{{App\User::findorFail($article->user_id)->name}}</li>
                                    <li>{{$article->published_at}}</li>
                                    <li><span class="glyphicon glyphicon-eye-open "></span> {{$article->hits}}</li>
                                    <li><a href="{{url('articles',$article->id)}}" style="color: #bdb7b7"><span class="glyphicon glyphicon-comment "></span> {{App\Comments::where('article_id',$article->id)->count()}}</a></li>
                                </ol>
                            </div>
                            <div class="body">
                                @if(strlen(strip_tags($article->content))>500)
                                {{substr(strip_tags($article->content),0,500).'...'}}
                                @else
                                    {{strip_tags($article->content)}}
                                    @endif
                                {{--{!!$article->content!!}--}}
                            </div>
                            <hr>

                            <div class="col-sm-12 col-md-12 tags">
                                <span class="label label-warning"><span class="glyphicon glyphicon-tags"></span> Tags：</span>
                                @foreach(explode(",",$article->tags) as $tag)
                                <a href="{{url('articles/search/tags/'.$tag.'/like')}}"><span class="label label-default">{{$tag}}</span></a>
                                    @endforeach
                            </div>

                            <div class="col-sm-12 col-md-12 tags">
                            <a href="{{url('articles',$article->id)}}" class="btn btn-primary">阅读全文 <span class="badge"> {{App\Comments::where('article_id',$article->id)->count()}}</span></a>
                            @if(!is_null(Auth::user())&& $article->user_id==Auth::user()->id)
                                <a href="{{url('articles/'.$article->id.'/edit')}}" class="btn btn-info">编辑文章</a>
                                <a href="{{url('articles/'.$article->id.'/delete')}}" class="btn btn-danger">删除文章</a>
                                @endif
                            </div>
                        </article>

                    </div>

                @endforeach
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary hidden-xs hidden-sm">
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
        </div>
        <div>
            {!!$articles->render()!!}
        </div>

    @stop