
   @extends('layouts')
   @section('content')
            <h1>users list</h1>
            @foreach ($users as $user)
            @if ($user['isAdmin'])   
            <ul>
                <li>{{$user['name']}}</li>
                <li>{{$user['email']}}</li>
            </ul>
            @endif
            @endforeach
    @endsection
    

