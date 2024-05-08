@extends('template')

@section('title', 'Modifier Jury')

@section('content')
    <div style="" class='_container2 mx-auto mt-5'>
        <h1>Modifier Jury :</h1>
        <br>
        <form action="{{route('jury.update', ['jury'=>$_jury['id']])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom-jury">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom-jury" id="nom-jury" value="{{ $_jury['nom'] }}" type="text">
                    <span class="error-message">
                        @error("nom-jury") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom-jury">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom-jury" id="prenom-jury" value="{{ $_jury['prenom'] }}" type="text">
                    <span class="error-message">
                        @error("prenom-jury") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="mail-jury">Mail</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="mail-jury" id="mail-jury" value="{{ $_jury['mail'] }}" type="text">
                    <span class="error-message">
                        @error("mail-jury") {{ $message }} @enderror
                    </span>
                </div>

            </div>

            <button class="btn btn-primary" type="submit" id="_submit">Modifier</button>
            <div onclick="_delete({{$_jury->id}})" class="btn btn-danger"> Supprimer</div>
        </form>
        <form id="myForm{{$_jury->id}}" action="{{ route('jury.destroy', $_jury['id']) }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection

@section('js')
<script>
    function _delete(id){
        Swal.fire({
            title: 'Voulez vous supprimer ce Jury ?',
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
