@extends('layouts.app')
@section('content')
   <h1>Aggiungi un piatto</h1>
   
   <form mothod="POST" action="{{ route('dishes.store') }}" >
 
    <div class="col-5 m-auto">

        <div class="mb-4 row">
            <label for="name">Nome piatto</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="mb-4 row">
            <label for="description">Descrizione</label>
            <input type="text" name="description" id="description">
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
                <input class="form-check-input" type="radio" name="visible[]" value="visible" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Visibile
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="visible[]" value="invisible" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Invisibile
                </label>
              </div>
        </div>
        <div class="mb-4 row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </div>

    
   </form>
   
@endsection