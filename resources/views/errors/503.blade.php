@extends('layouts.app')


@section('contenu')

  <div class="container-fluid bg-otorange p-5">

    <div class="row justify-content-center">

      <div class="col-sm-10 col-md-9 col-lg-8">

        <img class="img-fluid" src="{{ url('storage/img/503.jpg') }}" alt="En travaux">

      </div>

    </div>

    <hr class="divider">

    <div class="row justify-content-center">

      <div class="col-sm-10 col-md-9 col-lg-8 my-5">

        <h3>Désolé, le site est en maintenance...</h3>

        <p class="lead">Rassurez-vous, il n'y en a pas pour longtemps.</p>

      </div>

    </div>

  </div>

@endsection
