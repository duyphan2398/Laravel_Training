@extends('layouts.layout')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="w-50 mt-4" style="margin-left: 300px">
        <form  method="POST" action="{{route('resetpassword')}}" >
            @csrf
            <div class="form-group">
                <label for="email">Your Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter your Email" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
