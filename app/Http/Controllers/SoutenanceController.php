<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

use App\Models\Invite;
use App\Models\Salle;
use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Models\Soutenance;
use App\Models\Pfe;
use App\Models\Etudiant;
use App\Models\Jury;
use App\Mail\soutenanceEmail;
use Mail;

class SoutenanceController extends Controller {

    public function index() {
        $soutenances = Soutenance::all();
        return view("soutenance.index", ["soutenances" => $soutenances]);
    }


    public function create(string $id) {
        $salles = Salle::all();
        $jurys = Jury::all();
        $invites = Invite::all();
        $specialite = Specialite::findOrFail($id);
        $etudiants = $specialite->etudiants()->where("soutenance_id", null)->get();
        $pfes = $specialite->pfes()->where('soutenance_id', null)->get();

        return view("soutenance.create",[
            "id"=>$id,
            "salles"=>$salles,
            "jurys"=>$jurys,
            "invites"=>$invites,
            "pfes"=>$pfes,
            "etudiants"=>$etudiants,
        ]);
    }


    public function store(Request $request) {
        $hrPlus = Carbon::parse($request->input('heure_soutenance'))->addHour();
        $request->validate([
            'specialite_'=>['required'],
            'pfe_soutenance'=>['required'],
            'etudiants_soutenance'=>['required'],
            'president_soutenance'=>['required'],
            'rapporteur_soutenance'=>['required'],
            'encadreur_academique_soutenance'=>['required'],
            'encadreur_industriel_soutenance'=>['required'],
            'date_soutenance'=>['required'],
            'heure_soutenance'=>['required'],
            'salle_soutenance'=>['required',
                Rule::unique('soutenance', 'salle_id')
                ->where('date', $request->input('date_soutenance'))
                ->whereNotIn('heure', [$request->input('heure_soutenance'), "{$hrPlus->hour}:{$hrPlus->minute}:{$hrPlus->second}"])
            ],
        ],
        [
            'salle_soutenance.unique' => 'La salle est reservée dans cette date et heure',
        ]);

        $soutenance = new Soutenance();
        $soutenance->date = strip_tags($request->input("date_soutenance"));
        $soutenance->heure = strip_tags($request->input("heure_soutenance"));
        $soutenance->specialite_id = strip_tags($request->input("specialite_"));
        $soutenance->salle_id = strip_tags($request->input("salle_soutenance"));
        $soutenance->pfe_id = strip_tags($request->input("pfe_soutenance"));
        $soutenance->save();

        $etudiants_ids = explode(",", $request->input("etudiants_soutenance"));
        foreach($etudiants_ids as $etudiant_id){
            $etudiant = Etudiant::findOrFail($etudiant_id);
            $etudiant->soutenance_id = $soutenance->id;
            $etudiant->save();
        };

        $pfe = Pfe::findOrFail($request->input("pfe_soutenance"));
        $pfe->soutenance_id = $soutenance->id;
        $pfe->save();

        $soutenance->jurys()->attach($request->input("president_soutenance"), ["role"=>"president"]);

        $soutenance->jurys()->attach($request->input("rapporteur_soutenance"), ["role"=>"rapporteur"]);

        $soutenance->jurys()->attach($request->input("encadreur_academique_soutenance"), ["role"=>"encadreur_academique"]);

        $soutenance->jurys()->attach($request->input("encadreur_industriel_soutenance"), ["role"=>"encadreur_industriel"]);


        $info = [];
        $emails = [];
        if($request->input("invites_soutenance") != ""){
            $invites_ids = explode(",",$request->input("invites_soutenance"));
            foreach($invites_ids as $invite_id){
                $soutenance->invites()->attach($invite_id);
                $emails[Invite::findOrFail($invite_id)->nom] = Invite::findOrFail($invite_id)->mail;
            };
        };
        $emails["president"] = Jury::findOrFail($request->input("president_soutenance"))->mail;
        $emails["rapporteur"] = Jury::findOrFail($request->input("rapporteur_soutenance"))->mail;
        $emails["encadreur_academique"] = Jury::findOrFail($request->input("encadreur_academique_soutenance"))->mail;
        $emails["encadreur_industriel"] = Jury::findOrFail($request->input("encadreur_industriel_soutenance"))->mail;

        $info["pfe"] = Pfe::findOrFail($request->input("pfe_soutenance"))->titre;
        $info["date"] = $request->input("date_soutenance");
        $info["heure"] = $request->input("heure_soutenance");
        $info["salle"] = $request->input("salle_soutenance");
        $info["specialite"] = $request->input("specialite_");
        session([
            "emails"=>$emails,
            "info"=>$info
        ]);
        return redirect()->route('send');
    }

    public function filter(string $specialite, Request $request) {
        $salles = Salle::all();
        $specefic_specialite = Specialite::findOrFail($specialite);
        $date = $request->input('date');
        $salle = $request->input('salle');

        if($date && !$salle)
            $specefic_soutenance = Soutenance::where("date", $date)->get();
        else if(!$date && $salle)
            $specefic_soutenance = Soutenance::where("salle_id", $salle)->get();
        elseif($date && $salle)
            $specefic_soutenance = Soutenance::where("date", $date)->where("salle_id", $salle)->get();
        else $specefic_soutenance = $specefic_specialite->soutenances;

        return view("specialite.soutenances",
        ["specefic_specialite" => $specefic_specialite,
        "msg"=>null,
        "specefic_soutenances" => $specefic_soutenance,
        "salles" => $salles
        ]);
    }


    public function edit(string $s, string $id) {
        /*$specialite = Specialite::findOrFail($s);
        $soutenance = Soutenance::findOrFail($id);
        return $specialite->pfes;
        //return $soutenance->salle;
        $etudiants = $soutenance->etudiants;
        $president = $soutenance->jurys()->wherePivot("role", "president")->get();
        $rapporteur = $soutenance->jurys()->wherePivot("role", "rapporteur")->get();
        $encadreur_academique = $soutenance->jurys()->wherePivot("role", "encadreur_academique")->get();
        $encadreur_industriel = $soutenance->jurys()->wherePivot("role", "encadreur_industriel")->get();
        $invites = $soutenance->invites;
        $date = $soutenance->date;
        $heure = $soutenance->heure;
        $salle = $soutenance->salle;

        return view("soutenance.edit",[
            "specialite"=>$s,
            "id"=>$id,
            "pfes"=>$pfe,
            "etudiants"=>$etudiants,
            "president"=>$president,
            "rapporteur"=>$rapporteur,
            "encadreur_academique"=>$encadreur_academique,
            "encadreur_industriel"=>$encadreur_industriel,
            "invites"=>$invites,
            "date"=>$date,
            "heure"=>$heure,
            "salles"=>$salle,
            "jurys"=>"jjjjjj",
        ]);*/
    }


    public function update(Request $request, string $id) {
        //
    }


    public function del(string $s, Request $req) {
        $ids =  explode(',', $req->input('ids'));
        foreach($ids as $id){
            $to_delete_soutenance = Soutenance::findOrFail($id);
            $to_delete_soutenance->delete();
        }
        return redirect("/specialite/".$s."/soutenances");
    }
}
