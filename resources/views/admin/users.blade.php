@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 mb-5 d-flex justify-content-center">
            <form name="search" id="searchForm"  action="{{ route('admin.users.search','search') }}" >
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
                    frm.action = '/admin/users/list/' + document.getElementById('searchInput');
                }
                document.getElementById('searchForm').submit();
            }
        </script>
        <div class="table-responsive mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Rola</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pesel</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Telefon</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->pesel}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td><a href="{{ route('admin.users.edit',$user->id)}}" class="btn btn-warning">{{__("Edytuj")}}</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.users.delete',['id' => $user->id]) }}">
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
