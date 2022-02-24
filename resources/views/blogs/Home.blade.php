

@extends('../layouts')
@section('content')
<div class="container">

    <h1 class="text-secondary text-center">home page</h1>


    @foreach ($blogs as $blog)

    <ul class="list-group col-md-4 mt-2">
        <li class="list-group-item active">{{$blog->id}}</li>
        <li class="list-group-item">{{$blog->title}}</li>
        <li class="list-group-item">{{$blog->content}}</li>
    </ul>
        
    @endforeach
</div>
@endsection
