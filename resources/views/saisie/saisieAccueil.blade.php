@extends('layouts.app')

@extends('menus.menuprincipal')

@section('sousmenu')

  @include('menus.menuSaisieVide')

@section('contenu')

  <div class="container-fluid">

        @if ($saisie->salertes->count() == 0)

          @include('saisie.accueilSaisieVide')

        @else

            @include('saisie.accueilSaisiePleine')

        @endif

  </div>

@endsection
