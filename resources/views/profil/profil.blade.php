<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

$id = Auth::user()->getAuthIdentifier();

$myUser = DB::table('users')
    ->select('*')
    ->where('id','=', $id)
    ->get();
?>

@foreach($myUser as $user)
    <br>
    <p>Raison Sociale : {{ $user->raisonSociale }}</p>
    <p>Adresse : {{ $user->adresse }}</p>
    <p>Code Postal : {{ $user->cp }}</p>
    <p>Ville : {{ $user->ville }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Telephone : {{ $user->telephone }}</p>
    <p>Pays : {{ $user->codePays }}</p>
    <p>Contact : {{ $user->contact }}</p>
    <p>Compte crée le : {{ $user->created_at }}</p>
@endforeach


