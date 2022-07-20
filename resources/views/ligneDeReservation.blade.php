<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/saisirLigneDeReservation.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <title>Réservation</title>
</head>

    <header>
        @include('layouts.app')
    </header>

    <body>

    <div id="lignereservation-form">

        <form action="{{ url('ligneDeReservation') }}" method="post">
            @csrf
            <h2 class="text-center">Reservation</h2>
            <div class="form-group">
                <select name="numTypeContainer" class="form-control" required="required" autocomplete="off">
                    @yield('form')
                </select>

    Quantite
    <br>
    <input type="number" min="0" max="10" name="quantite" class="form-control" placeholder="Quantite"
           required="required"
           autocomplete="off">
    <input type="submit" value="Ajouter une ligne de réservation" class="form-control"
           placeholder="Volume estimé" required="required" autocomplete="off" name="ajouterUneLigne">
    </div>
    </form>

    <form action="{{ url('creerDevis') }}" method="get">
        <input type="submit" value="Finaliser la réservation" class="form-control" placeholder="Volume estimé"
               required="required" autocomplete="off">
    </form>
    </div>


    </body>
</html>
