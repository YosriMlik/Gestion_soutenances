@extends('template')

@section('title', 'PFE')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col-auto">Liste des Projet de Fin d'Etudes (Tous les Spécialités)</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('pfe.create') }}">
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
                    {{--<th scope="col">Etudiant(s)</th>
                    <th scope="col">Encadreur Académique</th>
                    <th scope="col">Encadreur Industriel</th>--}}
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($pfes as $pfe)
                <tr>
                    <th>{{ $pfe->id }}</th>
                    <td>{{ $pfe->titre }}</td>
                    <td>{{ $pfe->societe }}</td>
                    {{--<td>
                        @for ($i=0; $i<count($pfe->etudiants); $i++)
                            @if($i != 0) <br> @endif
                            {{ $pfe->etudiants[$i]->nom }} {{ $pfe->etudiants[$i]->prenom }}
                        @endfor
                    </td>

                    @php
                        $E1 = "";
                        $E2 = "";
                        foreach ($pfe->encadrants as $encadrant)
                            if($encadrant->pivot->type == 'encadreur_academique')
                                $E1 = $encadrant->nom;
                            else
                                $E2 = $encadrant->nom;
                    @endphp
                    <td>{{$E1}} </td>
                    <td>{{$E2}} </td>--}}
                    <td>
                        <a class="btn btn-primary" href="{{ route('pfe.edit', $pfe->id) }}"><i class="bi bi-pen"></i></a>
                        <form id="myForm{{$pfe->id}}" style="display: inline;" action="{{ route('pfe.destroy', $pfe['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div onclick="_delete({{$pfe->id}});" type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></div>
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
                title: 'Voulez vous supprimer ce PFE?',
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
