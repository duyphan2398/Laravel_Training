@extends('layouts.layout')

@section('title')
    Upload ExcelFile
@endsection
@section('content')
    <div class="w-50 mt-4" style="margin-left: 300px">
        <form  method="POST" action="{{route('import')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Import Excel To Product</label>
                <input name="csv" type="file" class="form-control" id="file" placeholder="Import your file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
