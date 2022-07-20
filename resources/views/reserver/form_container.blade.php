@extends('ligneDeReservation')
@section('form')

        @foreach($typeContainer as $unContainer)
            <option value="{{ $unContainer->numTypeContainer }}">
                {{ $unContainer->libelleTypeContainer }}
            </option>
        @endforeach

@endsection
