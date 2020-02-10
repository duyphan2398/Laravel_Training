@extends('layouts.layout')

@section('title')
    HomePage
@endsection

@section('content')
    <br>
    Hello I am : {{\Illuminate\Support\Facades\Auth::user()->name}}
    <br>
    My Id : {{\Illuminate\Support\Facades\Auth::user()->id}}

@endsection
