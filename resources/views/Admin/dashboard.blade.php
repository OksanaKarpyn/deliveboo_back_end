@extends('layouts.app')
@section('content')
    @if(isset($restaurants->name))
        <div>{{ $restaurants->name }}</div>
        

    @endif
    @foreach($typologies as $typology)
    <div>{{$typology->name}}</div>
    @endforeach
    {{-- <div>{{$typologies->name}}</div> --}}
    <a href="/dishes/create">Aggiungi piatto</a> <br>
    <a href="/dishes">Lista piatti</a>
@endsection