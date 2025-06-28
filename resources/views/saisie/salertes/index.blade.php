{{-- appeler par SalerteController@index
Affiche les alerte d'un thème d'une saisie
--}}

@extends('layouts.app')

@extends('menus.menuprincipal')

@section('sousmenu')

  @include('menus.menuSaisie')

  @section('contenu')

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <h3>@lang('titres.detail_theme')</h3>

        {{-- Bandeau orange avec le nom du thème et le nombre de salertes --}}
        @include('saisie.themes.themesAvecAlertesDetail')
        {{-- liste des salertes correspondant au thème avec possibilité d'afficher les origines --}}
      </div>

    </div>

    <div class="row justify-content-center ">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('saisie.salertes.listeAlertesVisible')

      </div>

    </div>

  @endsection
