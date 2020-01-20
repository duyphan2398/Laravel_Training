@extends('layout.layout')

@section('title')
    List Of Subjects
@endsection

@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Cource</th>
            <th scope="col">Code</th>
            <th scope="col">Number of credit</th>
            <th scope="col">Action</th>
            <th scope="col">
                <form class="form-inline active-cyan-4" id="search" >
                    @csrf
                    <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search : enter id of subject"
                           aria-label="Search" name="search" id="searchInput">
                    <input class="btn btn-success" type="submit" value="Search" id="submit" >
                </form>
            </th>
            <th scope="col">
                <button  type="button" class="btn btn-primary">
                    <a class="text-white text-decoration-none" href="/create/subject"> New </a>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @php($count = 0)

        @foreach($subjects as $subject)
            <tr>
                <td> {{ ++$count}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->id}}</td>
                <td>{{$subject->credit}}</td>
                <td>
                    <button  type="button" class="btn btn-warning ">
                        <a href="/edit/subject/{{$subject->id}}" class="text-decoration-none text-white"> Edit </a>
                    </button>
                    <button  type="button" class="btn btn-danger">
                        <a href="/remove/subject/{{ $subject->id}}" class="text-decoration-none text-white"> Delete </a>
                    </button>
                </td>
                <td></td>
                <td></td>
            </tr>



        @endforeach



        </tbody>


    </table>


    <script !src="">
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        console.log(msg);
        console.log(exist);
        if (exist){
            alert(msg);
        }


        $(document).ready(function () {
            $('#searchInput').keyup(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                event.preventDefault();
                var searchString = $("#searchInput").val();
                $.ajax({
                    url: '/search/subject',
                    type: 'POST',
                    data: {searchString: searchString},
                    dataType: 'JSON',
                    success: function(result){
                        $('tbody')
                            .empty()
                            .append(' <tr>  <td>'+result.id+'</td> <td>'+result.name+'</td>  <td>'+result.id+'</td> <td>'+result.credit+'</td> <td> <button type="button" class="btn btn-warning "> <a href="/edit/subject/'+result.id+'" class="text-decoration-none text-white"> Edit </a> </button> <button  type="button" class="btn btn-danger"> <a href="/remove/subject/'+result.id+'" class="text-decoration-none text-white"> Delete </a> </button> </td> <td></td> <td></td></tr>');
                    },
                    error: function(data) {
                        $('tbody')
                            .empty()
                            .append('<h1>  Can not Find  </h1>');
                    }
                });
            });
        });
    </script>
@endsection

