@extends('template')

@section('title', 'Modifier Salles')

@section('content')
    <div style="" class='_container2 mx-auto mt-5'>
        <h1>Modifier Salle :</h1>
        <br>
        <form action="{{route('salle.update', ['salle'=>$_salle['id']])}}" method="post" name="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom_salle">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_salle" id="nom_salle" value="{{ $_salle['nom'] }}" type="text">
                    <span class="error-message">
                        @error("nom_salle") {{ $message }} @enderror
                    </span>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" id="_submit">Modifier</button>
            <div onclick="_delete({{$_salle->id}})" class="btn btn-danger">
                Supprimer
            </div>
        </form>
        <br>
        <form id="myForm{{$_salle->id}}" action="{{ route('salle.destroy', $_salle['id']) }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection

@section("js")
    <script>
        function _delete(id){
            Swal.fire({
                title: 'Voulez vous supprimer cette salle ?',
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
