@extends('layout.layout')

@section('title')
    Create Subject
@endsection

@section('content')

    <form class="m-5 w-75" method="POST" action="/create/subject">
        @csrf
        <div class="form-group">
            <label for="name">Name Of The Subject</label>
            <input  name="name" type="text" class="form-control w-50" id="name"  placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="credit">Number Of Credit</label>
            <input name="credit" type="text" class="form-control w-50" id="credit" placeholder="Enter Credit">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
