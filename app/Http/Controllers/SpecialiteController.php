<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use App\Models\Salle;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites = Specialite::all();
        return view('specialite.index', ['specialites'=>$specialites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("specialite.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_specialite'=>['required', 'string', 'max:255'],
        ]);

        $_specialite = new Specialite();

        $_specialite->nom = strip_tags($request->input("nom_specialite"));

        $_specialite->save();
        return redirect()->route("specialite.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $_specialite = Specialite::findOrFail($id);
        return view("specialite.edit", ["_specialite" => $_specialite]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom_specialite'=>['required', 'string', 'max:255'],
        ]);

        $to_update_specialite = Specialite::findOrFail($id);

        $to_update_specialite->nom = strip_tags($request->input("nom_specialite"));

        $to_update_specialite->save();
        return redirect()->route("specialite.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $to_delete_specialite = specialite::findOrFail($id);
        $to_delete_specialite->delete();
        return redirect()->route("specialite.index");
    }

// ==================== SOUTENANCES ====================
    public function specialite_soutenance($id_specialite, $msg=null){
        $salles = Salle::all();
        $specefic_specialite = Specialite::findOrFail($id_specialite);
        $specefic_soutenances = $specefic_specialite->soutenances;
        return view("specialite.soutenances",
        [
            "specialite" => $id_specialite,
            "specefic_specialite" => $specefic_specialite,
            "msg"=>$msg,
            "specefic_soutenances" => $specefic_soutenances,
            "salles" => $salles
        ]);
    }

// ==================== PFES ====================
    public function specialite_pfe($id_specialite){
        $specefic_specialite = Specialite::findOrFail($id_specialite);
        $specefic_pfes = $specefic_specialite->pfes;
        return view("specialite.pfes", ["specefic_specialite" => $specefic_specialite, "specefic_pfes" => $specefic_pfes]);
    }

// ==================== ETUDIANTS ====================
    public function specialite_etudiant($id_specialite){
        $specefic_specialite = Specialite::findOrFail($id_specialite);
        $specefic_etudiants = $specefic_specialite->etudiants;
        return view("specialite.etudiants", ["specefic_specialite" => $specefic_specialite, "specefic_etudiants" => $specefic_etudiants]);
    }
}
