@extends('layouts.app')
@section('content')
    <div class="container p-3">

        <div class="p-3 col-sm-12 col-md-12 col-xl-12 col-xxl-3 bordo-r">
            @if($restaurants->photo)
                <img class="rounded-circle col-6"  src="{{ asset('storage/' . $restaurants->photo) }}" alt="foto">    
            @else
               <div class="img-link d-flex justify-content-center align-items-center">
                   <img class="doctor-img rounded-circle" src="https://picsum.photos/200/300" alt="">    
               </div>
               
            @endif
           </div>

    </div>
    @if(isset($restaurants->name))
        <div>{{ $restaurants->name }}</div>
        

    @endif
    @foreach($typologies as $typology)
    <div>{{$typology->name}}</div>
    @endforeach

    {{-- <img class="rounded-circle col-6"  src="{{ asset('storage/' . $restaurants->photo) }}" alt="foto"> --}}
    <a href="/dishes/create">Aggiungi piatto</a> <br>
    <a href="/dishes">Lista piatti</a>
@endsection