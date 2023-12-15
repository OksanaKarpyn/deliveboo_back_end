@extends('layouts.app')
@section('content')
    <div class="container p-3  vh-100 border border-success">
        <div class="row ">
            <div class="card">
                <div class="p-3 col-sm-12 col-md-12 col-xl-12 col-xxl-3 bordo-r">
                    @if($restaurants->photo)
                        <img class="rounded-circle col-6"  src="{{ asset('storage/' . $restaurants->photo) }}" alt="foto">    
                    @else
                       <div class="img-link d-flex justify-content-center align-items-center">
                           <img class="doctor-img rounded-circle" src="https://picsum.photos/200/200" alt="fotoDefault">    
                       </div>
                       
                    @endif
                </div>
                <div class="card-body">
                    @if(isset($restaurants->name))
                    <div>
                        <h6>Nome Ristorante:</h6>
                        {{ $restaurants->name }}</div>    
                    @endif

                    <h6>Lista tipologie selezionate:</h6>
                    @foreach($restaurants->typologies as $item)
                        <div>{{$item->name}}</div>
                    @endforeach
                </div>
            </div>
        </div>
        

    <a href="/dishes" class="btn btn-success my-3">Accedi al Menu</a>
    <a href="/orders" class="btn btn-success">Accedi ai Ordini</a>
    </div>
   

    {{-- <img class="rounded-circle col-6"  src="{{ asset('storage/' . $restaurants->photo) }}" alt="foto"> --}}
   
@endsection