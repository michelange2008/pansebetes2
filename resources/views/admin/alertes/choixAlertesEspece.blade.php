@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()

      </div>

    </div>

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <div class="d-flex justify-content-around">

          @foreach ($especes as $espece)

            <a href="{{ route( 'alerte.indexParEspece', $espece->nom ) }}">

              <img src="{{ url('storage/img/especes/'.$espece->icone) }}" alt="$espece->icone">
            </a>

          @endforeach

        </div>

      </div>

    </div>

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9 d-flex justify-content-end">

        @annule([
          'nomAnnule' => __('boutons.accueil'),
          'route' => 'accueil'
        ])

      </div>

    </div>

  </div>

@endsection
