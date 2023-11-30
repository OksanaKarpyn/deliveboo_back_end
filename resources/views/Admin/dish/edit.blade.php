@extends('layouts.app')
@section('content')
   <h1>Modifica {{ $dish->name }}</h1>
   
   <form method="post" action="{{ route('dishes.update', $dish->id) }}" >
    @csrf
    @method('PUT')
    <div class="col-5 m-auto">

        <div class="mb-4 row">
            <label for="name">Nome piatto</label>
            <input type="text" name="name" id="name" value="{{ $dish->name }}" required>
        </div>
    
        <div class="mb-4 row">
            <label for="description">Descrizione</label>
            <input type="text" name="description" id="description" value="{{ $dish->description }}" required>
        </div>

        <div class="mb-4 row">
          <label for="ingredients">Ingredienti</label>
          <input type="text" name="ingredients" id="ingredients" value="{{ $dish->ingredients }}" required>
      </div>
    
        <div class="mb-4 row">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $dish->price }}" required>
        </div>
    
        <div class="mb-4 row">
          <label for="visible">Visibilità</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible1" value="1" {{$dish->visible == '1' ? 'checked' : ''}}>
              <label class="form-check-label" for="visible1">
                  Visibile
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible2" value="0" {{$dish->visible == '0' ? 'checked' : ''}}>
              <label class="form-check-label" for="visible2">
                  Invisibile
              </label>
          </div>
      </div>

        <div class="form-group mb-3">
            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto</label>
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="file" name="photo" id="photo" class="form-control" accept=".png, .jpg, .jpeg, .gif" value="{{ $dish->photo }}">
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