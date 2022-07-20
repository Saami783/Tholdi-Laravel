<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarif.css') }}">

    <title>Mes Réservations</title>
</head>
<header>
    @include('layouts.app')
</header>

<body class="antialiased">

@include('consulterReservation.consulter')

</body>
</html>

