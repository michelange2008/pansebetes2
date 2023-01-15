@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.menuSaisie')

@section('contenu')
  <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-9">

          <h3>@lang('titres.l_origines')</h3>

          <div class="card">
            <div class="card-header d-flex align-items-center bg-otojaune">
                <h4 class="mb-0">Sur tous les aspects du troupeau</h4>
            </div>
            <div class="card-body">
              <h5 class="lead">{{$message}}</h5>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
              <a href="{{route('saisie.show', $saisie->id) }}">
                <button class="btn btn-otorange rounded-0"><i class="fas fa-arrow-left"></i> Revenir à la saisie</button>
              </a>
              <a href="{{route('accueil')}}">
                <button class="btn btn-otobleu rounded-0 ml-2"><i class="fas fa-undo-alt"></i> Retour à l'accueil</button>
              </a>
            </div>
          </div>
        </div>
      </div>


    </div>

@endsection
