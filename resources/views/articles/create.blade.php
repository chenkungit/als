@extends('app')


@section('content')
    <h2 class="post-title">撰写新文章</h2>
    {!! Form::open(['url'=>'/articles']) !!}
    @include('articles.form')
    {!! Form::submit('发表文章',['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    @include('errors.list')


@stop


