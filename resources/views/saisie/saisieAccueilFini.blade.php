@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.sousmenu', ['titre' => 'Saisie des observations'])

@section('contenu')

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="alert bg-otobleu">
        <h4>{{ __('saisie.'.$saisie_accueil->titre) }}</h3>
      </div>
      <div class="card-deck">

        @foreach ($saisie_accueil->items as $item)

          <div class="card">

            <div class="card-body">
              <div class="d-flex flex-row  bg-{{ $item->couleur }} align-items-center mb-3 p-3">

                {{-- <img class="img-40" src="{{'storage/img/saisie/'.$item->icone}}" alt=""> --}}
                <h4 class="card-titletext-center"><i class="fa-solid {{ $item->ordre }}"></i> - {{ __('saisie.'.$item->titre) }}</h4>
              </div>
              <p class="card-text lead">{{ __('saisie.'.$item->intro_1) }}</p>
              <p class="card-text lead">{{ __('saisie.'.$item->intro_2) }}</p>
            </div>

            <div class="card-footer bg-transparent border-light">
                @valider([
                  'couleur' => $item->couleur,
                  'route' => route($item->route, $saisie->id),
                  'fa' => 'fa-pencil',
                  'libelle' => __('boutons.commencer')
                ])

            </div>

          </div>

        @endforeach

      </div>
    </div>
  </div>
</div>

@endsection
