<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pfe;
use App\Models\Etudiant;
use App\Models\Jury;
use App\Models\Pfe_encadreur;

class PfeController extends Controller
{

    public function index() {
        $pfes = Pfe::all();
        return view("pfe.index", ["pfes" => $pfes]);
    }


    public function create(string $s=null) {
        return view("pfe.create", ["s"=>$s]);
    }


    public function store(Request $request) {
        $request->validate([
            'titre_pfe'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'societe_pfe'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'specialite_'=>['required', 'max:255'],
        ]);

        $_pfe = new Pfe();
        $_pfe->titre = strip_tags($request->input("titre_pfe"));
        $_pfe->societe = strip_tags($request->input("societe_pfe"));
        $_pfe->specialite_id = strip_tags($request->input("specialite_"));
        $_pfe->save();

        return redirect("/specialite/".strip_tags($request->input("specialite_"))."/pfe");
    }

    public function show(string $id){}

    public function edit(string $s, string $id) {
        $_pfe = Pfe::findOrFail($id);
        return view("pfe.edit", ["_pfe" => $_pfe, 's'=>$s]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'titre_pfe'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'societe_pfe'=>['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'specialite_'=>['required', 'max:255'],
        ]);

        $to_update_pfe = Pfe::findOrFail($id);
        $specialite = $to_update_pfe->specialite;
        $to_update_pfe->titre = strip_tags($request->input("titre_pfe"));
        $to_update_pfe->societe = strip_tags($request->input("societe_pfe"));
        $to_update_pfe->specialite_id = strip_tags($request->input("specialite_"));
        $to_update_pfe->save();

        return redirect("/specialite/".$specialite->id."/pfe");
    }

    public function destroy(string $id)
    {
        $to_delete_pfe = Pfe::findOrFail($id);
        $specialite = $to_delete_pfe->specialite;
        $to_delete_pfe->delete();
        return redirect("/specialite/".$specialite->id."/pfe");
    }
}
