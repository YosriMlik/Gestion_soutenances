@extends('template')

@section('title', 'Etudiants')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Etudiants {{ $specefic_specialite->nom }}</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('specefic_etudiant_create', $specefic_specialite->id) }}">
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
                    <th scope="col">Adresse</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($specefic_etudiants as $etud)
                <tr onclick="_update({{$etud->id}})">
                    <th>{{ $etud->id }}</th>
                    <td>{{ $etud->nom }}</td>
                    <td>{{ $etud->prenom }}</td>
                    <td>{{ $etud->adresse }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _update(id){
            window.location.href = "/specialite/{{$specefic_specialite->id}}/etudiant/edit/"+id;
        }
    </script>
@endsection
