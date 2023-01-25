@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="table-responsive mt-5 text-center">
            <a class="mt-5 mb-3 btn btn-success" href="{{ route('admin.cars.add') }}">{{__("Dodaj samochód")}}</a>
            <div class="mt-1 mb-5 d-flex justify-content-center">
                <form name="search" id="searchForm"  action="{{ route('admin.cars.search','search') }}" >
                    @csrf
                    @method('get')
                    <input id="searchInput" type="text" name="search">
                    <button onclick="serveAttr()" id="search" class="btn-success rounded-1"> Szukaj</button>
                </form>
            </div>
            <script>
                function serveAttr(){
                    var frm = document.getElementById('search') || null;
                    if(frm) {
                        frm.action = '/admin/cars/list/' + document.getElementById('searchInput');
                    }
                    document.getElementById('searchForm').submit();
                }
            </script>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Nadwozie</th>
                        <th scope="col">Rok</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Zdjęcie</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->brand}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->car_body}}</td>
                        <td>{{$car->year_of_production}}</td>
                        <td>{{$car->price}}</td>
                        <td> <img class="img-thumbnail" style="width: 60px; height: 45px; " src="{{$car->getImage()}}"></td>
                        <td>{{$car->status}}</td>
                        <td><a href="{{ route('admin.cars.edit',['id' => $car->id])}}" class="btn btn-primary">{{__("Edytuj")}}</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.cars.delete',['id' => $car->id]) }}">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">
                                    {{ __('Usuń') }}
                                </button>
                            </form>
                        </td>
                        <td></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
