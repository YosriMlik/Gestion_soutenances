@extends('template')

@section('title', 'Invitées')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Invitées</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('invite.create') }}">
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
                @foreach ($invites as $invite)
                <tr onclick="_update({{$invite->id}})">
                    <th>{{ $invite->id }}</th>
                    <td>{{ $invite->nom }}</td>
                    <td>{{ $invite->prenom }}</td>
                    <td>{{ $invite->mail }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _update(id){
            window.location.href = "/invite/"+id+"/edit";
        }
    </script>
@endsection
