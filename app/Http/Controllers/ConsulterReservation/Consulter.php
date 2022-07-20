<?php

namespace App\Http\Controllers\ConsulterReservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Consulter extends Controller
{

    public function delete()
    {
        $id = Auth::user()->getAuthIdentifier();
        DB::table("reservations")
            ->where("reservations.codeUtilisateur", "=", $id)
            ->where("reservations.codeReservation", "=", \request('id'))
            ->delete();
        return view('accueil');
    }

    public function showReservation()
    {
    // Reservation non complete

//        SELECT reservation.codeReservation, dateDebutReservation, dateFinReservation, volumeEstime
//         FROM reservation
//          LEFT JOIN reserver rs on rs.codeReservation = reservation.codeReservation
//         JOIN utilisateur ON utilisateur.codeUtilisateur = reservation.codeUtilisateur
//          WHERE rs.codeReservation is null
//    AND reservation.codeUtilisateur =  " . $_SESSION['codeUtilisateur'] . "
//          ORDER BY reservation.codeReservation ASC;

        $id = Auth::user()->getAuthIdentifier();

        $collectionReservations = DB::table('reservers')
            ->select('reservations.dateDebutReservation', 'reservations.dateFinReservation', 'reservations.volumeEstime', 'reservations.codeReservation', 'devis.montantDevis', 'VilleD.nomVille as VilleD', 'VilleA.nomVille as VilleA', 'reservers.qteReserver')
            ->join('reservations','reservations.codeReservation','=','reservers.codeReservation')
            ->join('users','users.id','=','reservations.codeUtilisateur')
            ->join('devis','devis.codeDevis','=','reservations.codeDevis')
            ->join('type_containers','type_containers.numTypeContainer','=','reservers.numTypeContainer')
            ->join('villes  AS VilleD','VilleD.codeVille','=','reservations.codeVilleMiseDiposition')
            ->join('villes AS VilleA','VilleA.codeVille','=','reservations.codeVilleRendre')
            ->where('reservations.codeUtilisateur','=',DB::raw('users.id'))
            ->where('users.id','=',$id)
            ->groupBy('reservers.codeReservation')
            ->get();

        return view('mesReservations', compact('collectionReservations'));
    }


}
