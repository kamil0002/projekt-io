@extends('layouts.app')

@section('content')
    <div class="bg-image img-fluid"
        style="background-image: url('{{asset('storage/img/cars/tesle.jpg')}}'); background-position: center; background-size: cover; min-height: 50vh; max-height: 80vh;">
    </div>
    <section class="container my-5 p-0 py-5 p-lg-5 mt-0 mx-auto mt-5 rounded-3 shadow-sm"
        style="background-color: white !important; max-width: 1625px;">
        <div class="mx-auto">
            <h4 class="text-center fw-bold display-4 mb-5">Szczegóły <span class="text-danger">samochodu</span></h4>
            <div class="container ">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3">
                        <div class="carousel-item active">
                            <img src="{{$car->getImage()}}" class="d-block w-100" alt="car">
                        </div>
                </div>
            </div>
        </div>
        <h4 class="text-center fw-bold display-5 mb-4 mt-5">Model <span class="text-danger">{{$car->brand}} {{$car->model}}</span></h4>
        <div style="margin: 70px 0; margin-top: 50px !important;">
            <div class="row mx-auto container">
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/car-body.png')}}" class="d-block w-75 h-75" alt="car-body">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Nadwozie</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->car_body}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/car-engine.png')}}" class="d-block w-75 h-75" alt="car-engine">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Moc</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->engine_power}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/speedometer.png')}}" class="d-block w-75 h-75" alt="speedometer">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Prędkość</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->maximum_speed}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/electric-car.png')}}" class="d-block w-75 h-75" alt="electric-car">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Zasięg</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->car_coverage}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/seat.png')}}" class="d-block w-75 h-75" alt="seats">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Miejsca</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->number_of_seats}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center col col-6 col-sm-6 col-xxl-2 justify-content-center mt-5 car-single">
                    <div class="rounded-circle shadow-sm p-3 d-flex justify-content-center align-items-center shadow-sm"
                        style="width: 80px; height: 80px; background-color: #e6e6e6 !important;">
                        <img src="{{asset('storage/img/icons/four-wheel-drive.png')}}" class="d-block w-75 hx-75" alt="fwd">
                    </div>
                    <div class="d-flex flex-column justify-items-center ms-3">
                        <p class="d-block text-dark fw-bold my-0">Napęd</p>
                        <p class="d-block text-secondary" style="font-weight: 500">{{$car->drive}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5" style="margin-top:100px !important;">
            <h4 class="text-center fw-bold display-6 mb-4 mt-5">Wyposażenie</h4>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center px-2 mt-4">
                    <ul class="features px-2">
                        <li>Komputer pokładowy</li>
                        <li>Apple Car</li>
                        <li>Klimatyzacja</li>
                        <li>Radio</li>
                        <li>Tv</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center px-2 mt-4">
                    <ul class="features px-2">
                        <li>Adapter do ładowania</li>
                        <li>Podgrzewanie foteli</li>
                        <li>Wentylowanie foteli</li>
                        <li>Pamięć foteli</li>
                        <li>Isofix</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center px-2 mt-4">
                    <ul class="features px-2">
                        <li>Apteczka</li>
                        <li>Zestaw naprawczy XL</li>
                        <li>Zestaw żarówek</li>
                        <li>Koło zapasowe</li>
                        <li>GPS</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
