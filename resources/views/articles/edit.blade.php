@extends('app')
@section('content')
<h2 class="post-title">{{$articles->title}}</h2>
{!! Form::model($articles,['method'=>'PATCH','url'=>'/articles/'.$articles->id]) !!}
@include('articles.form')
{!! Form::submit('发表文章',['class'=>'btn btn-primary form-control']) !!}
{!! Form::close() !!}
@include('errors.list')
    @stop
