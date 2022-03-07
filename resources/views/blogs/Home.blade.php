

@extends('../layouts.app')

@section('content')
<div class="container">

    <h1 class="text-secondary text-center">home page</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link  @if($tab=='current') active @endif"  href="/home">current blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if($tab=='trashed') active @endif" href="/trash">trashed blogs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($tab=='with_trashed') active @endif" href="/all">all</a>
         </li>
      
      </ul>

 <div class="row">


   


     @forelse ($blogs as $blog)
 
     <ul class="list-group col-md-8 mt-2">
         <li class="list-group-item active">{{$blog->id}}</li>
         <li class="list-group-item">{{$blog->title}}</li>
         <li class="list-group-item">{{$blog->content}}</li>
         <li class="list-group-item">
           
            @if ($blog->deleted_at==null)

                    @can('delete', $blog) 
                    <form action="destroy/{{$blog->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">delete</button>
                    </form>      
                    @endcan
                
                    @can('update', $blog)
                    <a href="show/{{$blog->id}}" class="btn btn-warning">update</a>
                    @endcan
                <a href="details/{{$blog->id}}" class="btn btn-primary mt-2">details</a>
            
            @else
            <a href="restore/{{$blog->id}}" class="btn btn-primary">restore</a>
            @endif

         </li>
         <li class="list-group-item">{{$blog->category->name}} - published by : {{$blog->user->name}} </li>
         <li class="list-group-item">{{$blog->created_at->diffForHumans()}}</li>
     </ul>
     @empty


     <h1 class="text-secondary text-center">no record</h1>


     @endforelse
 </div>
</div>
@endsection
