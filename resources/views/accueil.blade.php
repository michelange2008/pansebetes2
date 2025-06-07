@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_accueil', ['especes' => $especes])

@section('contenu')

  <div class="container-fluid">

    <!-- Choix de l'espèce qui ne s'affiche que avec un smartphone -->
    @include('accueil.choix_smartphone')

    @include('accueil.bandeau_ferme')

    {{-- Choix de l'espèce que pour les grands écrans --}}
    @include('accueil.choix_laptop')

    @if ($saisies->count() > 0)

      <!-- S'il y a des saisies, affichage de la liste des saisies avec des informations et des boutons -->
      @include('accueil.liste_saisies')

      {{-- Bandeau pour proposer de comparer les saisies --}}
      @include('accueil.bandeau_compare')

    @else

      {{-- Sinon on affiche un texte d'accueil pour indiquer comment conmmencer --}}
      @include('accueil.accueil_sans_saisie')

    @endif

  </div>

@endsection
