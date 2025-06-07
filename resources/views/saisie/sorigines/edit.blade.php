{{-- Issu de SorigineController@sorigineEdit
Permet de cocher les origines d'une alerte lors de la saisie
 --}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_alertes')

@extends('menus.menuSaisie')

@section('contenu')

  <div class="row justify-content-center">

    <div class="ccol-sm-11 col-md-10 col-lg-9">

      <form class="" action="{{ route('sorigines.store') }}" method="post">
        @csrf

        <h3>{{ $alerte->nom }}</h3>

        <input type="hidden" name="saisie_id" value="{{ $saisie->id }}">
        <input type="hidden" name="salerte_id" value="{{ $salerte_id }}">
        <input type="hidden" name="theme_id" value="{{ $alerte->theme->id }}">

        @foreach ($origines as $origine)

          <div class="m-3 form-control-lg form-check">

            <input class="form-check-input" type="checkbox" id="O{{ $origine->id }}" name="O{{ $origine->id }}" value="{{ $origine->id }}"
            @if ($origine->cochee)
              checked = "checked"
            @endif
            >

            <label class="form-check-label" for="O{{ $origine->id }}">{{ ucfirst($origine->reponse)." ?" }}</label>


          </div>

        @endforeach

        @enregistreAnnule()

      </form>

      <div >


      </div>



    </div>

  </div>

@endsection
