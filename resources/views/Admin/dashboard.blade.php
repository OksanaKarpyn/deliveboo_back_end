@extends('layouts.app')
@section('content')
    @if(isset($restaurants->name))
        <div>{{ $restaurants->name }}</div>
    @endif

    <a href="/dishes/create">Aggiungi piatto</a> <br>
    <a href="/dishes">Lista piatti</a>
@endsection