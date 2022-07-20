<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservations;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function reservation()
    {
        return view('reservation');
    }

    public function create(Request $request){
        //dd($request->dateFinReservation);

        $dateReservation = date("Y-m-d", time());
        $dateDeDebutReservation = date("Y-m-d",strtotime($request->dateDebutReservation));
        $dateFinReservation = date("Y-m-d",strtotime($request->dateFinReservation));

        $date1 = new DateTime($dateDeDebutReservation);
        $date2 = new DateTime($dateFinReservation);
        $differenceEntreLesDeuxDates = $date2->diff($date1)->format("%a");

        $uneReservation = new Reservations();

        $uneReservation->dateDebutReservation = $request->dateDebutReservation;
        $uneReservation->dateFinReservation = $request->dateFinReservation;
        $uneReservation->dateReservation = $dateReservation;
        $uneReservation->volumeEstime = $request->volumeEstime;
        $uneReservation->codeVilleMiseDiposition = $request->codeVilleMiseDisposition;
        $uneReservation->codeVilleRendre = $request->codeVilleRendre;
        $uneReservation->codeUtilisateur = Auth::user()->getAuthIdentifier();
        $uneReservation->nbJoursReserve = $differenceEntreLesDeuxDates;

        $uneReservation->save();

        return redirect('ligneDeReservation');
    }

}
