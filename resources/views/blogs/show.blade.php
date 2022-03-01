@extends('layouts')

@section('content')
<div class="container">

    <h1 class="text-secondary text-center">Form Page</h1>

  

    <form action="/update/{{$blog->id}}" method="POST" class="form-group col-md-6 offset-3">
        @csrf
        @method('PUT')

        <input placeholder="title" name="title" type="text" class="form-control mt-2 @error('title') is-invalid @enderror"  value="{{$blog->title}}">
        @error('title')
       <span class="text-danger">{{ $message }}</span>
        @enderror

        <input placeholder="content" name="content" type="text" class="form-control mt-2 @error('content') is-invalid @enderror"  value="{{$blog->content}}">
        @error('content')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <button class="btn btn-outline-warning mt-2 form-control">save</button>

    </form>
</div>
@endsection