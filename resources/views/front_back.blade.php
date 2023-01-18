@extends('layouts.app')

@section('contenu')

    <div class="acces d-flex flex-column justify-content-between container-fluid bg-otorange">
      <div class="d-flex flex-column justify-content-around align-items-center">
        <img src="{{'storage/img/otoveil.jpeg'}}" alt="Panse-Bêtes" class="center-block" style="max-width:50vw" />
        <h2 class="display-4 mt-3">Panse-Bêtes</h2>
        <h2 class="lead">
          Viser l’équilibre de santé de mon troupeau
        </h2>
        <div class="commencer d-flex justify-content-center">
          <a href="{{route('accueil')}}">
            <button class="btn  btn-otobleu btn-lg rounded-0">Commencer</button>
          </a>
        </div>
      </div>


      <div class="d-flex justify-content-end">
        <a href="{{url('/presentation')}}">
          <button class="btn  btn-otojaune btn-lg rounded-0"><i class="fas fa-video"></i> vidéo de présentation</button>
        </a>
      </div>

    </div>
@endsection
