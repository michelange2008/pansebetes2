@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_aide')

@section('contenu')

  <div class="container-fluid">
    <div class="alert bg-otorange">
      <h3 class="color-otobleu"> <img class="aide-icones img-40" src="{{ url('storage/img/aide/instructions.svg')}}" alt="mode d'emploi"> Aide</h3>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="card" style="height:100%">
          <img class="img-100" src="{{ url('storage/img/aide/aide_video.svg')}}" alt="tutoriel">
          <div class="card-body">
            <h5 class="card-title">Tutoriel vidéo</h5>
            <p class="card-text">Une vidéo de quelques minutes vous permettra de comprendre la logique de fonctionnement du logiciel Panse-Bêtes.</p>
            <p class="card-text">Si votre bande passante ne vous permet pas de lire la video en direct, il vous sera possible de télécharger le fichier correspndant</p>
            <p class="card-text">Vous pouvez aussi télécharger un fichier pdf, plus léger, qui reprend les principaux éléments de la vidéo</p>
            <a class="btn btn-otobleu rounded-0" href="{{route('aide.video')}}">
              <i class="fas fa-video"></i> Voir le tutoriel</button>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <img class="img-100" src="{{ url('storage/img/aide/aide_cont.svg')}}" alt="aide contextuelle">
          <div class="card-body">
            <h5 class="card-title">Aide contextuelle</h5>
            <p class="card-text">Une aide contextuelle est une aide qui vous apporte une réponse au sujet de la page que vous êtes en train de consulter.</p>
            <p class="card-text">Pour ouvir cette aide contextuelle, il vous suffira de cliquer sur l'icone <img class="aide-icones-petite" src="{{config('chemins.images')}}aide.svg" alt="aide"> présente sur le côté droit de l'écran.</p>
            <p class="card-text">Pour démarrer, il faut retourner à l'accueil et faire une nouvelle saisie en cliquant sur l'espece correspondant au troupeau concerné</p>
            <a class="btn btn-otobleu rounded-0" href="{{route('accueil')}}">
              <i class="fas fa-undo-alt"></i> Retour à l'accueil</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
