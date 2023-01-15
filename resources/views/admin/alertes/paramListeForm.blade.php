{{-- Affiche la page de formulaire pour la saisie des parametres d'une
alerte quand celle ci est de type liste. Appelé par edit ou update de
CritalerteController --}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <form class="" action="{{ $route }}" method="post">

      @csrf

      @method($method)

      <div class="row my-3 justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @titre()

        </div>

      </div>

      <div class="row my-3 justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">
          {{-- Permet de passer l'id de l'alerte --}}
          @inputHidden([
            'name' => 'alerte_id',
            'value' => $alerte->id,
          ])

          @for ($i=0; $i < 4; $i++)

            <div class="px-3 form-row d-flex justify-content-between">
              {{-- Ordre d'affichage dans la liste --}}
              @inputNum([
                'label' => 'ordre',
                'name' => 'elts['.$i.'][ordre]',
                'isName' => $i,
              ])
              {{-- nom du parametre dans la liste --}}
              @inputText([
                'label' => 'nom',
                'name' => 'elts['.$i.'][nom]' ,
                'isName' => $critalertes->firstWhere('valeur', $i)->nom ?? '',
              ])
              {{-- coché si ce parametre est anormal --}}
              @inputCheckboxV([
                'label' => 'anormal ?',
                'name' => 'elts['.$i.'][isAlerte]',
                'isName' => 1,
                'checked' => $critalertes->firstWhere('valeur', $i)->isAlerte ?? '',
              ])

            </div>

          @endfor

        </div>

      </div>

      <div class="row my-3 justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @enregistreAnnule(['route' => route('alerte.edit', $alerte->id)])

        </div>

      </div>

    </form>

  </div>

@endsection
