@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.sousmenu', ['titre' => 'Analyse des alertes'])

@section('contenu')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header d-flex align-items-center bg-otojaune">
              <img class="img-40" style="filter:brightness(0)" src="{{ url('storage/img/saisie/').$theme->icone }}" alt="">
              <h4 class="mb-0">{{ucfirst($theme->nom)}}</h4>
          </div>
          <div class="card-body">
            <h5 class="lead">{{$message}}</h5>
          </div>
          <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
            <a href="{{route('saisie.show', session()->get('saisie_id'))}}">
              <button class="btn btn-otorange rounded-0"><i class="fas fa-globe"></i> Choisir un autre pôle</button>
            </a>
            <a href="{{route('saisie.alertes', ['theme_id' => $theme->id])}}">
              <button class="btn btn-otobleu rounded-0 ml-2"><i class="fas fa-undo-alt"></i> Revenir à la saisie</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
