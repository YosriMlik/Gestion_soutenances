@extends('template')

@section('title', 'Ajouter PFE')

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Ajouter PFE :</h1>
        <br>

        <form action="{{route('pfe.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="titre_pfe">Titre</label>
                <div class="col-4 p-0">
                    <textarea class="form-control" rows="3" name="titre_pfe" id="titre_pfe" type="text">{{old('titre_pfe')}}</textarea>
                    <span class="error-message">
                        @error("titre_pfe") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="societe_pfe">Societe</label>
                <div class="col-4 p-0">
                    <input class="form-control" name="societe_pfe" id="societe_pfe" value="{{old('societe_pfe')}}" type="text">
                    <span class="error-message">
                        @error("societe_pfe") {{ $message }} @enderror
                    </span>
                </div>
                <input style="display: none;" name="specialite_" id="specialite_pfe" value="{{$s}}" type="text">
            </div>
            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <div style="height: 20vh"></div>
@endsection

