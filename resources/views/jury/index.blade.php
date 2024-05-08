@extends('template')

@section('title', 'Jurys')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Jurys</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('jury.create') }}">
                    + Ajouter
                </a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Mail</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($jurys as $jury)
                <tr onclick="_update({{$jury->id}})">
                    <th>{{ $jury->id }}</th>
                    <td>{{ $jury->nom }}</td>
                    <td>{{ $jury->prenom }}</td>
                    <td>{{ $jury->mail }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _update(id){
            window.location.href = "/jury/"+id+"/edit";
        }
    </script>
@endsection
