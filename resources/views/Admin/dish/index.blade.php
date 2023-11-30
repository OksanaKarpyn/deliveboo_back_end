@extends('layouts.app')
@section('content')
   <h1>i tuoi piatti</h1>
   <a href="/dishes/create">Aggiungi piatto</a>
   @if(isset($dishes))
    @foreach ($dishes as $dish)
        <h2>{{$dish->name}}</h2>
        <h2>{{$dish->ingredients}}</h2>
        <p>{{$dish->price}}</p>
        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-primary btn-sm">Modifica</a>
          <form action="{{ route('dishes.destroy', $dish->id) }}"     method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
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