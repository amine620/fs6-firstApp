
   @extends('layouts')
   
   @section('content')
       
   <h1>details page </h1>

     {{-- <ul>
         <li>{{$userInfo['name']}}</li>
         <li>{{$userInfo['email']}}</li>
     </ul> --}}


     {{-- @foreach ($userInfo as $user)
         <ul>
             <li>{{$user}}</li>
         </ul>
     @endforeach --}}

     @forelse ($userInfo as $user)
     <ul>
        <li>{{$user}}</li>
    </ul>
     @empty
         <h1>no user found</h1>
     @endforelse
   @endsection

