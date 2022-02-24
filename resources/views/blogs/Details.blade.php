
   @extends('layouts')
   
   @section('content')
       
   <div class="container">

    <h1 class="text-secondary text-center">details page</h1>


    <ul class="list-group col-md-4 mt-2">
        <li class="list-group-item active">{{$blog->id}}</li>
        <li class="list-group-item">{{$blog->title}}</li>
        <li class="list-group-item">{{$blog->content}}</li>
        <li class="list-group-item">
            <a href="/home" class="btn btn-warning">back</a>
        </li>
    </ul>
        
 
</div>
   @endsection

