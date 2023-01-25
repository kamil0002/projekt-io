@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success mt-5 mb-5 text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div id="booking" class="section mt-5 mx-auto" style="max-width: 600px;">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header my-5">
                            <h1 class="text-center">Zarezerwuj samochód</h1>
                        </div>

                        <form method="POST" action="{{ route('cost') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Imię i nazwisko</span>
                                        <input name="user-data" class="form-control" type="text"
                                               value="{{ $user->name }} {{ $user->surname }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Email</span>
                                        <input name="email" class="form-control" type="email" value="{{ $user->email }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <span class="form-label">Telefon</span>
                                <input class="form-control" type="text" value="{{ $user->phone }}" disabled>
                            </div>
                            <div class="d-none">
                                <input name="car" class="form-control" type="text" value="{{ $car->id }}">
                            </div>
                            <div class="form-group mb-2">
                                <span class="form-label">Punkt odbioru</span>
                                <input class="form-control" type="text" placeholder="Rzeszów, Przemyska 34" disabled>
                            </div>
                            <div class="form-group mb-2">
                                <span class="form-label">Punkt zwrotu</span>
                                <input class="form-control" type="text" placeholder="Rzeszów, Przemyska 34" disabled>
                            </div>
                            <div class="row mb-2 gx-0 gy-0" style="gap-x: 0;">
                                <div class="col-sm-5">
                                    <div class="form-group mb-2">
                                        <link href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
                                        <span class="form-label">Data wypożyczenia</span>

                                        <input id="datepicker1" name="date_of_rent" class=" form-control datepicker" type="text" data-provide="datepicker" required>
                                    </div>
                                </div>
                            <div class="row gx-0">
                                <div class="col-sm-5">
                                    <div class="form-group mb-2">
                                        <span class="form-label">Data zwrotu</span>
                                        <input id="datepicker2" name="date_of_return" class=" form-control datepicker" type="text" data-provide="datepicker" required>
                                    </div>
                                </div>
                            </div>
                            <select name="insurance" class="form-select mt-2 mb-3" aria-label="Default select example">
                                <option name="option" value="1" selected>Wybierz ubezpieczenie</option>
                                @foreach($insurances as $insurance)
                                    <option name="option"
                                            value="{{$insurance->id}} {{$insurance->cost_of_insurance}}">{{$insurance->type_of_insurance}}
                                        , {{$insurance->cost_of_insurance}}zł
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-group mb-4">
                                <span class="form-label">Cena [PLN]</span>
                                <input name="price" class="form-control" type="number" disabled>
                                <input class="d-none" name="price-of-rent">
                                <input class="d-none" data-price value="{{ $car->price }}">

                            </div>
                            <button type="submit" class="register-btn btn col-12 col rounded-pill btn-outline-dark">
                                {{ __('Zarezerwuj') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        const carPrice = +document.querySelector('[data-price]').value;
        const calculatedPrice = document.querySelector("input[name='price']");
        const rentPrice = document.querySelector("input[name='price-of-rent']");
        const rentedSinced = document.querySelector("input[name='date_of_rent']");
        const rentedTo = document.querySelector("input[name='date_of_return']");

        const insurancePrice = document.querySelector("select[name='insurance']");

        const formatDate = date => new Intl.DateTimeFormat('sv').format(date);

        calculatePrice = (dates) => {
            const days = (new Date(dates['date_of_return']).getTime() - new Date(dates['date_of_rent']).getTime()) / (
                1000 * 3600 * 24);
            const price = (1 + days) * carPrice + dates['insurance'];
            if(price < 0) return;
            calculatedPrice.value = price;
            rentPrice.value = price;
        };


        const delayFnCall = (fn) => setTimeout(fn, 1000);

        const today = new Date()
        const tomorrow = new Date().getTime() + 1000 * 60 * 60 * 24;


        rentedSinced.value = formatDate(today);
        rentedTo.value = formatDate(tomorrow);

        let selectedDates = {
            date_of_rent: $("#datepicker1").val(),
            date_of_return: $("#datepicker2").val(),
            insurance: 0
        };

        calculatePrice(selectedDates)

        $("#datepicker1,#datepicker2").on('change', function (e) {

            selectedDates = {
                ...selectedDates,
                [e.target.name]: e.target.value
            };
            calculatePrice(selectedDates);
        });



        delayFnCall(insurancePrice.addEventListener('change', () => {
            selectedDates = {
                ...selectedDates,
                insurance: +insurancePrice.options[insurancePrice.selectedIndex].value.split(' ')[1] || 0
            };
            calculatePrice(selectedDates)
        }));


    </script>

    <script>
        var disableDates = @json($reserved_days);
        $('#datepicker1').datepicker({
            format: 'yyyy-mm-dd',
            datesDisabled:disableDates
        });
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            datesDisabled:disableDates
        });
    </script>
@endsection

