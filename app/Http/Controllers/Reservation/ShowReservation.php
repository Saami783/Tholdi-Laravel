<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowReservation extends Controller
{
    public function mesReservations(){
        return view('mesReservations');
    }
}
