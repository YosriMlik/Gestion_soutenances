@extends('template')

@section('title', 'Ajouter Spécialités')

@section('content')
    <div class='_container2 mx-auto mt-5'>

        <br>
        <form action="{{route('specialite.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-auto me-2 pt-2" for="nom_specialite">Ajouter specialite :</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_specialite" id="nom_specialite" value="{{old('nom_specialite')}}" type="text">
                    <span class="error-message">
                        @error("nom_specialite") {{ $message }} @enderror
                    </span>
                </div>
            </div>

            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
