@extends('layout.layout')

@section('title')
    Edit Subject
@endsection

@section('content')
    <form class="m-5 w-75" method="POST" action="{{$subject->id}}">
        @csrf
        <div class="form-group">
            <label for="name">Name Of The Subject</label>
            <input  value="{{$subject->name}}" name="name" type="text" class="form-control w-50" id="name"  placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="credit">Number Of Credit</label>
            <input  value="{{$subject->credit}}" name="credit" type="text" class="form-control w-50" id="credit" placeholder="Enter Credit">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
