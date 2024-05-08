@extends('template')

@section('title', 'Modifier PFE')

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Modifier PFE :</h1>
        <br>
        <form action="{{route('pfe.update', ['pfe'=>$_pfe->id])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="titre_pfe">Titre</label>
                <div class="col-4 p-0">
                    <textarea class="form-control" rows="3" name="titre_pfe" id="titre_pfe" type="text">{{$_pfe->titre}}</textarea>
                    <span class="error-message">
                        @error("titre_pfe") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="societe_pfe">Societe</label>
                <div class="col-4 p-0">
                    <input class="form-control" name="societe_pfe" id="societe_pfe" value="{{$_pfe->societe}}" type="text">
                    <span class="error-message">
                        @error("societe_pfe") {{ $message }} @enderror
                    </span>
                </div>
                <input style="display: none;" name="specialite_" id="specialite_pfe" value="{{$s}}" type="text">
            </div>
            <button type="submit" id="_submit" class="btn btn-primary">Modifier</button>
            <div onclick="_delete({{$_pfe->id}})" class="btn btn-danger">
                Supprimer
            </div>
        </form>
        <br>
        <form id="myForm{{$_pfe->id}}" action="{{ route('pfe.destroy', $_pfe['id']) }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    </div>
    <div style="height: 20vh"></div>
@endsection

@section('js')
<script>
    function _delete(id){
        Swal.fire({
            title: 'Voulez vous supprimer ce PFE ?',
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
    /*
    function change(){
        let n = document.getElementById("n_etudiants").value;
        let etudiant_1 = document.getElementById("etudiant_1");
        let etudiant_2 = document.getElementById("etudiant_2");
        let etudiant_3 = document.getElementById("etudiant_3");

        switch(n){
            case '1': etudiant_1.disabled = false;

                    etudiant_2.disabled = true;
                    etudiant_2.querySelector('option[selected]').removeAttribute('selected');

                    etudiant_3.disabled = true;
                    etudiant_3.querySelector('option[selected]').removeAttribute('selected');
                    break;

            case '2': etudiant_1.disabled = false;

                    etudiant_2.disabled = false;
                    //etudiant_2.querySelector('option[selected]').value = "{{@$selected_etuds[0]->etudiants[1]->id}}";

                    etudiant_3.disabled = true;
                    etudiant_3.querySelector('option[selected]').removeAttribute('selected');
                    //etudiant_3.querySelector('option[selected]').value = "";
                    break;

            case '3': etudiant_1.disabled = false;

                    etudiant_2.disabled = false;
                    //document.getElementById("selected_etud_2").value = "@{{$selected_etuds[0]->etudiants[1]->id}}";

                    etudiant_3.disabled = false;
                    //document.getElementById("selected_etud_3").value = "@{{$selected_etuds[0]->etudiants[2]->id}}";
                    break;
        }
    }
    */
</script>
@endsection
