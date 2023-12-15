@extends('layouts.app')
@section('content')
    <div class="col-8 mx-auto p-2">

        <a href="{{ route('dishes.index') }}" class="btn btn-info">Torna indietro</a>
        <div>{{$singleDish->name}}</div>
        <h2>{{$singleDish->ingredients}}</h2>
        <div class="p-3 col-sm-12 col-md-12 col-xl-12 col-xxl-3 bordo-r">
            @if($singleDish->photo)
                <img class="rounded-circle col-6"  src="{{ asset('storage/' . $singleDish->photo) }}" alt="foto">    
            @else
            <div class="img-link d-flex justify-content-center align-items-center">
                <img class="doctor-img rounded-circle" src="https://picsum.photos/200/300" alt="">    
            </div>
            
            @endif
        </div>

    </div>
@endsection