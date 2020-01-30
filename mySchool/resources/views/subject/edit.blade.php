@extends('layout.layout')

@section('title')
    Edit Subject
@endsection

@section('content')
    <form class="m-5 w-75" method="Post" action="{{route('subjects.update',$subject)}}">
        {{method_field('PATCH')}}
        @csrf
        <div class="form-group">
            <label for="name">Name Of The Subject</label>
            <input  value="{{$subject->name}}" name="name" type="text" class="form-control w-50" id="name"  placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="credit">Number Of Credit</label>
            <input  value="{{$subject->credit}}" name="credit" type="text" class="form-control w-50" id="credit" placeholder="Enter Credit" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script !src="">
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        console.log(msg);
        console.log(exist);
        if (exist){
            alert(msg);
        }
    </script>
@endsection
