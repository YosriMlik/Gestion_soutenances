@extends('template')

@section('title', 'Soutenance')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            @if(isset($msg))
            <span hidden id="sent">{{$msg}}</span>
            @endif
            <h1 class="col-lg-10 col-md-8 col-6">Spécialité: {{ $specefic_specialite->nom }}</h1>
            <div class="col-lg-2 col-md-4 col-6 text-end dropdown">
                <a class="btn btn-primary ms-5 px-3" style="border-radius: 0;" href="#Gérer">
                    <i class="bi bi-sliders2-vertical"></i>
                    <span class="ms-1">Gérer</span>
                </a>
                <div class="dropdown-content" style="right: 0; ">
                    <a class="" href="/specialite/{{$specefic_specialite->id}}/pfe">PFE</a>

                    <a class="" href="/specialite/{{$specefic_specialite->id}}/etudiants">Etudiants</a>

                </div>
            </div>
        </div>
        <br>
        <div class="row g-0">
            <div class="col">
                <form class="row ps-0" method="GET" action="{{ route('specefic_soutenance_filter', $specefic_specialite->id) }}">
                    @csrf
                    @method("GET")
                    <div class="col-auto pt-1">Filtrer par :</div>
                    <div class="col-auto"><input class="form-control" type="date" name="date" id=""></div>
                    <div class="col-auto">
                        <select id="" class="form-select" name="salle">
                            <option value="" selected>Sélectionner Salle</option>
                            @foreach ($salles as $salle)
                                <option value="{{$salle->id}}">{{$salle->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn rounded-3 btn-primary ms-3 py-1">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary py-1" href="{{ route('specefic_soutenance_create', $specefic_specialite->id) }}">
                            <i class="bi bi-folder-plus"></i>
                        </a>
                    </div>
                </form>
            </div>
            <div class="col" style="text-align: right;">
                <button class="btn rounded-3 btn-danger pt-2" onclick="del({{$specefic_specialite}})">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">-</th>
                    <th scope="col">Elève</th>
                    <th scope="col">PFE</th>
                    <th scope="col">Societe</th>
                    <th scope="col">Jury</th>
                    <th scope="col">Invités</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Salle</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($specefic_soutenances as $specefic_soutenance)
                <tr onclick="link({{$specefic_soutenance->id}});" id="{{$specefic_soutenance->id}}">
                    <td><input class="form-check-input" type="checkbox" name="" id="rowN-{{$specefic_soutenance->id}}"></td>
                    <td>
                    @foreach ($specefic_soutenance->etudiants as $etudiant)
                        {{ $etudiant->prenom }} <span style="text-transform: uppercase;">{{$etudiant->nom}}</span><br>
                    @endforeach
                    </td>
                    <td>{{ $specefic_soutenance->pfe->titre }}</td>
                    <td>{{ $specefic_soutenance->pfe->societe }}</td>
                    <td>
                    @foreach ($specefic_soutenance->jurys as $jury)
                        {{ $jury->prenom }} <span style="text-transform: uppercase;">{{$jury->nom}}</span> ({{$jury->pivot->role}})<br>
                    @endforeach
                    </td>
                    <td>
                    @foreach ($specefic_soutenance->invites as $invite)

                        {{ $invite->prenom }} <span style="text-transform: uppercase;">{{$invite->nom}}</span><br>

                    @endforeach
                    </td>
                    <td>{{ $specefic_soutenance->date }}</td>
                    <td>{{ substr($specefic_soutenance->heure,0,5) }}</td>
                    <td>{{ $specefic_soutenance->salle->nom }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        let checks = [];
        if(document.getElementById("sent")){
            Swal.fire({
                icon: 'success',
                title: 'Les e-mails ont été envoyés',
            }).then((result) => {
                window.history.pushState(null, "soutenances", "/specialite/{{$specefic_specialite->id}}/soutenances");
            });
        };
        function link(id){
            //window.location.href = "/specialite/{{$specefic_specialite->id}}/soutenance/edit/"+id;
            let row = document.getElementById(id);
            if(row.classList.value == "table-danger"){
                row.classList.remove("table-danger");
                checks.pop(row.id);
            } else{
                row.classList.add("table-danger");
                checks.push(row.id);
            }
            let check = document.getElementById("rowN-"+id);
            check.checked = !check.checked;
        }
        function del(s){
            if (checks.length > 0){
                Swal.fire({
                    title: 'Voulez vous supprimer ces Soutenances ?',
                    icon: 'warning',
                    confirmButtonText: 'Supprimer',
                    confirmButtonColor: '#dc3741',
                    showCancelButton: true,
                    cancelButtonText: `Annuler`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/specialite/${s}/soutenance/delete?ids=`+checks.join(',');
                    }
                })
            }
        }
    </script>
@endsection
