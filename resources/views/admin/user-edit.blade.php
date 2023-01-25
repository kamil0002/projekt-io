@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
    @if (session('status'))
        <div class="alert alert-success text-center mt-5" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <h2 class="mt-5 mb-4 text-center">Edycja - {{$user->name}} {{$user->surname}}</h2>
        <form method="POST" action="{{ route('admin.users.update',['id' => $user->id]) }}">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="name" class="form-label mx-4">{{ __('Imię') }}</label>
                <input id="name" type="text" class="form-control rounded-pill border-0 @error('name') is-invalid @enderror"
                       name="name" value="{{ $user->name }}"  autocomplete="name" autofocus required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surname" class="form-label mx-4">{{ __('Nazwisko') }}</label>
                <input id="surname" type="text"
                       class="form-control rounded-pill border-0 @error('surname') is-invalid @enderror" name="surname"
                       value="{{ $user->surname }}"  autocomplete="surname" autofocus required>
                @error('surname')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pesel" class="form-label mx-4">{{ __('Pesel') }}</label>
                <input id="pesel" type="text"
                       class="form-control rounded-pill border-0 @error('pesel') is-invalid @enderror" name="pesel"
                       value="{{ $user->pesel }}"  autocomplete="pesel" autofocus required>
                @error('pesel')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="form-label mx-4">{{ __('Adres') }}</label>
                <input id="address" type="text"
                       class="form-control rounded-pill border-0 @error('address') is-invalid @enderror" name="address"
                       value="{{ $user->address  }}"  autocomplete="address" autofocus required>
                @error('address')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label mx-4">{{ __('Telefon') }}</label>
                <input id="phone" type="text"
                       class="form-control rounded-pill border-0 @error('phone') is-invalid @enderror" name="phone"
                       value="{{ $user->phone  }}"  autocomplete="phone" autofocus required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label mx-4">{{ __('Email') }}</label>
                <input id="email" type="text"
                       class="form-control rounded-pill border-0 @error('email') is-invalid @enderror" name="email"
                       value="{{ $user->email }}"  autocomplete="email" autofocus required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label mx-4">{{ __('Hasło') }}</label>
                <input id="password" type="password"
                       class="form-control rounded-pill border-0 @error('password') is-invalid @enderror" name="password"
                       value=""  autocomplete="password" autofocus required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password-confirm" class="form-label mx-4">{{ __('Potwierdź hasło') }}</label>
                <input id="password-confirm" type="password" class="form-control rounded-pill border-0"
                       name="password_confirmation"  autocomplete="new-password" required>
            </div>
            <div>
                <button type="submit" class="register-btn btn col-12 col rounded-pill btn-outline-dark">
                    {{ __('Edytuj') }}
                </button>
            </div>
        </form>
    </div>
@endsection
