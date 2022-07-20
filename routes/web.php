<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Accueil
Route::get('/', [\App\Http\Controllers\PostController::class, 'accueil']);

// Tarif
Route::get('tarif', [\App\Http\Controllers\Tarif\MainController::class, 'typeContainer']);


// Authentification
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


// Villes de départs et d'arrivées
Route::get('reservation', [\App\Http\Controllers\Villes\MainController::class, 'showCity'])->middleware('verified');;

// Valider une reservation
Route::post('reservation', [\App\Http\Controllers\Reservation\MainController::class, 'create'])->middleware('verified');;


// Valider une ligne de reservation
Route::get('ligneDeReservation', [\App\Http\Controllers\Reserver\MainController::class, 'typeContainer'])->middleware('verified');;

Route::post('ligneDeReservation', [\App\Http\Controllers\Reserver\MainController::class, 'create'])->middleware('verified');;

// Créer un devis
Route::get('creerDevis', [\App\Http\Controllers\Devis\MainController::class, 'create'])->middleware('verified');;


// Consulter les réservations
Route::get('mesReservations', [\App\Http\Controllers\ConsulterReservation\Consulter::class, 'showReservation'])->middleware('verified');;

// Generer un pdf
Route::get('devisFormatPdf/{id}', [\App\Http\Controllers\Pdf\MainController::class, 'exportPdf'])->middleware('verified');;

// Supprimer une commande
Route::get('deleteCommand/{id}', [\App\Http\Controllers\ConsulterReservation\Consulter::class, 'delete'])->middleware('verified');;

// Supprimer son compte
Route::get('deleteAccount/{id}', [\App\Http\Controllers\Auth\Delete::class, 'delete'])->middleware('verified');;

// Changer mdp
Route::post('param}', [\App\Http\Controllers\Auth\Delete::class, 'changeMdp'])->middleware('verified');;
