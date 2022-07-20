@extends('layouts.app')
<title>Mon compte</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <center> {{ __('Vous êtes connecté !') }} </center>

                    <div>

                        @include('profil.profil')

{{--                        <form action="{{ url("param") }}" method="post" class="row g-3">--}}
{{--                            @csrf--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label for="inputEmail4" class="form-label">Mot de passe</label>--}}
{{--                                <input type="password" class="form-control" id="pass">--}}
{{--                            </div>--}}

{{--                            <div class="col-12">--}}
{{--                                <button type="submit" class="btn btn-primary">Changer le mot de passe</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}


                        <form action="{{ url("deleteAccount/" . Auth::user()->getAuthIdentifier()) }}" method="get">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Supprimer mon compte</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
