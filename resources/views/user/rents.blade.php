@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive mt-5">
            <table class="table">
                <thead class="thead-dark">
                <h1 class="text-center mt-3 mb-5">Twoje zwrócone wypożyczenia </h1>
                <tr>
                    <th scope="col">Numer zwrotu</th>
                    <th scope="col">Numer wypozyczenia</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Data rezerwacji</th>
                    <th scope="col">Data zwrotu</th>
                    <th scope="col">Podatek</th>
                </tr>

                @foreach($returned as $rent)
                    <tr>
                        <td>{{$rent->return->id}}</td>
                        <td>{{$rent->return->rent_id}}</td>
                        <td>{{$rent->user->name}}</td>
                        <td>{{$rent->user->surname}}</td>
                        <td>{{$rent?->carRent?->car?->brand}}</td>
                        <td>{{$rent?->carRent?->car?->model}}</td>
                        <td>{{$rent->date_of_rent}}</td>
                        <td>{{$rent->date_of_return}}</td>
                        <td>{{$rent->return->tax}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>

        <div class="table-responsive mt-5">
            <table class="table">
                <thead class="thead-dark">
                <h1 class="text-center mt-3 mb-5">Twoje aktualne wypożyczenia </h1>
                <tr>
                    <th scope="col">Numer wypozyczenia</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Data rezerwacji</th>
                    <th scope="col">Data zwrotu</th>

                </tr>
                </thead>
                <tbody>

                @foreach($notreturned as $rent)
                    <tr>
                        <td>{{$rent->id}}</td>
                        <td>{{$rent->user->name}}</td>
                        <td>{{$rent->user->surname}}</td>
                        <td>{{$rent?->carRent?->car?->brand}}</td>
                        <td>{{$rent->carRent->car->model}}</td>
                        <td>{{$rent->date_of_rent}}</td>
                        <td>{{$rent->date_of_return}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if (\Session::has('status'))
                <div>{{Session::get('status')}} </div>
            @endif
        </div>

    </div>
@endsection
