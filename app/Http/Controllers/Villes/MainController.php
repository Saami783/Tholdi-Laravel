<?php

namespace App\Http\Controllers\Villes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function showCity()
    {
        $citys = DB::Table('villes')->get();
        return view('reservation.city', compact('citys'));
    }
}
