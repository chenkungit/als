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
                                    <li><span class="glyphicon glyphicon-eye-open "></span></li>
                                    <li><span class="glyphicon glyphicon-comment "></span></li>
                                </ol>
                            </div>
                            <div class="body ">
                                @if(strlen(strip_tags($article->content))>500)
                                {{substr(strip_tags($article->content),0,500).'...'}}
                                @else
                                    {{strip_tags($article->content)}}
                                    @endif
                                {{--{!!$article->content!!}--}}
                            </div>
                            <hr>

                            <div class="col-sm-12 col-md-12 tags">
                                @foreach(explode(",",$article->tags) as $tag)
                                <a href="{{url('articles/search/tags/'.$tag.'/like')}}"><span class="label label-default">{{$tag}}</span></a>
                                    @endforeach
                            </div>

                            <div class="col-sm-12 col-md-12 tags">
                            <a href="{{url('articles',$article->id)}}" class="btn btn-primary">阅读全文</a>
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
                <div class="uArticle">
                </div>
            </div>
        </div>
        <div>
            {!!$articles->render()!!}
        </div>

    @stop