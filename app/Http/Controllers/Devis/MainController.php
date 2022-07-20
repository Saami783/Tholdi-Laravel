<?php

namespace App\Http\Controllers\Devis;

use App\Http\Controllers\Controller;
use App\Models\Devis;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function create(){

        $id = Auth::user()->getAuthIdentifier();

        $code = DB::table("reservations")
            ->join("users", function($join){
                $join->on("users.id", "=", "reservations.codeUtilisateur");
            })
            ->select("codeReservation")
            ->where("users.id", "=", $id)
            ->limit(1)
            ->orderBy("codeReservation","desc")
            ->get();

        $codeReservation = null;

        foreach ($code as $codes)
        {
            $codeReservation = $codes->codeReservation;
        }

        $collectionReservation = DB::table("reservations")
            ->join("reservers", function($join){
                $join->on("reservers.codeReservation", "=", "reservations.codeReservation");
            })
            ->join("type_containers", function($join){
                $join->on("type_containers.numTypeContainer", "reservers.numTypeContainer", "=");
            })
            ->where("reservers.codeReservation", "=", $codeReservation)
            ->get();

        $montant = null;

        foreach ($collectionReservation as $maReservation)
        {
           $montant += $maReservation->tarif * $maReservation->qteReserver * $maReservation->nbJoursReserve;
        }

        $monDevis = new Devis();
        $monDevis->montantDevis = $montant;
        $monDevis->valider = 'Non';
        $monDevis->save();

        $codeDevis = DB::table("devis")
            ->select("codeDevis")
            ->limit(1)
            ->orderBy("codeDevis","desc")
            ->get();

        $myCodeDevis = null;

        foreach ($codeDevis as $monCode){
            $myCodeDevis = $monCode->codeDevis;
        }

        DB::table('reservations')
            ->where('codeReservation', $codeReservation)
            ->update(['codeDevis' => $myCodeDevis]);

        return redirect('/');
    }
}
