@extends('tarif')
@section('tarif')


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($typeContainer as $unContainer)

                <div class="col">
                    <div class="card shadow-sm">
                       <img class="card-img-top" src="{{ asset('images/tarifs/containers/'.$unContainer->img) }}" width="400" height="320">

                        <center><h4>{{ $unContainer->libelleTypeContainer }}</h4></center>
                            <div class="card-body">

                                <center>
                                    <strong> TARIF : </strong>
                                    <p>Par jour : {{ $unContainer->tarif }} € <br>
                                        Par trimestre : {{ $unContainer->tarif * 90 - 184 }} € <br>
                                        Par an : {{ $unContainer->tarif * 365 - 1463 }} € </p>

                                    <strong> TAILLE : </strong>
                                    <p> Longueur : {{ $unContainer->longueurCont }} <br>
                                        Largeur : {{ $unContainer->largeurCont }} cm <br>
                                        Hauteur : {{ $unContainer->hauteurCont }} cm
                                    </p>
                                </center>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</div>

@endsection
