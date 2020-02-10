<form method="POST" action="{{route('postAvatar')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for=""> File Upload</label>
        <input type="file" name="avatar">
    </div>
    <button type="submit">Submit</button>
</form>


<img src="/images/{{  Auth::user()->avatar }}" alt="">
