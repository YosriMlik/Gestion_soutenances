@extends('template')

@section('title', 'Ajouter Invitée')

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Ajouter Invitée :</h1>
        <br>
        <form action="{{route('invite.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-2" for="nom-invite">Nom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="nom-invite" id="nom-invite" value="{{old('nom-invite')}}" type="text">
                    <span class="error-message">
                        @error("nom-invite") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="prenom-invite">Prenom</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="prenom-invite" id="prenom-invite" value="{{old('prenom-invite')}}" type="text">
                    <span class="error-message">
                        @error("prenom-invite") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"></div>
                <label class="col-2" for="mail-invite">Mail</label>
                <div class="col-3 p-0">
                    <input class="form-control" name="mail-invite" id="mail-invite" value="{{old('mail-invite')}}" type="text">
                    <span class="error-message">
                        @error("mail-invite") {{ $message }} @enderror
                    </span>
                </div>
            </div>

            <button type="submit" id="_submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
