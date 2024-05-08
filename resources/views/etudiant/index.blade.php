@extends('template')

@section('title', 'Etudiants')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Etudiants (Tous les Spécialités)</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('etudiant.create') }}">
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
                    <th scope="col">Spécialité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($etuds as $etud)
                <tr>
                    <th>{{ $etud->id }}</th>
                    <td>{{ $etud->nom }}</td>
                    <td>{{ $etud->prenom }}</td>
                    <td>{{ $etud->adresse }}</td>
                    <td>{{ $etud->specialite }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('etudiant.edit', $etud->id) }}"><i class="bi bi-pen"></i></a>
                        <form id="myForm{{$etud->id}}" style="display: inline;" action="{{ route('etudiant.destroy', $etud['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div onclick="_delete({{$etud->id}});" class="btn btn-danger"><i class="bi bi-trash3"></i></div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _delete(id){
            Swal.fire({
                title: 'Voulez vous supprimer cet Etudiant?',
                icon: 'warning',
                confirmButtonText: 'Supprimer',
                confirmButtonColor: '#dc3741',
                showCancelButton: true,
                cancelButtonText: `Annuler`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.getElementById("myForm"+id).submit();
                }
            })
        }
    </script>
@endsection
