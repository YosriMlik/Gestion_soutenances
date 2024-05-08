@extends('template')

@section('title', 'PFE')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col-auto">Liste des Projet de Fin d'Etudes {{ $specefic_specialite->nom }}</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('specefic_pfe_create', $specefic_specialite->id) }}">
                    + Ajouter
                </a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Société</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($specefic_pfes as $pfe)
                <tr onclick="_update({{$pfe->id}})">
                    <th>{{ $pfe->id }}</th>
                    <td>{{ $pfe->titre }}</td>
                    <td>{{ $pfe->societe }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _update(id){
            window.location.href = "/specialite/{{$specefic_specialite->id}}/pfe/edit/"+id;
        }
    </script>
@endsection
