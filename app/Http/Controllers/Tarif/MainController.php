<?php

namespace App\Http\Controllers\Tarif;

use App\Http\Controllers\Controller;
use App\Models\TarificationContainers;
use App\Models\TypeContainers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function typeContainer()
    {
        $typeContainer = DB::table("type_containers")
            ->get();

        return view('tarif.index',compact('typeContainer'));
    }


}

