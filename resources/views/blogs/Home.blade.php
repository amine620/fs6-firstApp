

@extends('../layouts.app')

@section('content')
<div class="container">

    <h1 class="text-secondary text-center">home page</h1>

 <div class="row">

     @foreach ($blogs as $blog)
 
     <ul class="list-group col-md-4 mt-2">
         <li class="list-group-item active">{{$blog->id}}</li>
         <li class="list-group-item">{{$blog->title}}</li>
         <li class="list-group-item">{{$blog->content}}</li>
         <li class="list-group-item">
               {{-- @if (Auth::user()->id==$blog->user_id)  --}}
                    <form action="destroy/{{$blog->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">delete</button>
                        <a href="show/{{$blog->id}}" class="btn btn-warning">update</a>
                    </form>      
                {{-- @endif --}}
                <a href="details/{{$blog->id}}" class="btn btn-primary mt-2">details</a>
         </li>
         <li class="list-group-item">{{$blog->category->name}} - published by : {{$blog->user->name}} </li>
         <li class="list-group-item">{{$blog->created_at->diffForHumans()}}</li>
     </ul>
         
     @endforeach
 </div>
</div>
@endsection
