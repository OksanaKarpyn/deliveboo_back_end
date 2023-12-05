@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="formRegister" method="POST" action="{{ route('register') }}" enctype = "multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus oninput=" validateName()">
                                <div id="name-error" class="text-danger"></div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" oninput="validateEmail()">
                                <div id="email-error" class="text-danger"></div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="activity_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività') }}</label>

                            <div class="col-md-6">
                                <input id="activity_name" type="text" class="form-control @error('activity_name') is-invalid @enderror" name="activity_name" value="{{ old('activity_name') }}" autocomplete="activity_name" oninput="validateActivityName()">
                                <div id="activity-name-error" class="text-danger"></div>
                                @error('activity_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" oninput="validateAddress()">
                                <div id="address-error" class="text-danger"></div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="piva" class="col-md-4 col-form-label text-md-right">{{ __('P. IVA') }}</label>

                            <div class="col-md-6">
                                <input id="piva" type="number" class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" autocomplete="piva" oninput="validateIva()">
                                <div id="piva-error" class="text-danger"></div>
                                @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="photo" value="{{ old('img') }}" autocomplete="img">
                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="tipology" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia') }}</label>

                            <div class="col-md-6">
                                <div id="typology-error" class="text-danger"></div>
                                @foreach ($typologies as $typology)
                                    
                                <div class="form-check">
                                    <input class="form-check-input @error('typology') is-invalid @enderror" type="checkbox" oninput="validateTypologies()" name="typologies[]" value="{{$typology->id}}" id="typology-checkbox-{{$typology->id}}">
                                    <label class="form-check-label" for="typology-checkbox-{{$typology->id}}">
                                    {{$typology->name}}
                                    </label>
                                </div>
                                @endforeach
                                @error('typology')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" oninput="validatePassword()">
                                 <div id="password-error" class="text-danger"></div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror "  name="password_confirmation"  autocomplete="new-password" oninput="validateConfirmPassword()">
                                <div id="password-confirm-error" class="text-danger"></div>
                                @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="submit-btn" type="submit" class="btn btn-primary" onclick="submitForm(event)">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function submitForm(event) {
        if (
        validateName() &&
        validateEmail() &&
        validateActivityName() &&
        validateAddress() &&
        validateIva() &&
        validateTypologies() &&
        validatePassword() &&
        validateConfirmPassword()
    ) {
        document.getElementById('formRegister').submit();
        return true;
    } else {
        validateName();
        validateEmail(); 
        validateActivityName();
        validateAddress();
        validateIva(); 
        validateTypologies();
        validatePassword();
        validateConfirmPassword();
        event.preventDefault(); // Serve per bloccare l'invio del form
        return false;
    }

    }

    function validateName() {
        let nameInput = document.querySelector('input[name="name"]')
        let nameValue = document.querySelector('input[name="name"]').value;
        let nameError = document.querySelector('#name-error');
        if (!nameValue.trim()) {
            nameError.textContent = 'Il campo "Name" deve essere compilato.';
         
            nameInput.classList.add('is-invalid');
            return false;
        } else{
            nameError.textContent = '';
            nameInput.style.border = '1px solid green';
            nameInput.classList.remove('is-invalid');
            // nameInput.classList.add('is-valid');
            return true;
        
        }
    }

    function validateEmail() {
        let emailInput = document.querySelector('input[name="email"]');
        let emailValue = document.querySelector('input[name="email"]').value;
        let emailError = document.querySelector('#email-error');
        // let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; !emailRegex.test(emailValue)

        if (!emailValue.includes('@')) {
            emailError.textContent = 'Inserisci un indirizzo email valido.';
            // emailInput.style.border = '1px solid red';
            emailInput.classList.add('is-invalid');
            return false;
        } else {
            emailError.textContent = '';
            // emailInput.style.border = '1px solid green';
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            return true;
        }
    }

    function validateActivityName(){
        let activityNameInput = document.querySelector('input[name="activity_name"]');
        let activityName = document.querySelector('input[name="activity_name"]').value;
        let activityNameError = document.querySelector('#activity-name-error');
        if(!activityName){
            activityNameError.textContent = 'Il campo "Nome Attivita" deve essere compilato.';
            // activityNameInput.style.border = '1px solid red';
            activityNameInput.classList.add('is-invalid');
            return false
        }else{
            activityNameError.textContent = '';
            activityNameInput.style.border = '1px solid green';
            activityNameInput.classList.remove('is-invalid');
            // activityNameInput.classList.add('is-valid');
            return true;
        }
    }
    function validateAddress(){
        let addressInput = document.querySelector('input[name="address"]')
        let address = document.querySelector('input[name="address"]').value;
        let addressError = document.querySelector('#address-error');
        if(!address){
            addressError.textContent = 'Il campo "Nome "Indirizzo" deve essere compilato.';
            // addressInput.style.border = '1px solid red';
            addressInput.classList.add('is-invalid');
            return false
        }else{
            addressError.textContent = '';
            addressInput.style.border = '1px solid green';
            addressInput.classList.remove('is-invalid');
            // addressInput.classList.add('is-valid');
            return true;
        }
    }
    function validateIva(){
        let pIvaInput = document.querySelector('input[name="piva"]');
        let pIvaValue = document.querySelector('input[name="piva"]').value;
        let pIvaError = document.querySelector('#piva-error');
        let pivaRegex = /^\d{11}$/;
        if(!pIvaValue || !pivaRegex.test(pIvaValue) ){ 
            pIvaError.textContent = 'Inserisci una Partita IVA italiana valida (11 cifre).';
            pIvaInput.classList.add('is-invalid');
            pIvaInput.style.border = '1px solid red';
            return false
        }else{
            pIvaInput.classList.remove('is-invalid');
            pIvaInput.classList.add('is-valid');
            pIvaInput.style.border = '1px solid green';
            pIvaError.textContent = '';
            return true;
        }
        //La funzione test() è una funzione integrata degli oggetti(espressioni regolari)
        // e viene utilizzata per verificare se una stringa corrisponde a un pattern specificato dall'espressione regolare.
    }
    function validateTypologies(){
        let typologiesValue = document.querySelectorAll('input[name="typologies[]"]');
        let typologyError = document.querySelector('#typology-error');
    
        if (typologiesValue.length === 0 || !Array.from(typologiesValue).some(checkbox => checkbox.checked)) {
            typologyError.textContent = 'Seleziona almeno una tipologia.';
            return false;
        } else {
            typologyError.textContent = '';
            return true;
        }

        //Array.from(typologyValue) Questo converte la NodeList typologyValue (che è restituita da querySelectorAll) in un array.
       // La NodeList è una collezione di nodi, simile a un array, ma non dispone degli stessi metodi e proprietà.
        //Array.from è utilizzato per creare un array da questa collezione, rendendo più facile manipolare i suoi elementi.

        //.some(checkbox => checkbox.checked):
         //"some" è un metodo degli array in JavaScript che restituisce true se almeno un elemento nell'array un checkbox è stato selezionato   
    }
    function validatePassword(){
        let passwordIntput = document.querySelector('input[name="password"]');
        let passwordValue = document.querySelector('input[name="password"]').value;
        let passwordError = document.querySelector('#password-error');
    
        if (!passwordValue) {
            passwordError.textContent = 'Il campo "Password" deve essere compilato.';
            // passwordIntput.style.border = '1px solid red';
            passwordIntput.classList.add('is-invalid');
            return false;
        } else {
            passwordError.textContent = '';
            passwordIntput.style.border = '1px solid green';
            passwordIntput.classList.remove('is-invalid');
            // passwordIntput.classList.add('is-valid');
            return true;
        }

    }
    function validateConfirmPassword(){
         let confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
         let passwordValue = document.querySelector('input[name="password"]').value;
         let confirmPasswordValue = document.querySelector('input[name="password_confirmation"]').value;
         let passwordConfirmError = document.querySelector('#password-confirm-error');
        if(!confirmPasswordValue){
            confirmPasswordInput.style.border = '1px solid red';
            confirmPasswordInput.classList.add('is-invalid');
            passwordConfirmError.textContent = 'Il campo "Confirm Password" deve essere compilato.';
            return false;
        }else if (passwordValue !== confirmPasswordValue) {
            passwordConfirmError.textContent = 'Le password non corrispondono.';
            confirmPasswordInput.style.border = '1px solid red';
            confirmPasswordInput.classList.add('is-invalid');
            return false;
       } else {
            passwordConfirmError.textContent = '';
            confirmPasswordInput.style.border = '1px solid green';
            confirmPasswordInput.classList.remove('is-invalid');
            confirmPasswordInput.classList.add('is-valid');
            return true;
       }
    }

</script>
@endsection
