@extends('layouts.app')
@section('content')
<div class="container my-3">

    <h1 class="mb-5 text-center"><em>Crea nuovo piatto</em></h1>

   
   <form action="{{route("dishes.store")}}" id="createForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-5 m-auto">

        <div class="mb-4 row">
            <label for="name" class="form-label">Nome Piatto</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" oninput="validateName()">
            <div id="name-error" class="text-danger"></div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    
        <div class="mb-4 row">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" name="description" id="description" maxlength="1000" class="form-control @error('description') is-invalid @enderror" oninput="validateDescription()">
            <div id="description-error" class="text-danger"></div>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4 row">
          <label for="ingredients" class="form label">Ingredienti</label>
          <input type="text" name="ingredients" id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" oninput="validateIngredients()">
          <div id="ingredients-error" class="text-danger"></div>
            @error('ingredients')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>
    
        <div class="mb-4 row">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" oninput="validatePrice()">
            <div id="price-error" class="text-danger"></div>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    
        <div class="mb-4 row">
          <label for="visible">Visibilità</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible1" value="1" checked>
              <label class="form-check-label" for="visible1">
                  Visibile
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible2" value="0" required>
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
            <input type="file" name="photo" id="photo" class="form-control" accept=".png, .jpg, .jpeg, .gif">
            <div class="invalid-feedback" id="photo-feedback"></div>
        </div>

        <div class="mb-4 row">
          <div>

            <button type="submit" class="btn btn-primary" onclick="submitForm(event)" >Salva Piatto</button>
          </div>
      </div>
    </div>

    
   </form>
</div>
@endsection
@section('script')
<script>

    function submitForm(event){
        if(
            validateName()&&
            validateDescription()&&
            validateIngredients()&&
            validatePrice()

        ){
            document.getElementById('createForm').submit();
            return true;
        }else{
            validateName();
            validateDescription();
            validateIngredients();
            validatePrice();
            event.preventDefault(); // Serve per bloccare l'invio del form
            return false;
        }
    }
    function validateName() {
        let nameInput = document.querySelector('input[name="name"]');
        let nameValue = document.querySelector('input[name="name"]').value;
        let nameError = document.querySelector('#name-error');
        if (!nameValue.trim()) {
            nameError.textContent = 'Il campo "Nome Piatto" deve essere compilato.';
            nameInput.classList.add('is-invalid');
            nameInput.style.border = '1px solid red';
            return false;
        } else{
            nameError.textContent = '';
            nameInput.style.border = '1px solid green';
            nameInput.classList.remove('is-invalid');
            // nameInput.classList.add('is-valid');
            return true;
        
        }
    }
    function validateDescription(){
        let descriptionInput = document.querySelector('input[name="description"]');
        let descriptionValue = document.querySelector('input[name="description"]').value;
        let descriptionError = document.querySelector('#description-error');
        if(!descriptionValue.trim()){
            descriptionError.textContent = 'Il campo "Descrizione" deve essere compilato ed è di max 1000 caratteri';
            descriptionInput.classList.add('is-invalid');
            descriptionInput.style.border = '1px solid red';

            return false;
        }else {
            descriptionError.textContent = '';
            descriptionInput.classList.remove('is-invalid');
            descriptionInput.style.border = '1px solid green';
            // descriptionInput.classList.add('is-valid');
            return true;
        }
    }
    function validateIngredients(){
            let ingredientsInput = document.querySelector('input[name="ingredients"]');
            let ingredientsValue = document.querySelector('input[name="ingredients"]').value;
            let ingredientsError = document.querySelector('#ingredients-error');
            if (!ingredientsValue.trim()) {
                ingredientsError.textContent = 'Il campo "Ingredienti" deve essere compilato.';
                ingredientsInput.classList.add('is-invalid');
                ingredientsInput.style.border = '1px solid red';
                return false;
            } else{
                ingredientsError.textContent = '';
                ingredientsInput.style.border = '1px solid green';
                ingredientsInput.classList.remove('is-invalid');
                return true;
            
            }
    }

    function validatePrice(){
        let priceInput = document.querySelector('input[name="price"]');
        let priceValue = priceInput.value.trim();
        let priceError = document.querySelector('#price-error');

         if (priceValue === '' || priceValue < 0) {
            priceError.textContent = 'Il campo "Prezzo" deve contenere un valore numerico positivo.';
            priceInput.classList.add('is-invalid');
            priceInput.style.border = '1px solid red';
            return false;
        } else {
            priceError.textContent = '';
            priceInput.classList.remove('is-invalid');
            priceInput.style.border = '1px solid green';
            return true;
        }

    }
</script>
@endsection