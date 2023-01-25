@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-success text-center" role="alert" style="margin-top: 90px !important;">
        {{ session('status') }}
    </div>
@endif
@section('content')
    <section class="search mt-5">

    {{-- <div class="mt-1 mb-3 d-flex justify-content-center">
        <form action="{{ route('admin.returns.filter') }}" method="post">
            @csrf
            @method('post')
            <div>
                    <div class="mx-2 mt-5">
                        <input name="val" type="text" class="form-control search-slt">
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" class="btn btn-primary wrn-btn mx-2">Filtruj</button>
                        <a class="btn btn-primary mx-2" href="{{route('admin.returns')}}"> Odśwież </a>
                    </div>
                </div>
        </form>
    </div> --}}
    <div>
        <h4 class="mt-5 text-center display-10">Wyszukuj po imieniu lub nazwisku</h4>
    </div>
    <div class="mt-3 mb-5 d-flex justify-content-center">
        <form name="search" id="searchForm"  action="{{ route('admin.returns.search','search') }}" >
            @csrf
            @method('get')
            <input id="searchInput" type="text" name="search">
            <button onclick="serveAttr()" id="search" class="btn btn-primary mx-2"> Szukaj</button>
            <a class="btn btn-primary mx-2" href="{{route('admin.returns')}}"> Odśwież </a>
        </form>
    </div>
    <script>
        function serveAttr(){
            var frm = document.getElementById('search') || null;
            if(frm) {
                frm.action = '/admin/returns/list/' + document.getElementById('searchInput');
            }
            document.getElementById('searchForm').submit();
        }
    </script>
    <div class="container">
        <h1 class="text-center mt-3 mb-5"> Zwrócone </h1>
        <div class="table-responsive mt-5" style="height: 400px !important;">
            <table class="table text-center" style="overflow-y: scroll;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Numer zwrotu</th>
                        <th scope="col">Numer wypozyczenia</th>
                        <th scope="col">Id wypozyczajacego</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Data wypozyczenia</th>
                        <th scope="col">Data do zwrotu</th>
                        <th scope="col">Podatek</th>
                    </tr>

                    @forelse($returned as $rent)
                        <tr>
                            <td>{{ $rent?->return?->id }}</td>
                            <td>{{ $rent?->return?->rent_id }}</td>
                            <td>{{ $rent->user->id }}</td>
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ $rent->user->surname }}</td>
                            <td>{{ $rent->carRent->car->brand }}</td>
                            <td>{{ $rent->carRent->car->model }}</td>
                            <td>{{ $rent->date_of_rent }}</td>
                            <td>{{ $rent->date_of_return }}</td>
                            <td>{{ $rent?->return?->tax }}</td>
                        </tr>

                    @empty
                        <tr>
                        <tr>
                    @endforelse
                    </tbody>
            </table>
            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $returned->links() }}
                </ul>
            </nav> --}}
        </div>
        <div class="table-responsive mt-5">
            <table class="table text-center">
                <thead class="thead-dark">
                    <h1 class="text-center mt-3 mb-5"> Niezwrócone </h1>
                    <tr>
                        <th scope="col">Numer wypozyczenia</th>
                        <th scope="col">Numer wypozyczyciela</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Data wypozyczenia</th>
                        <th scope="col">Data do zwrotu</th>
                        <th scope="col">Kwota do pobrania</th>
                        <th scope="col">Zwróć</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($notreturned as $rent)
                        <tr>
                            <td>{{ $rent->id }}</td>
                            <td>{{ $rent->user->id }}</td>
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ $rent->user->surname }}</td>
                            <td>{{ $rent?->carRent?->car?->brand }}</td>
                            <td>{{ $rent?->carRent?->car?->model }}</td>
                            <td>{{ $rent->date_of_rent }}</td>
                            <td>{{ $rent->date_of_return }}</td>
                            <td>{{ $rent->cost }} zł</td>
                            <td>
                                <form action="{{ route('admin.returns.create') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input name="id" id="id" class="d-none inpt" value="{{ $rent->id }}">
                                    <button class="btn-primary rounded-2" type="submit">Zwróć</button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                        <tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
