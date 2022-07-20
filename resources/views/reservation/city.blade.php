@extends('reservation')
@section('city')


<!-- Ville de départ  -->
Ville de départ
<select id="first" required="required" name="codeVilleMiseDisposition" class="form-control" required="required" autocomplete="off">
    @foreach($citys as $city)
        <option value="{{ $city->codeVille }}">
        {{ $city->nomVille }}
        </option>
    @endforeach
</select>

<br>
<!-- Ville d'arrivée  -->
Ville d'arrivée
<select id="second" required="required" name="codeVilleRendre" class="form-control" required="required" autocomplete="off">
    @foreach($citys as $city)
        <option value="{{ $city->codeVille }}">
            {{ $city->nomVille }}
        </option>
    @endforeach
</select>

@endsection
