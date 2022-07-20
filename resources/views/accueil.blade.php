<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Tholdi</title>
</head>
<header>
    @include('layouts.app')
</header>

<body class="antialiased">


<!-- Premiere page de présentation !-->
<center>
    <div>
        <div>
            <h1> Tholdi</h1>
                <p> La société THOLDI est spécialisée dans
                    la gestion des containeurs destinés au transport de marchandises.
                    Elle intervient en qualité de
                    prestataire
                    de services pour le compte d’entreprises de transports mais développe également
                    depuis 2010 une activité de frais au travers de sa filiale « Eole»
                </p>
        </div>
    </div>
<!-- Deuxieme page de présentation !-->
    <div>
        <div>
            <center>
                <h1>Ou sommes-nous ?</h1>
                <p> Le siège social de THOLDI est situé à
                    Gennevilliers, en région parisienne,
                    et ses zones d’activités sont implantées dans plusieurs
                    installations
                    portuaires européennes :
                    </br> • Gennevilliers (FR)
                    </br> • Le Havre (FR)
                    </br> • Marseille (FR)
                    </br> • Hambourg (DE)
                    </br> • Anvers (BL)
                    </br> • Barcelone (ES)
                    </br> • Rotterdam (NL)
                    </br> • Gênes (IT)
                </p>
            </center>
        </div>
    </div>

{{-- Fin Deuxieme page de présentation !--}}

{{-- Troisieme page de présentation !--}}

    <div>
        <div>
            <h1>Activité Principale</h1>
                <p></br>
                    • Gérer le déchargement et la réception des containeurs
                    (contrôle de leur provenance et du transporteur maritime) ; </br>
                    • Gérer le placement en zone de stockage temporaire ;</br>
                    • Gérer le chargement des containeurs sur les remorques de transport
                    routier ou de transport ferroviaire ; ;</br>
                    • Gérer le processus d’acheminement de fret de « porte à porte ». ;</br>
                    Nous sommes équipée d’ateliers de réparation pour containeurs (Dry, Reefer, etc.)
                    et propose  des prestations d’entretien et de réparation de conteneurs à ses clients et partenaires.
                </p>
        </div>
    </div>

      <div>
        <div>
          <h1>SERVICES</h1>
              <p></br>
                  "Reefer" Stockage et réparation de conteneurs frigorifiques</br>
                  "Flexitank" Transport de liquides en vrac non dangereux</br>
                  "Bulkliners, linerbags" Installation et mise à disposition
                  de conteneurs maritimes sur les aires de stockage</br>
                  Services pièces détachées et accessoires
              </p>
        </div>
      </div>
</center>

</body>
</html>
