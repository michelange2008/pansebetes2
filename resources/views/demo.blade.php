@extends('layouts.app')

@section('contenu')
  <div class="controller-fluid">
    <video controls="controls" style="width:100%; max-height:80vh" poster="{{asset(config('chemins.images'))}}/otoveil_petit.jpeg" >
      <source src="{{asset(config('chemins.fichiers'))}}/demo.mp4" type="video/mp4" />
      Votre navigateur ne supporte pas le tag <video>
      </video>
  </div>
  <div class="controller-fluid m-3">
    <a href="{{route('aide')}}">
      <button class="btn btn-otobleu rounded-0" type="button" name="button">Retour à l'accueil</button>
    </a>
  </div>
@endsection
