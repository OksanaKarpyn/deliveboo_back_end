@extends('layouts.app')
@section('content')
   <h1>test</h1>
   
   <form action="{{route("dishes.store")}}" mothod="POST">
    <div class="col-5 m-auto">

        <div class="mb-4 row">
            <label for="name">Nome piatto</label>
            <input type="text" name="name" id="name">
        </div>
    
        <div class="mb-4 row">
            <label for="ingredients">Ingredienti</label>
            <input type="text" name="ingredients" id="ingredients">
        </div>
    
        <div class="mb-4 row">
            <label for="price">Prezzo</label>
            <input type="text" name="price" id="price">
        </div>
    
        <div class="mb-4 row">
            <label for="visiblility">Visibilità</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Visibile
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Invisibile
                </label>
              </div>
        </div>
    </div>

    
   </form>
   
@endsection