<?php

namespace App\Http\Controllers;

use App\Mail\soutenanceEmail;
use Mail;

class EmailController extends Controller
{
    public function index(){
        foreach(session('emails') as $email){
            Mail::to($email)->queue(new soutenanceEmail(
                session('info')["pfe"],
                session('info')["date"],
                session('info')["heure"],
                session('info')["salle"],
                session('info')["specialite"]
            ));
        };
        $s = session("info")["specialite"];
        //session()->forget(["emails", "info"]);
        return redirect("/specialite/".$s."/soutenances/sent");
    }
}
