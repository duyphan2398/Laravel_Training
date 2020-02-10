<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>@yield('title')</title>
    {{-- Bootstrap   --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body >
    <nav class="m-3">
        @if(\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('logout')}}">Log out</a>
            <br>
            <a href="{{route('avatar')}}">Set Avatar</a>
        @else
            <a href="{{route('login')}}">Log in</a>
            <a href="{{route('register')}}">Register</a>
        @endif
    </nav>
    @yield('content')
    @if(count($errors) >0)
        <div class="alert alert-danger alert-dismissible fade show mt-3 w-50" role="alert" style="margin-left: 300px">
            @foreach($errors->all() as $error)
                <strong>{{$error}}</strong><br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <hr>
    <footer class="page-footer font-small blue">
        <div class=" text-center py-3">
            Footer
        </div>
    </footer>

    <script !src="">
        var status = "{{session()->has('status')}}";
        var msg = "{{session('status')}}";
        if ( status) {
            alert(msg);
        }
    </script>
</body>
</html>
