@extends('layouts.app')

@section('content')
    <div class="bg-image img-fluid"
        style="background-image: url('{{asset('storage/img/cars/teslaroadser2.jpg')}}'); background-position: center; background-size: cover; min-height: 50vh; max-height: 80vh;">
    </div>

    @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <section class="container my-5  text-center">
        <h4 class="text-center fw-bold display-6 mb-5">Wybierz odpowiedni dla siebie <span
                class="text-danger">samochód</span></h4>

    </section>
    <div class="container">
        <div class="row">
            <ul class="nav justify-content-center my-5 p-3 shadow-sm bg-light rounded-2" data-nav>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Bmw</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Audi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Tesla</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Volkswagen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Kia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Wszystkie</a>
                </li>
            </ul>
        </div>

            <div class="row justify-content-center" data-cars>
                @foreach ($cars as $car)


                    <div class="card rounded-2 px-0 py-0 mx-4 mb-5" style="width: 20rem;" data-brand="{{ $car->brand }}">
                        <img class="card-img-top rounded-2" src="{{$car->getImage()}}" alt="Card image cap">
                        <div class="card-body py-4 px-4">
                            <h4 class="card-title mt-1">{{ $car->brand }} {{ $car->model }}</h4>
                            <div class="d-flex mb-3">
                                <span class="cat">{{ $car->car_body }}</span>
                                <p class="price mx-auto text-danger">{{ $car->price }}zł<span class="span-day text-dark"
                                        style="font-size: 11px !important;">/dzień</span></p>
                            </div>
                            <div class="btns d-flex mb-0 d-block rounded-2">
                                @if(Auth::user() && Auth::user()->role != 'admin')
                                    <a href="{{ route('rent', $car->id) }}" class="btn-reserv btn btn-danger py-2 px-4">Zarezerwuj</a>
                                @endif
                                <a href="{{ route('carfleet.cardetails', $car->id) }}" class="btn-details btn btn-dark py-2 rounded-2 px-4" style="{{(Auth::user() && Auth::user()->role == 'admin') || !Auth::user() ? 'margin: 0 auto; width: 100%' : ''}}">Szczegóły</a>
                            </div>
                        </div>
                    </div>
        @endforeach
    </div>
    </div>
    <script>
        const navigationWrapper = document.querySelector('[data-nav]');

        const carsContainer = document.querySelector('[data-cars]');

        const cars = Array.from(document.querySelectorAll('[data-brand]'));

        const filterCars = brand => {
            if (brand === 'Wszystkie') return cars;
            else return cars.filter(car => car.dataset.brand === brand);
        };

        const renderCars = cars => {
            carsContainer.innerHTML = '';
            cars.forEach(car => carsContainer.append(car));
        };

        navigationWrapper.addEventListener('click', e => {
            if (!e.target.classList.contains('nav-link')) return;

            const selectedCategory = e.target.textContent;
            renderCars(filterCars(selectedCategory));
        });
    </script>
@endsection
