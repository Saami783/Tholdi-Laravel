<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="css/reservation.css" media="screen">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"
          type="text/css">

    <title>Réservation</title>
</head>
<header>
    @include('layouts.app')
</header>

<body class="antialiased">

<div class="login-form">
    <center><p><span id="erreur" style="color: red;"> </span></p></center>

    <form action="{{ url('reservation') }}" method="post" id="reservation">
        @csrf

        Date de début reservation
        <!-- Date de début -->
        <div class="form-group input-group">
            <input name="dateDebutReservation" required="required" type="date" min="<?= date('Y-m-d', strtotime('0 day')); ?>" max="2023-12-31" class="form-control">
        </div>

        <!-- Date de fin  -->
        Date de fin reservation
        <div class="form-group input-group">
            <input name="dateFinReservation" required="required" type="date" min="<?= date('Y-m-d', strtotime('+7 day')); ?>" max="2023-12-31" class="form-control">
        </div>

        <!-- Volume estimé  -->
        <div class="form-group input-group">
            <input name="volumeEstime" required="required" type="number" min="1" max="900" placeholder="Volume estimé en kg" class="form-control">
        </div>

        @yield('city')

        <br>
        <!-- Bouton valider -->
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary btn-block">Valider ma réservation</button>
        </div>
    </form>
</div>


</body>
</html>
