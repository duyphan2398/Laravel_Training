
@extends('layout.layout')

@section('title')
    Create Subject
@endsection


@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach

    @endif
    <form class="m-5 w-75" method="POST" action="{{route('subjects.store')}}">

        @csrf
        <div class="form-group">
            <label for="name">Name Of The Subject</label>
            <input  name="name" type="text" class="form-control w-50" id="name"  placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label for="credit">Number Of Credit</label>
            <input name="credit" type="text" class="form-control w-50" id="credit" placeholder="Enter Credit" required>
        </div>
        <div class="form-group w-50">
            <label for="id_teacher" for="credit">Tacher</label>
            <select id="credit" name="id_teacher" class="form-control form-control-md">
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">
                        {{$teacher->id}} - {{$teacher->name}}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
