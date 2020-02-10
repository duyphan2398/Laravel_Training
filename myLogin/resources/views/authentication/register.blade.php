@extends('layouts.layout')

@section('title')
   Register
@endsection

@section('content')
    <div class="w-50 mt-4" style="margin-left: 300px">
        <form  method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name"  placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="imail"  placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirm Password</label>
                <input name="passwordConfirm" type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
