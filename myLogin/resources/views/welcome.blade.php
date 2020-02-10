
@extends('layouts.layout')

@section('title')
    HomePage
@endsection

@section('content')
    <br>
    Hello I am : {{Auth::user()->name}}
    <br>
    My Id : {{ Auth::user()->id}}
    <br>
    This is my avatar: <img src="{{Auth::user()->avatar}}" alt="Avatar" class="w-5 h-5" >
    <br>
@endsection
