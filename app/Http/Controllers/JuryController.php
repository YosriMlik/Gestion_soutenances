<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jury;
use App\Models\Pfe;
use App\Models\Pfe_encadreur;
use Illuminate\Validation\Rule;

class JuryController extends Controller
{
    public function index() {
        $jurys = Jury::all();
        return view("jury.index", ["jurys" => $jurys]);
    }

    public function create() {
        return view("jury.create");
    }

    public function store(Request $request) {
        $request->validate([
            'nom-jury'=>['required', 'string', 'max:255'],
            'prenom-jury'=>['required', 'string', 'max:255'],
            'mail-jury'=>['required', 'string', 'max:255', 'unique:jury,mail', 'email:rfc,dns'],
        ]);

        $_jury = new Jury();

        $_jury->nom = strip_tags($request->input("nom-jury"));
        $_jury->prenom = strip_tags($request->input("prenom-jury"));
        $_jury->mail = strip_tags($request->input("mail-jury"));

        $_jury->save();
        return redirect()->route("jury.index");
    }

    public function show(string $id) {}

    public function edit(string $id) {
        $_jury = Jury::findOrFail($id);
        return view("jury.edit", ["_jury" => $_jury]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'nom-jury'=>['required', 'string', 'max:255'],
            'prenom-jury'=>['required', 'string', 'max:255'],
            'mail-jury'=>['required', 'string', 'max:255', 'email:rfc,dns',
                Rule::unique("jury", "mail")->whereNot("id", $id)
            ],
        ]);

        $to_update_jury = Jury::findOrFail($id);

        $to_update_jury->nom = strip_tags($request->input("nom-jury"));
        $to_update_jury->prenom = strip_tags($request->input("prenom-jury"));
        $to_update_jury->mail = strip_tags($request->input("mail-jury"));

        $to_update_jury->save();
        return redirect()->route("jury.index");
    }

    public function destroy(string $id) {
        $to_delete_jury = Jury::findOrFail($id);
        $to_delete_jury->delete();
        return redirect()->route("jury.index");
    }
}
