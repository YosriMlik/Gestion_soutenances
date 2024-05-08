@extends('template')

@section('title', 'Soutenance')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col-lg-10 col-md-8 col-6">Soutenances (Tous les Spécialités)</h1>
        </div>
        <br>
        <form class="row" method="POST">
            <div class="col-auto pt-1">Filtrer par :</div>
            <div class="col-auto"><input class="form-control" type="date" name="" id=""></div>
            <div class="col-auto">
                <select id="" class="form-select" name="">
                    <option value="" selected>Selectioner salle</option>
                    <option value="" selected>Selectioner salle</option>
                    <option value="" selected>Selectioner salle</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn rounded-3 btn-primary ms-3 py-1">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Salle</th>
                    <th scope="col">PFE</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($soutenances as $soutenance)
                <tr onclick="link({{$soutenance->id}});">
                    <th>{{ $soutenance->id }}</th>
                    <td>{{ $soutenance->date }}</td>
                    <td>{{ $soutenance->heure }}</td>
                    <td>{{ $soutenance->salle_id }}</td>
                    <td>{{ $soutenance->pfe_id }}</td>
                    <td>
                        <a class="btn btn-primary" href="#edit"><i class="bi bi-pen"></i></a>
                        <form id="myForm{{$soutenance->id}}" style="display: inline;" action="{{ route('soutenance.destroy', $soutenance['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div onclick="_delete({{$soutenance->id}});" type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></div>
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
                title: 'Voulez vous supprimer ce soutenance?',
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
