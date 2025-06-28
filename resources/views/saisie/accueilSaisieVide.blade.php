{{-- Issu de saisieAccueil
Affiche une page d'saisie en cas de saisie jamais remplie = saisie vide
Il y a trois cas de figures:
  - Aucune donnée saisie: deux card avec des boutons pour saisir l'une ou l'autre
  - Saisie num saisie: il reste la card avec le bouton pour saisir les observation
  - Saisie obs faite: idem avec un bouton pour commencer la saisie des chiffres
--}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@section('sousmenu')

  @include('menus.menuSaisie')

  @section('contenu')

    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          <div class="card-group">

            <div class="card mx-3">

              @if ($saisie->hasnum)

                @include('saisie.accueilVide.hasNum')

              @else

                @include('saisie.accueilVide.noNum')

              @endif

            </div>

            <div class="card mx-3">

              @if ($saisie->hasobs)

                @include('saisie.accueilVide.hasObs')

              @else

                @include('saisie.accueilVide.noObs')

              @endif

            </div>


          </div>




        </div>

      </div>

    </div>

  @endsection
