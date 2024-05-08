<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\PfeController;
use App\Http\Controllers\SoutenanceController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\EmailController;
use App\Mail\soutenanceEmail;

Route::middleware("verified")->group(function(){
    Route::resource("jury", JuryController::class);
    Route::resource("invite", InviteController::class);
    Route::resource("salle", SalleController::class);
    Route::resource("specialite", SpecialiteController::class);

    Route::get('specialite/{id_specialite}/etudiants', [SpecialiteController::class, 'specialite_etudiant']);
    Route::get("/specialite/{s?}/etudiant/create/", [EtudiantController::class, "create"])->name("specefic_etudiant_create");
    Route::get("/specialite/{s?}/etudiant/edit/{id}", [EtudiantController::class, "edit"])->name("specefic_etudiant_edit");
    //Route::get("/specialite/{s?}/etudiant/delete", [EtudiantController::class, "del"])->name("specefic_etudiant_delete");
    Route::get('/etudiant/create', function () { abort(404);  });
    Route::get('/etudiant/{id}/edit', function () { abort(404);  });
    Route::resource("etudiant", EtudiantController::class, ['except' => ['create', 'edit']]);

    Route::get('specialite/{id_specialite}/pfe', [SpecialiteController::class, 'specialite_pfe']);
    Route::get("/specialite/{s?}/pfe/create/", [PfeController::class, "create"])->name("specefic_pfe_create");
    Route::get("/specialite/{s?}/pfe/edit/{id}", [PfeController::class, "edit"])->name("specefic_pfe_edit");
    Route::get('/pfe/create', function () { abort(404);  });
    Route::get('/pfe/{id}/edit', function () { abort(404);  });
    Route::resource("pfe", PfeController::class, ['except' => ['create', 'edit']]);

    Route::get('specialite/{id_specialite}/soutenances/{msg?}', [SpecialiteController::class, 'specialite_soutenance']);
    Route::get("/specialite/{s?}/soutenance/create/", [SoutenanceController::class, "create"])->name("specefic_soutenance_create");
    Route::get("/specialite/{s?}/soutenance/edit/{id}", [SoutenanceController::class, "edit"])->name("specefic_soutenance_edit");
    Route::get("/specialite/{s?}/soutenance/delete", [SoutenanceController::class, "del"])->name("specefic_soutenance_delete");
    Route::get("/specialite/{s?}/soutenance/filtrer", [SoutenanceController::class, "filter"])->name("specefic_soutenance_filter");
    Route::get('/soutenance/create', function () { abort(404);  });
    Route::get('/soutenance/{id}/edit', function () { abort(404);  });
    Route::resource("soutenance", SoutenanceController::class, ['except' => ['create', 'edit']]);

    Route::get('/send', [EmailController::class, "index"])->name("send");
});

Route::get('/', function () {
    return redirect("/specialite/1/soutenances");
});

Auth::routes(["verify"=>true, 'register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
