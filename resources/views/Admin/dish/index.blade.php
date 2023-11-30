@extends('layouts.app')
@section('content')
   <h1>test</h1>
   @if(isset($dishes))
    @foreach ($dishes as $dish)
        <h2>{{$dish->name}}</h2>
        <h2>{{$dish->ingredients}}</h2>
        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-primary btn-sm">Edit</a>
          <form action="{{ route('dishes.destroy', $dish->id) }}"     method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
           </form>


           <div class="p-3 col-sm-12 col-md-12 col-xl-12 col-xxl-3 bordo-r">
            @if($dish->photo)
                <img class="rounded-circle col-6"  src="{{ asset('storage/' . $dish->photo) }}" alt="foto">    
            @else
               <div class="img-link d-flex justify-content-center align-items-center">
                   <img class="doctor-img rounded-circle" src="https://picsum.photos/200/300" alt="">    
               </div>
               
            @endif
        </div>
    @endforeach
    
    @endif
  
    
@endsection