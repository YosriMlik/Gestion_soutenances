@extends('template')

@section('title', 'Ajouter Soutenence')
@section("style")
<style>
    span{ display: inline-block; }
    label{ padding-top: .5rem; }
</style>
@endsection

@section('content')
    <div class='_container2 mx-auto mt-5'>
        <h1>Modifier Soutenance :</h1>
        <br>
        @if(isset($errorMessage))
            <div class="alert alert-danger">
                {{ $errorMessage }}
            </div>
            <br>
        @endif
        <form action="{{route('soutenance.store')}}" method="post" name="myForm" enctype="multipart/form-data">
            @csrf
            <input style="display: none;" name="specialite_" id="" value="{{$id}}" type="text">
            <div class="row gy-1" style="margin-bottom: 10px;">
                <label class="col-1" for="pfe_soutenance">PFE</label>
                <div class="col-4 p-0">
                    <select name="pfe_soutenance" id="pfe_soutenance" placeholder="Liste PFEs" data-search="true" data-silent-initial-value-set="true">
                        @foreach ($pfes as $pfe)
                            <option value="$pfe->id" @if(old('pfe_soutenance') == $pfe->id) selected @endif>
                                <p class="text-break">{{$pfe->titre}}</p>
                            </option>
                        @endforeach
                    </select>
                    <span class="error-message">
                        @error("pfe_soutenance") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" for="etudiants_soutenance">Etudiant(s)</label>
                <div class="col-4 p-0">
                    <div>
                        <select id="etudiants_soutenance" multiple name="etudiants_soutenance" placeholder="Choisir les Etudiants" data-search="true" data-silent-initial-value-set="true">
                            @foreach ($etudiants as $etudiant)
                                <option value="{{$etudiant->id}}" @if(in_array($etudiant->id, explode(",", old('etudiants_soutenance')))) selected @endif>
                                    {{$etudiant->nom}} {{$etudiant->prenom}}
                                </option>
                            @endforeach
                        </select>
                        <span class="error-message"style="display:inline-block;">
                            @error("etudiants_soutenance") {{ $message }} @enderror
                        </span>
                    </div>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" style="padding-top: .35rem;">Jurys</label>
                <div class="col-4 p-0">
                    <div>
                        <div name="president_soutenance" id="president_soutenance" placeholder="Président" data-search="true" data-silent-initial-value-set="true"></div>
                        <span class="error-message">
                            @error("president_soutenance") {{ $message }} @enderror
                        </span>
                    </div>
                    <div>
                        <div name="rapporteur_soutenance" placeholder="Rapporteur" id="rapporteur_soutenance" data-search="true" data-silent-initial-value-set="true">               </div>
                        <span class="error-message">
                            @error("rapporteur_soutenance") {{ $message }} @enderror
                        </span>
                    </div>
                    <div>
                        <div placeholder="Encadreur Academique" name="encadreur_academique_soutenance" id="encadreur_academique_soutenance" data-search="true" data-silent-initial-value-set="true">                      </div>
                        <span class="error-message">
                            @error("encadreur_academique_soutenance") {{ $message }} @enderror
                        </span>
                    </div>
                    <div>
                        <div placeholder="Encadreur Industriel" name="encadreur_industriel_soutenance" id="encadreur_industriel_soutenance" data-search="true" data-silent-initial-value-set="true"></div>
                        <span class="error-message">
                            @error("encadreur_industriel_soutenance") {{ $message }} @enderror
                        </span>
                    </div>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" for="invites_soutenance">Invité(s)</label>
                <div class="col-4 p-0">
                    <select multiple id="invites_soutenance" name="invites_soutenance" multiple placeholder="Choisir les Invités" data-search="true" data-silent-initial-value-set="true">
                        @foreach ($invites as $invite)
                            <option value="{{$invite->id}}"
                                @php
                                if(old('invites_soutenance'))
                                if(in_array($invite->id, explode(",", old('invites_soutenance'))))
                                    echo 'selected';
                                @endphp>
                                {{$invite->nom}} {{$invite->prenom}}
                            </option>
                        @endforeach
                    </select>
                    <span class="error-message" style="display:inline-block;">
                        @error("invites_soutenance") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" for="date_soutenance">Date</label>
                <div class="col-4 p-0">
                    <input class="form-control" name="date_soutenance" id="date_soutenance" value="{{old('date_soutenance')}}" type="date">
                    <span class="error-message">
                        @error("date_soutenance") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" for="heure_soutenance">Heure</label>
                <div class="col-4 p-0">
                    <input class="form-control" name="heure_soutenance" id="heure_soutenance" value="{{old('heure_soutenance')}}" type="time">
                    <span class="error-message">
                        @error("heure_soutenance") {{ $message }} @enderror
                    </span>
                </div>

                <div class="w-100"><br></div>
                <label class="col-1" for="salle_soutenance">Salle</label>
                <div class="col-4 p-0">
                    <select placeholder="Sélectionner la salle" name="salle_soutenance" id="salle_soutenance" data-search="true" data-silent-initial-value-set="false">
                        {{--option value="" selected disabled hidden style="display: none;">Sélectionner la salle :</option>--}}
                        @foreach ($salles as $salle)
                            <option value="{{$salle->id}}" @if(old('salle_soutenance') == $salle->id) selected @endif>{{$salle->nom}}</option>
                        @endforeach
                    </select>
                    <span class="error-message">
                        @error("salle_soutenance") {{ $message }} @enderror
                    </span>
                </div>
            </div>
        </form>
        <br>
        <button type="submit" id="_submit" class="btn btn-primary" onclick="verif()">Ajouter</button>
    </div>
    <div style="height: 20vh"></div>
