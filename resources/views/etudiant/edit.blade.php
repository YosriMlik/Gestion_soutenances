@extends('template')

@section('title', 'Modifier Etudiant')

@section('content')
    <div style="" class='_container2 mx-auto mt-5'>
        <h1>Modifier Etudiant :</h1>
        <br>
        <form action="{{route('etudiant.update', ['etudiant'=>$etud['id']])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom_etudiant">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_etudiant" id="nom_etudiant" value="{{ $etud['nom'] }}" type="text">
                    <span class="error-message">
                        @error("nom_etudiant") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom_etudiant">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom_etudiant" id="prenom_etudiant" value="{{ $etud['prenom'] }}" type="text">
                    <span class="error-message">
                        @error("prenom_etudiant") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="adresse_etudiant">Adresse</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="adresse_etudiant" id="adresse_etudiant" value="{{ $etud['adresse'] }}" type="text">
                    <span class="error-message">
                        @error("adresse_etudiant") {{ $message }} @enderror
                    </span>
                </div>
                <input style="display: none;" name="specialite_" id="specialite_pfe" value="{{$s}}" type="text">
            </div>

            <button class="btn btn-primary" type="submit" id="_submit">Modifier</button>
            <div onclick="_delete({{$etud->id}})" class="btn btn-danger">
                Supprimer
            </div>
            </div>
        </form>
        <form id="myForm{{$etud->id}}" action="{{ route('etudiant.destroy', $etud['id']) }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection

@section('js')
<script>
    function _delete(id){
        Swal.fire({
            title: 'Voulez vous supprimer cet Etudiant ?',
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
