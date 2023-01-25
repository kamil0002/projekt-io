<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="backdrop-filter:blur(4px); opacity: 0.95;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('storage/img/novoxLogoO.png') }}" class="img-fluid" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="{{ route('home') }}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="{{ route('carfleet.fleet') }}">Flota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2"href="{{ route('contact') }}">Kontakt</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mt-3 mt-lg-0 nav-item-btn">
                            <a class="login-btn btn col-12 btn-outline-dark rounded-0"
                                href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item mt-3 mt-lg-0 mx-lg-2 nav-item-btn">
                            <a class="register-btn btn col-12 btn-outline-dark rounded-0"
                                href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.panel') }}">Panel administratora</a>
                            @endif
                                @if(Auth::user()->role == 'user')
                                    <a class="dropdown-item" href="{{ route('opinion_form') }}">Dodaj opinie</a>
                                @endif
                                @if(Auth::user()->role == 'user')
                                    <a class="dropdown-item" href="{{ route('user.edit',['id' => Auth::user()->id])}}">Edytuj swoje dane</a>
                                    <a class="dropdown-item" href="{{ route('user.rents.show',['id' => Auth::user()->id])}}">Wypozyczenia</a>
                                @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
