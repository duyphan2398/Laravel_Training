@extends('layout.layout')

@section('title')
    List Of Teacher
@endsection

@section('content')
    <style>

    </style>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Action</th>
            <th scope="col">
                <form class="form-inline active-cyan-4" id="search" >
                    @csrf
                    <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search : enter id of subject"
                           aria-label="Search" name="search" id="searchInput">
                </form>
            </th>
            <th scope="col">
                <button  type="button" class="btn btn-primary">
                    <a class="text-white text-decoration-none" href="{{route('subjects.create')}}"> New </a>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @php($count = 0)

        @foreach($teachers as $subject)
            <tr>
                <td> {{ ++$count}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->id}}</td>
                <td>
                    <button  type="button" class="btn btn-warning ">
                        <a href="{{route('subjects.edit',$subject)}}" class="Edit" class="text-decoration-none text-white"> Edit </a>
                    </button>
                    <button type="button" class="btn btn-danger " onclick="destroy_confirm('{{route('subjects.destroy',$subject)}}')">
                        Delete
                    </button>
                </td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $teachers->links() }}


    <script !src="">

        function destroy_confirm(Url) {
            if (confirm("Do you sure ?"))
                destroy_subject(Url);
        }
        function destroy_subject(Url){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            event.preventDefault();
            $.ajax({
                url: Url,
                type: 'DELETE',
                success: function(result){
                    $('tbody').empty().append(result.response);
                    console.log(result);
                },
                error: function(data) {
                    alert("Can not Delete");
                    console.log(data.msg);
                }

            })
        }

        function  search_subject() {
            console.log('hello');
        }
        $(document).ready(function () {

            $('#searchInput').keyup(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                event.preventDefault();
                var searchInput = $("#searchInput").val();
                $.ajax({
                    url: 'subjects/search',
                    type: 'POST',
                    data: {searchInput: searchInput},
                    dataType: 'JSON',
                    success: function(result){
                        console.log(result.searchOutput);
                        $('tbody').empty().append(result.searchOutput);
                    },
                    error: function() {
                        $('tbody')
                            .empty()
                            .append('<h1>  Can not Find  </h1>');
                    }
                });
            });
        });
    </script>
@endsection


