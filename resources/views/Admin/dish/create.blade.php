@extends('layouts.app')
@section('content')
   <h1>test</h1>
   
   <form action="{{route("dishes.store")}}" mothod="POST" enctype="mupltipart/form-data">
    @csrf
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

        <div class="form-group mb-3">
            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto</label>
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="file" name="photo" id="photo" class="form-control" accept=".png, .jpg, .jpeg, .gif">
            <div class="invalid-feedback" id="photo-feedback"></div>
        </div>

        <div class="mb-4 row">
          <div>

            <button type="submit">Salva Piatto</button>
          </div>
      </div>
    </div>

    
   </form>
   
@endsection