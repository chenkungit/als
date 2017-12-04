@extends('app')


@section('content')
    <h1 class="post-title">{{$articles->title}}</h1>
    <ol class="breadcrumb display" >
        <li>{{App\User::findorFail($articles->user_id)->name}}</li>
        <li>{{$articles->published_at}}</li>
        <li><span class="glyphicon glyphicon-eye-open "></span></li>
        <li><span class="glyphicon glyphicon-comment "></span></li>
    </ol>
    <hr>
        <article>
            <div class="body">
                {!! $articles->content !!}
            </div>
        </article>
    @stop