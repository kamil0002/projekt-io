@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')

    <div class="container col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <h2 class="mt-5 mb-4 text-center">
            Dodawanie opinii
        </h2>
        <form method="POST" action="{{ route('opinion_create') }}">
            @csrf
            <div class="mb-4">
                <div class="form-group">
                    <label class="mb-2 text-center" for="content">{{ __('Zawartość opinii') }}</label>
                    <textarea maxlength="30" style="resize: none;" class="form-control rounded-3l border-0 @error('content') is-invalid @enderror"
                              name="content" autocomplete="content" autofocus></textarea>
                </div>
                @error('content')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <button type="submit" class="register-btn btn col-12 col rounded-pill btn-outline-dark">
                    {{ __('Dodaj opinię') }}
                </button>
            </div>
        </form>
    </div>
@endsection
