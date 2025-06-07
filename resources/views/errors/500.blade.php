@extends('layouts.app')


@section('contenu')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-lg-9 col-xl-8 bg-otobleu my-3">

        <div class="jumbotron m-4 py-4">

          <img class="img-100" src="{{ url('storage/img/divers/inflammation.gif') }}" alt="inflammation">

          <h1 class="display-4">Désolé !</h1>

          <p class="lead">Il semble que le serveur ait un problème</p>

          <hr class="my-4">

          <p class="lead">J'en suis averti et vais tout faire pour réparer cela très vite</p>

        </div>

      </div>

    </div>

  </div>

@endsection
