@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
    @if (session('status'))
        <div class="alert alert-success text-center mt-5" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <h2 class="mt-5 mb-4 text-center">Edycja - {{ $car->brand }} {{ $car->model }}</h2>
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.cars.update', ['id' => $car->id]) }}">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="brand" class="form-label mx-4">{{ __('Marka') }}</label>
                <input id="brand" type="text" class="form-control rounded-pill border-0 @error('brand') is-invalid @enderror"
                    name="brand" value="{{ $car->brand }}" autocomplete="brand" autofocus required>
                @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="model" class="form-label mx-4">{{ __('Model') }}</label>
                <input id="model" type="text"
                    class="form-control rounded-pill border-0 @error('model') is-invalid @enderror" name="model"
                    value="{{ $car->model }}" autocomplete="model" autofocus required>
                @error('model')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="car_body" class="form-label mx-4">{{ __('Nadwozie') }}</label>
                <input id="car_body" type="text"
                    class="form-control rounded-pill border-0 @error('car_body') is-invalid @enderror" name="car_body"
                    value="{{ $car->car_body }}" autocomplete="car_body" autofocus required>
                @error('car_body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="year_of_production" class="form-label mx-4">{{ __('Rok') }}</label>
                <input id="year_of_production" type="text"
                    class="form-control rounded-pill border-0 @error('year_of_production') is-invalid @enderror"
                    name="year_of_production" value="{{ $car->year_of_production }}" autocomplete="year_of_production"
                    autofocus required>
                @error('year_of_production')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="drive" class="form-label mx-4">{{ __('Nap??d') }}</label>
                <input id="drive" type="text"
                    class="form-control rounded-pill border-0 @error('drive') is-invalid @enderror" name="drive"
                    value="{{ $car->drive }}" autocomplete="drive" autofocus required>
                @error('drive')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="engine_power" class="form-label mx-4">{{ __('Moc') }}</label>
                <input id="engine_power" type="text"
                    class="form-control rounded-pill border-0 @error('engine_power') is-invalid @enderror"
                    name="engine_power" value="{{ $car->engine_power }}" autocomplete="engine_power" autofocus required>
                @error('engine_power')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="acceleration" class="form-label mx-4">{{ __('Przy??pieszenie') }}</label>
                <input id="acceleration" type="acceleration"
                    class="form-control rounded-pill border-0 @error('acceleration') is-invalid @enderror"
                    name="acceleration" value="{{ $car->acceleration }}" autocomplete="acceleration" autofocus required>
                @error('acceleration')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="maximum_speed" class="form-label mx-4">{{ __('Pr??dko???? maksymalna') }}</label>
                <input id="maximum_speed" type="text"
                    class="form-control rounded-pill border-0 @error('maximum_speed') is-invalid @enderror"
                    name="maximum_speed" value="{{ $car->maximum_speed }}" autocomplete="maximum_speed" autofocus required>
                @error('maximum_speed')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="mb-4">
                <label for="battery_capacity" class="form-label mx-4">{{ __('Pojemno???? baterii') }}</label>
                <input id="battery_capacity" type="text"
                    class="form-control rounded-pill border-0 @error('battery_capacity') is-invalid @enderror"
                    name="battery_capacity" value="{{ $car->battery_capacity }}" autocomplete="battery_capacity"
                    autofocus required>
                @error('battery_capacity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="number_of_seats" class="form-label mx-4">{{ __('Liczba siedze??') }}</label>
                <input id="number_of_seats" type="text"
                    class="form-control rounded-pill border-0 @error('number_of_seats') is-invalid @enderror"
                    name="number_of_seats" value="{{ $car->number_of_seats }}" autocomplete="number_of_seats" autofocus required>
                @error('number_of_seats')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="car_coverage" class="form-label mx-4">{{ __('Zasi??g') }}</label>
                <input id="car_coverage" type="text"
                    class="form-control rounded-pill border-0 @error('car_coverage') is-invalid @enderror"
                    name="car_coverage" value="{{ $car->car_coverage }}" autocomplete="car_coverage" autofocus required>
                @error('car_coverage')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">

                <label for="price" class="form-label mx-4">{{ __('Cena') }}</label>
                <input id="price" type="text"
                    class="form-control rounded-pill border-0 @error('price') is-invalid @enderror" name="price"
                    value="{{ $car->price }}" autocomplete="price" autofocus required>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label class="my-2">Zdj??cie</label>
                <input id="profile-image-input" type="file" name="picture" class="hidden"
                    onchange="document.getElementById('profile-image-preview').src = window.URL.createObjectURL(this.files[0])"
                    multiple>
            </div>

            <div>
                <button type="submit" class="register-btn btn col-12 col rounded-pill btn-outline-dark">
                    {{ __('Edytuj') }}
                </button>
            </div>
        </form>
    </div>
@endsection
