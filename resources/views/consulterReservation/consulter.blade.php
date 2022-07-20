

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($collectionReservations as $reservation)
                <div class="col">
                    <div class="card shadow-sm">
                        <br><center><h4>Commande nᵒ{{ $reservation->codeReservation }}</h4></center>
                        <div class="card-body">
                            <p> Date début reservation : {{ $reservation->dateDebutReservation }} </p>
                            <p> Date fin reservation : {{ $reservation->dateFinReservation }}</p>
                            <p> Volume estimé : {{ $reservation->volumeEstime }} kg</p>
                            <p> Ville de départ : {{ $reservation->VilleD }}</p>
                            <p> Ville d'arrivée : {{ $reservation->VilleA }} </p>
                            <p> Prix total : {{ $reservation->montantDevis }} €</p>
                            <p><a href="{{ url("/devisFormatPdf/$reservation->codeReservation") }}">Télécharger mon devis</a> </p>

                            <a href="{{ url("/deleteCommand/$reservation->codeReservation") }}"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>  </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>



