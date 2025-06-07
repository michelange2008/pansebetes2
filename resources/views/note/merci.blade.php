@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="alert bg-otorange">
          <h3><i class="far fa-grin-wink"></i> Merci de votre contribution</h3>
        </div>
        <div class="d-flex justify-content-end">
          <a href="{{route('accueil')}}">
            <button class="btn btn-otobleu rounded-0"><i class="fas fa-undo-alt"></i> retour</button>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
