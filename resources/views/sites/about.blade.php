@extends('app')
@section('content')
    <h1>About me </h1>
    @if(count($people) > 0)
        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>
    @endif
@stop
