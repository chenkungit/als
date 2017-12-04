
   @extends('app')
   @section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url'=>'/auth/login'])!!}
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::input('password','password',null,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('登录',['class'=>'btn btn-primary form-control']) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 a-login">
                    <a href="{{url('auth/github')}}" >
                        <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
                        使用Github登录</a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 a-forget">
                <a href="#" >
                    忘记密码？</a>
            </div>
        </div>
        @include('errors.list')
    </div>
       @stop
