{{-- Issu de saisieAccueil
Affiche la page d'accueil en cas de saisie déjà remplie avec les éventuelles alertes--}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@section('sousmenu')

  @include('menus.menuSaisie')

  @section('contenu')

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('saisie.salertes.salertes')

      </div>

    </div>

  @endsection
