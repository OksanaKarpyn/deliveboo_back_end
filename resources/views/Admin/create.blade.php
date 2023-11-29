@extends('layouts.app')
@section('content')
    @if(isset($restaurants->name))
        <div>{{ $restaurants->name }}</div>
    @endif
@endsection