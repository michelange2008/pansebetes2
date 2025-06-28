@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.menuSaisie')

@section('contenu')
  <div class="container-fluid">
      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          <h3>@lang('titres.saisie_renomme')</h3>

          <form class="" action="{{ route('saisie.renomStore', $saisie) }}" method="post">
            @csrf
          @inputText([
            'name' => 'nom',
            'label' => 'Nom de la saisie',
            'isName' => $saisie->nom,
            'required' => true,
          ])

          @enregistreAnnule()
        </form>

        </div>
      </div>

    </div>

@endsection
