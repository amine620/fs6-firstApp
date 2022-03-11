

@extends('../layouts.app')

@section('content')
<div class="container">

    <h1 class="text-secondary text-center">home page</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link  @if($tab=='current') active @endif"  href="/">current blogs</a>
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
         <img src="{{Storage::url($blog->photo)}}" alt="">
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
            <form action="/forceDelete/{{$blog->id}}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" onclick="return confirm('are you sure?')">Permanently Deleting </button>
                <a href="restore/{{$blog->id}}" class="btn btn-primary">restore</a>
            </form>
            @endif

         </li>
         <li class="list-group-item"> <span class="badge bg-primary">{{$blog->category->name}}</span>  - published by : {{$blog->user->name}} - ({{$blog->comments->count()}}) comments </li>
         <li class="list-group-item">{{$blog->created_at->diffForHumans()}}</li>
         <li class="list-group-item">
             @if ($blog->likes()->where('blog_id',$blog->id)->where('user_id',Auth::user()->id)->first())
                 
             <form action="/removeLike" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{$blog->id}}" name="blog_id">

                <button style="border:none;background-color:white" class="float-right"> 
                    <i class="fa fa-heart " style="font-size:20px;color:red;"></i>
                    <span style="font-size:20px;">({{$blog->likes->count()}})</span>
                </button>
              

            </form>
             @else
             <form action="/storeLike" method="post">
                @csrf
                <input type="hidden" value="{{$blog->id}}" name="blog_id">
                <button style="border:none;background-color:white" class="float-right">
                    <i class="fa fa-heart-o" style="font-size:20px;"></i>
                    <span style="font-size:20px;">({{$blog->likes->count()}})</span>
                </button>
            </form>
             @endif
          

         </li>
     </ul>
     @empty

 
     <h1 class="text-secondary text-center">no record</h1>


     @endforelse

    
     
    </div>
    <div class="mt-5">

        {{ $blogs->links() }}
    </div>
</div>
@endsection
