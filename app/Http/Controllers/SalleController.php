<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use App\Models\Salle as SalleModel;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = SalleModel::all();
        return view('salle.index', ['salles'=>$salles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("salle.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_salle'=>['required', 'string', 'max:255'],
        ]);

        $_salle = new Salle();

        $_salle->nom = strip_tags($request->input("nom_salle"));

        $_salle->save();
        return redirect()->route("salle.index");
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
        $_salle = Salle::findOrFail($id);
        return view("salle.edit", ["_salle" => $_salle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom_salle'=>['required', 'string', 'max:255'],
        ]);

        $to_update_salle = Salle::findOrFail($id);

        $to_update_salle->nom = strip_tags($request->input("nom_salle"));

        $to_update_salle->save();
        return redirect()->route("salle.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $to_delete_salle = Salle::findOrFail($id);
        $to_delete_salle->delete();
        return redirect()->route("salle.index");
    }
}
