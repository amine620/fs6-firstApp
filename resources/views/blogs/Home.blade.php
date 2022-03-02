

@extends('../layouts.app')

@section('content')
<div class="container">

    <h1 class="text-secondary text-center">home page</h1>


    @foreach ($blogs as $blog)

    <ul class="list-group col-md-4 mt-2">
        <li class="list-group-item active">{{$blog->id}}</li>
        <li class="list-group-item">{{$blog->title}}</li>
        <li class="list-group-item">{{$blog->content}}</li>
        <li class="list-group-item">
            <form action="destroy/{{$blog->id}}" method="post">
                 @method('DELETE')
                 @csrf
                 <button class="btn btn-danger">delete</button>
                <a href="details/{{$blog->id}}" class="btn btn-primary">details</a>
                <a href="show/{{$blog->id}}" class="btn btn-warning">update</a>
            </form>
        </li>
    </ul>
        
    @endforeach
</div>
@endsection
