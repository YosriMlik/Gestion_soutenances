<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Pfe;

class EtudiantController extends Controller
{
    public function index(){
        $etuds = Etudiant::all();
        return view("etudiant.index", ["etuds" => $etuds]);
    }

    public function create(string $s=null){
        return view("etudiant.create", ['s' => $s]);
    }

    public function store(Request $request){

        $request->validate([
            'nom_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'prenom_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'adresse_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'specialite_'=>['required', 'max:255'],
        ]);
        $etudiant = new Etudiant();

        $etudiant->nom = strip_tags($request->input("nom_etudiant"));
        $etudiant->prenom = strip_tags($request->input("prenom_etudiant"));
        $etudiant->adresse = strip_tags($request->input("adresse_etudiant"));
        $etudiant->specialite_id = strip_tags($request->input("specialite_"));

        $etudiant->save();
        return redirect("/specialite/".strip_tags($request->input("specialite_"))."/etudiants");
    }

    public function show(string $id){}

    public function edit(string $s, string $id){
        $etud = Etudiant::findOrFail($id);
        return view("etudiant.edit", ["etud" => $etud, 's'=>$s]);
    }

    public function update(Request $request, string $id){

        $request->validate([
            'nom_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'prenom_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'adresse_etudiant'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'specialite_'=>['required', 'max:255'],
        ]);

        $to_update_etudiant = Etudiant::findOrFail($id);

        $to_update_etudiant->nom = strip_tags($request->input("nom_etudiant"));
        $to_update_etudiant->prenom = strip_tags($request->input("prenom_etudiant"));
        $to_update_etudiant->adresse = strip_tags($request->input("adresse_etudiant"));
        $to_update_etudiant->specialite_id = strip_tags($request->input("specialite_"));

        $to_update_etudiant->save();
        return redirect("/specialite/".strip_tags($request->input("specialite_"))."/etudiants");
    }

    public function destroy(string $id){
        $to_delete_etudiant = Etudiant::findOrFail($id);
        $specialite = $to_delete_etudiant->specialite;
        $to_delete_etudiant->delete();
        return redirect("/specialite/".$specialite->id."/etudiants");
    }
}
