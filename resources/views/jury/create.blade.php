@extends('template')

@section('title', 'Ajouter Jury')

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Ajouter Jury :</h1>
        <br>
        <form action="{{route('jury.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom-jury">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom-jury" id="nom-jury" value="{{old('nom-jury')}}" type="text">
                    <span class="error-message">
                        @error("nom-jury") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom-jury">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom-jury" id="prenom-jury" value="{{old('prenom-jury')}}" type="text">
                    <span class="error-message">
                        @error("prenom-jury") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="mail-jury">Mail</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="mail-jury" id="mail-jury" value="{{old('mail-jury')}}" type="text">
                    <span class="error-message">
                        @error("mail-jury") {{ $message }} @enderror
                    </span>
                </div>
            </div>

            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
