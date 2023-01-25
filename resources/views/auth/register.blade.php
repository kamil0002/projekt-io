@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@section('content')
    <div class="container col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <h2 class="mt-5 mb-4 text-center">Formularz rejestracyjny</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label mx-4">{{ __('Imię') }}</label>
                <input autocomplete="off"  id="name" type="text" class="form-control rounded-pill border-0 @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surname" class="form-label mx-4">{{ __('Nazwisko') }}</label>
                <input autocomplete="off"  id="surname" type="text"
                    class="form-control rounded-pill border-0 @error('surname') is-invalid @enderror" name="surname"
                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pesel" class="form-label mx-4">{{ __('Pesel') }}</label>
                <input autocomplete="off"  id="pesel" type="text"
                    class="form-control rounded-pill border-0 @error('pesel') is-invalid @enderror" name="pesel"
                    value="{{ old('pesel') }}" required autocomplete="pesel" autofocus>
                @error('pesel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="form-label mx-4">{{ __('Adres') }}</label>
                <input autocomplete="off"  id="address" type="text"
                    class="form-control rounded-pill border-0 @error('address') is-invalid @enderror" name="address"
                    value="{{ old('address') }}" required autocomplete="address" autofocus>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label mx-4">{{ __('Telefon') }}</label>
                <input autocomplete="off"  id="phone" type="text"
                    class="form-control rounded-pill border-0 @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label mx-4">{{ __('Email') }}</label>
                <input autocomplete="off"  id="email" type="text"
                    class="form-control rounded-pill border-0 @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label mx-4">{{ __('Hasło') }}</label>
                <input  id="password" type="password"
                    class="form-control rounded-pill border-0 @error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}" required autocomplete="password" autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password-confirm" class="form-label mx-4">{{ __('Potwierdź hasło') }}</label>
                <input id="password-confirm" type="password" class="form-control rounded-pill border-0"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
            <div>
                <button type="submit" class="register-btn btn col-12 col rounded-pill btn-outline-dark">
                    {{ __('Zarejestruj się') }}
                </button>
            </div>
        </form>
    </div>
@endsection
