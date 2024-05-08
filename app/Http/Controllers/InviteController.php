<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;

class InviteController extends Controller
{

    public function index()
    {
        $invites = Invite::all();
        return view("invite.index", ["invites" => $invites]);
    }


    public function create()
    {
        return view("invite.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom-invite'=>['required', 'string', 'max:255'],
            'prenom-invite'=>['required', 'string', 'max:255'],
            'mail-invite'=>['required', 'string', 'max:255', 'unique:jury,mail', 'email:rfc,dns'],
        ]);

        $_invite = new Invite();

        $_invite->nom = strip_tags($request->input("nom-invite"));
        $_invite->prenom = strip_tags($request->input("prenom-invite"));
        $_invite->mail = strip_tags($request->input("mail-invite"));

        $_invite->save();
        return redirect()->route("invite.index");
    }


    public function show(string $id) {}

    public function edit(string $id)
    {
        $_invite = Invite::findOrFail($id);
        return view("invite.edit", ["_invite" => $_invite]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom-invite'=>['required', 'string', 'max:255'],
            'prenom-invite'=>['required', 'string', 'max:255'],
            'mail-invite'=>['required', 'string', 'max:255', 'unique:jury,mail', 'email:rfc,dns'],
        ]);

        $to_update_invite = Invite::findOrFail($id);

        $to_update_invite->nom = strip_tags($request->input("nom-invite"));
        $to_update_invite->prenom = strip_tags($request->input("prenom-invite"));
        $to_update_invite->mail = strip_tags($request->input("mail-invite"));

        $to_update_invite->save();
        return redirect()->route("invite.index");
    }


    public function destroy(string $id)
    {
        $to_delete_invite = Invite::findOrFail($id);
        $to_delete_invite->delete();
        return redirect()->route("invite.index");
    }
}
