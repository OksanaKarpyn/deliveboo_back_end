@extends('layouts.app')
@section('content')
<div class="container py-4 p-2">
    <div>
        <h1 class="text-dark me-3 ">Menu</h1>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('dashboard.index') }}">&larr; Home Page</a>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('dishes.create') }}">Crea Nuovo Piatto</a>
        <div class="container">
            <div class="row">
                <table>
                    <thead>
                        <tr>
                          <th scope="col" >Id</th>
                          <th scope="col">Nome Piatto</th>
                          <th scope="col">Disponibilità</th>
                          <th scope="col">Prezzo</th>
                          <th scope="col">Azioni</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dishes as $index => $dish )
                            <tr>
                                <th scope="row">{{ $index + 1}}</th>
                                <td><a class="text-decoration-none text-black text-capitalize" href="{{ route('dishes.show', $dish) }}">{{ $dish->name }}</a></td>
                                <td>{{ ($dish->visible === 1) ? "Available" : "Not Available" }}</td>
                                <td>{{ $dish->price }} &euro;</td> 
                                <td>
                                    <a class="btn btn-success text-white me-4 " href="{{ route('dishes.show', $dish) }}">Show</a>

                                    <a class="btn btn-warning me-4 m-1" href="{{ route('dishes.edit', $dish) }}">Edit</a>
                                    <form action="{{ route('dishes.destroy', $dish->id) }}" class="d-inline-block "    method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">Elimina</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  
    
@endsection