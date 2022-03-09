
   @extends('../layouts.app')

   
   @section('content')
       
   <div class="container">

    <h1 class="text-secondary text-center">details page</h1>


    <ul class="list-group col-md-8 mt-2">
        <li class="list-group-item active">{{$blog->id}}</li>
        <li class="list-group-item">{{$blog->title}}</li>
        <li class="list-group-item">{{$blog->content}}</li>
        <li class="list-group-item">
            <a href="/" class="btn btn-warning">back</a>
        </li>
    </ul>     
 
</div>

    <div class="container mt-5">
        <form action="/add" class="form-group col-md-8" method="POST">
            @csrf
            <input name="content" type="text" placeholder="comment.." class="form-control">
            <input type="hidden" value="{{$blog->id}}" name="blog_id">
            <button class="btn btn-primary form-control mt-2">comment</button>
        </form>
    </div>

     <div class="container">
         
             @foreach ($blog->comments as $comment)    
             <div class="card mt-2">
                <div class="card-header">
                 {{ $comment->created_at->diffForHumans()}}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$comment->user->name}}</h5>
                  <p class="card-text">{{$comment->content}}</p>
                </div>
                <form action="/deleteComment/{{$comment->id}}" method="post">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger float-right mx-2 my-2">delete</button>

                </form>
              </div>
             @endforeach
        

     </div>

   @endsection

