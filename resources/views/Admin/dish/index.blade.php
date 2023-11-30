@extends('layouts.app')
@section('content')
   <h1>test</h1>
   @if(isset($dishes))
    @foreach ($dishes as $dish)
        <h2>{{$dish->name}}</h2>
        <h2>{{$dish->ingredients}}</h2>
    @endforeach
    @endif
   
@endsection