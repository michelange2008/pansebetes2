@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_accueil', ['especes' => $especes])

@section('contenu')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()

      </div>

    </div>

      @include('accueil.liste_saisies')

  </div>

@endsection
