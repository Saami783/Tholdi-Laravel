<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarif.css') }}">

    <title>Tarif</title>
</head>
<header>
    @include('layouts.app')
</header>

<body class="antialiased">

<div class="container">
    | <a class="nbContainer" href="#">Nombre de containers Dry Freigh </a> <small> 3</small>
    | <a class="nbContainer" href="#">Nombre de containers Flat Rack </a> <small> 2</small>
    | <a class="nbContainer" href="#">Nombre de containers Reefer </a> <small> 2 </small>
    | <a class="nbContainer" href="#">Nombre de containers Open Top </a> <small> 2 </small> |
</div>


@yield('tarif')


</body>
