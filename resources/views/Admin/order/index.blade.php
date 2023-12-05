@extends('layouts.app')
@section('content')
<div class="container py-4 p-2">
    <div>
        <h1 class="text-dark me-3 ">Ordini</h1>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('dashboard.index') }}">&larr; Home Page</a>
       
        <div class="container">
            <div class="row">
                <table>
                    <thead>
                        <tr>
                          <th scope="col" >Id</th>
                          <th scope="col">Info Cliente</th>
                          <th scope="col">Piatti Ordinati</th>
                          <th scope="col">Prezzo Totale</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $index =>$order )
                            <tr>
                                <th scope="row">{{ $index + 1}}</th>
                                <td>
                                    <h5>{{ $order->name }} {{$order->lastname}}</h5>
                                    <p>Indirizzo: {{$order->address}}</p>
                                    <p>Tel: {{$order->phone}}</p>
                                </td>
                                <td>
                                    @foreach ($order->dishes as $dish)
                                    <li>{{ $dish->name }} - Quantity: {{ $dish->pivot->quantity }}<span
                                        class="fw-bold">x{{ $dish->pivot->qt_item }}</span></li>
                                @endforeach
                                </td>
                                {{-- <td>{{$order->create_at}}</td> --}}
                                {{-- <td>{{ ($order->visible === 1) ? "Available" : "Not Available" }}</td> --}}
                                <td>{{ $order->totalprice }} &euro;</td> 
                                
                            </tr>

                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection