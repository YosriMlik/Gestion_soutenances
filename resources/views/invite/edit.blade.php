@extends('template')

@section('title', 'Modifier Invitée')

@section('content')
    <div style="" class='_container2 mx-auto mt-5'>
        <h1>Modifier Invitée :</h1>
        <br>
        <form action="{{route('invite.update', ['invite'=>$_invite['id']])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom-invite">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom-invite" id="nom-invite" value="{{ $_invite['nom'] }}" type="text">
                    <span class="error-message">
                        @error("nom-invite") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom-invite">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom-invite" id="prenom-invite" value="{{ $_invite['prenom'] }}" type="text">
                    <span class="error-message">
                        @error("prenom-invite") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="mail-invite">Mail</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="mail-invite" id="mail-invite" value="{{ $_invite['mail'] }}" type="text">
                    <span class="error-message">
                        @error("mail-invite") {{ $message }} @enderror
                    </span>
                </div>

            </div>

            <button class="btn btn-primary" type="submit" id="_submit">Modifier</button>
            <div onclick="_delete({{$_invite->id}})" class="btn btn-danger"> Supprimer</div>
        </form>
        <form id="myForm{{$_invite->id}}" action="{{ route('invite.destroy', $_invite['id']) }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection

@section('js')
<script>
    function _delete(id){
        Swal.fire({
            title: 'Voulez vous supprimer ce Invité ?',
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
