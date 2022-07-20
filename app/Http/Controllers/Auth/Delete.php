<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class Delete extends Controller
{
    public function delete($id)
    {
        if (Auth::user()->getAuthIdentifier() == $id)
        {
            User::destroy($id);
            return redirect()->route('login')->with('success', 'Utilisateur supprimé');
        }else{
            return redirect()->route('/home')->with('warning', 'Impossible de supprimer cet utilisateur');
        }

    }

    public function changeMdp(Request $request){

        return view('home');
    }
}
