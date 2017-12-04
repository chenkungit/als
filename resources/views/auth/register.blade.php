@extends('app')
    @section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url'=>'auth/register'])!!}
        <div class="form-group">
            {!! Form::label('email','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','Password_Confirmation:') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('注册',['class'=>'btn btn-primary form-control','id'=>'submitButton']) !!}
        @include('errors.list')
    </div>
    @stop
