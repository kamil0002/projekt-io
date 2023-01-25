@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="container col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-5">
            <h2 class="mt-5 mb-5 text-center">Zaloguj się</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label mx-4">{{ __('Adres email') }}</label>
                    <input autocomplete="off" id="email" type="email" class="form-control rounded-pill border-0 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label mx-4">{{ __('Hasło') }}</label>
                    <input id="password" type="password" class="form-control rounded-pill border-0 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <button type="submit" class="login-btn btn btn-primary col-12 rounded-pill">
                        {{ __('Zaloguj się') }}
                    </button>
                    <div class="log-or-reg mb-4 mt-4">
                        <hr class="hr-or">
                        <span class="span-or">LUB</span>
                    </div>
                    @if (Route::has('register'))
                            <a class="register-btn btn col-12 rounded-pill btn-outline-dark"
                                href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
