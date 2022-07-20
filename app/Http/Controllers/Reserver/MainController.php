<?php

namespace App\Http\Controllers\Reserver;

use App\Http\Controllers\Controller;
use App\Models\Reservations;
use App\Models\Reserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function ligneDeReservation()
    {
        return view('ligneDeReservation');
    }

    public function typeContainer()
    {
        $typeContainer = DB::table("type_containers")
            ->get();

        return view('reserver.form_container', compact('typeContainer'));
    }

    public function create(Request $request)
    {
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
            $reserver = new Reserver();

            $reserver->numTypeContainer = $request->numTypeContainer;
            $reserver->qteReserver = $request->quantite;
            $reserver->codeReservation = $codeReservation;
            $reserver->save();

        return redirect('ligneDeReservation');
    }

}
