@extends('template')

@section('title', 'Ajouter Salle')

@section('content')
    <div class='_container2 mx-auto mt-5'>

        <br>
        <form action="{{route('salle.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-auto me-2 pt-2" for="nom_salle">Ajouter Salle :</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_salle" id="nom_salle" value="{{old('nom_salle')}}" type="text">
                    <span class="error-message">
                        @error("nom_salle") {{ $message }} @enderror
                    </span>
                </div>
            </div>

            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
