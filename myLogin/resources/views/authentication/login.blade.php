@extends('layouts.layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="w-50 mt-4" style="margin-left: 300px">
        <form  method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" id="email" placeholder="Password" required>
            </div>
            {{--<div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>--}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
