@extends('template')

@section('title', 'Ajouter Etudiant')

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Ajouter Etudiant :</h1>
        <br>
        <form action="{{route('etudiant.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom_etudiant">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom_etudiant" id="nom_etudiant" value="{{old('nom_etudiant')}}" type="text">
                    <span class="error-message">
                        @error("nom_etudiant") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom_etudiant">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom_etudiant" id="prenom_etudiant" value="{{old('prenom_etudiant')}}" type="text">
                    <span class="error-message">
                        @error("prenom_etudiant") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="adresse_etudiant">Adresse</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="adresse_etudiant" id="adresse_etudiant" value="{{old('adresse_etudiant')}}" type="text">
                    <span class="error-message">
                        @error("adresse_etudiant") {{ $message }} @enderror
                    </span>
                </div>
            </div>
            <input style="display: none;" name="specialite_" id="specialite_" value="{{$s}}" type="text">
            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