@endsection

@section('js')
<script>

    VirtualSelect.init({
        ele: '#pfe_soutenance',
        //  popupDropboxBreakpoint: '3000px',
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init(    {
        ele: '#etudiants_soutenance',
        //popupDropboxBreakpoint: '3000px',
        showValueAsTags: true,
        maxValues: 3,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });

    let jurys = @json($jurys);
    const jury = jurys.map(function(person) {
        return { label: person.prenom+' '+person.nom.toUpperCase(), value: person.id };
    });

    VirtualSelect.init({
        ele: '#president_soutenance',
        //popupDropboxBreakpoint: '3000px',
        options: jury,
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init({
        ele: '#rapporteur_soutenance',
        //popupDropboxBreakpoint: '3000px',
        options: jury,
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init({
        ele: '#encadreur_academique_soutenance',
        //popupDropboxBreakpoint: '3000px',
        options: jury,
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init({
        ele: '#encadreur_industriel_soutenance',
        //popupDropboxBreakpoint: '3000px',
        options: jury,
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init({
        ele: '#invites_soutenance',
        showValueAsTags: true,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
    });
    VirtualSelect.init(    {
        ele: '#salle_soutenance',
        maxValues: 1,
        search: true,
        searchGroup: false,
        searchByStartsWith: false,
        selectedValue: 2,
    });

    let president = document.querySelector('#president_soutenance');
    let rapporteur = document.querySelector('#rapporteur_soutenance');
    let encadreur_academique = document.querySelector('#encadreur_academique_soutenance');
    let encadreur_industriel = document.querySelector('#encadreur_industriel_soutenance');
    function verif(){
        let jury = [president.value, rapporteur.value, encadreur_academique.value, encadreur_industriel.value];
        console.log(jury);
        const uniqueItems = new Set(jury);
        if(uniqueItems.size !== jury.length){
            Swal.fire({
                title: 'Il y a un nom dupliqué dans la liste des Jurys',
                icon: 'error',
                confirmButtonText: "D'accord, je vais vérifier",
            })
        } else{ document.myForm.submit(); }
    };
</script>
@endsection
