@extends('layouts.app')
@include('shared.navbar')
@section('content')
    @if (session('status'))
        <div class="alert alert-success mt-5 text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid px-0">

        <div id="carouselExampleDark" class="carousel carousel-light slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner text-light">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset('storage/img/teslamodel3.jpg')}}" class="d-block w-100" alt="foto">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>STOP SMOG GO ELECTRIC!</h2>
                        <p>Auta elektryczne chronią nas oraz nasze środowisko. Przejdź na tryb eko i dbaj o wspólne zdrowie!
                        </p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('storage/img/teslamodelY.jpg')}}" class="d-block w-100" alt="foto2">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>WYNAJEM</h2>
                        <p>Samochody elektryczne w wypożyczalni Novox są na wyciągnięcie ręki. Realizujemy wynajem długo jak
                            i
                            krótko terminowy.</p>
                        <p>Zapraszamy do współpracy!</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{asset('storage/img/teslaroadser2.jpg')}}" class="d-block w-100" alt="foto3">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>POKAŹNA FLOTA POJAZDÓW ELEKTRYCZNYCH</h2>
                        <p>Odwiedź nasze punkty już dziś i ciesz się z jazdy świeżo wypożyczonym samochodem marki premium!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container-fluid my-5 p-0 py-5 p-lg-5 mt-0 mx-auto" style="background-color: #f7f7f7 !important">
        <div class="mx-auto" style="max-width: 1250px;">
            <h4 class="text-center fw-bold display-4 mb-5">Jak działa <span class="text-danger">NOVOX?</span></h4>
            <div class="row p-0 p-lg-4 d-flex flex-column flex-lg-row align-items-center">
                <div class="how-it-works-img w-50 pb-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('storage/img/keys.jpg')}}" class="img-fluid d-block w-100" alt="keys">
                </div>
                <div class="how-it-works-text w-50 px-0 py-3 p-lg-4 ">
                    <ul class="w-100 px-3" style="list-style-type: none;">
                        <li>
                            <h4>Znajdz idealny samochód</h4>
                            <p>Wprowadź datę i przeglądaj setki samochodów elektrycznych udostępnionych
                                przez
                                lokalnego gospodarza.</p>
                        </li>
                        <li>
                            <h4>Zarezerwuj</h4>
                            <p>Zarezerwuj online, bądź zadzwoń do nas na infolinię, wybierz dogodny dla Ciebie plan i
                                przywitaj się ze
                                swoim gospodarzem!</p>
                        </li>
                        <li>
                            <h4>Ruszaj w drogę</h4>
                            <p>Odbierz samochód od swojego gospodarza, chwyć kluczę i ruszaj w drogę!</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5 text-center">
        <h2 class="text-danger fw-bold mb-3">Niekończące się opcje!</h2>
        <h4 class="mb-3">Przeglądaj największy w Polsce rynek samochodów elektrycznych</h4>
        <p class="mt-2 mb-5">
            Niezależnie od tego, czy jest to SUV na rodzinną wycieczkę, samochód na jakieś sprawunki, czy klasyczny samochód
            sportowy na wyjątkowy wieczór, w wypożyczalni Novox znajdziesz idealny samochód na każdą okazję.
        </p>
    </section>

    <section class="container my-5 text-center">
        <h2 class="text-danger fw-bold mb-3">Ubezpieczenia</h2>
        <h4 class="mb-3">Zadbaj o pakiet dodatkowych ubezpieczeń przy wypożyczeniu pojazdu!</h4>
        <p class="mt-2">
            Każde ubezpieczenie oferuje wachlarz udogodnień dla klientów. Pakiet silver - podstawowe ubezpiczenie, pakiet gold - rozszerzone ubezpieczenie,
            pakiet platinium - maksymalne ubezpieczenie preferowane do najmu długoterminowego. 
        </p>
        <span class="text-center text-danger mb-5">Wybierz mądrze, a w przypadku szkody będziesz wolny od stresu!</span>
    </section>

    <div class="container my-5" style="background-color: #f7f7f7 !important">
        <h1 class="text-center fw-bold display-3 mb-5">Nasze<span class="text-danger"> samochody</span></h1>
        <div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                    @foreach ($cars as $car)
                        <div class="item mb-4 card-car">
                            <div class="card border-0 shadow">

                                <img src={{$car->getImage()}} alt="" class="card-img-top">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <h5>{{ $car->brand }} {{ $car->model }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 p-2" style="background-color: #f7f7f7 !important">
        <h4 class="text-center fw-bold display-4 mb-5">Opinie naszych<span class="text-danger"> klientów</span></h4>
        <div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                    @foreach ($users as $user)
                        @foreach ($user->opinions as $opinion)
                            <div class="item card review-card mt-2 mb-4 shadow">
                                <div class="card-up gradient"></div>
                               <!-- <div class="avatar mx-auto white">
                                    <img src="https://i.pinimg.com/564x/e2/7c/87/e27c8735da98ec6ccdcf12e258b26475.jpg"
                                        class="rounded-circle img-fluid" alt="avatar">
                                </div> -->
                                <div class="card-body text-center">
                                    <h4 class="card-title font-weight-bold">{{ $user->name }} {{ $user->surname }}
                                    </h4>
                                    <hr>
                                    <p class="card-paragraph-content">{{ $opinion->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                },
                1400: {
                    items: 5
                }
            }
        })
    </script>
@endsection
