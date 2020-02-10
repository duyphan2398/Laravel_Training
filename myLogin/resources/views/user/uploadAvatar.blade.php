@extends('layouts.layout')

@section('title')
    Upload Avartar
@endsection

@section('content')
    <div class="w-50 mt-4" style="margin-left: 300px">
        <form  method="POST" action="{{route('avatar')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Avatar</label>
                <input name="avatar" type="file" class="form-control" id="file" placeholder="Upload your avatar HERE" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
