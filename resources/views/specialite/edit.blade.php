@extends('template')

@section('title', 'Modifier Spécialité')

@section('content')
    <div style="" class='_container2 mx-auto mt-5'>
        <h1>Modifier Spécialité :</h1>
        <br>
        <form action="{{route('specialite.update', ['specialite'=>$_specialite['id']])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom_specialite">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_specialite" id="nom_specialite" value="{{ $_specialite['nom'] }}" type="text">
                    <span class="error-message">
                        @error("nom_specialite") {{ $message }} @enderror
                    </span>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" id="_submit">Modifier</button>
            <div onclick="_delete({{$_specialite['id']}})" class="btn btn-danger">
                Supprimer
            </div>
        </form>
        <br>
        <form id="myForm{{$_specialite['id']}}" style="" action="{{ route('specialite.destroy', $_specialite['id']) }}" method="post">
            @method('DELETE')
            @csrf

        </form>
    </div>
@endsection

@section("js")
    <script>
        function _delete(id){
            Swal.fire({
                title: 'Voulez vous supprimer cette spécialité ?',
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
