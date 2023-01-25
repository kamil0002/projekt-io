@extends('layouts.app')

@section('content')
<div class="content-of-admin-panel container py-5 d-flex justify-content-center flex-column shadow-sm align-items-center" style="margin-top: 15vw;">
    <h4 class="display-7 mb-5 text-center">Jakim zasobem chcesz zarządzać?</h4>
    <div class="btn-group mb-4" role="group" aria-label="Basic example">
        <a class="btn btn-primary me-2" href="{{ route('admin.users') }}"> {{ __('Użytkownik') }}</a>
        <a class="btn btn-primary me-2" href="{{ route('admin.cars') }}"> {{ __('Samochody') }}</a>
        <a class="btn btn-primary" href="{{ route('admin.returns') }}">{{ __('Zwroty') }}</a>
    </div>
</div>
@endsection
