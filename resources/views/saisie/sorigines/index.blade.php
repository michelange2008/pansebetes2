@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_origines')

@extends('menus.menuSaisie')

@section('contenu')
  <div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9 d-flex justify-content-between align-items-center">

        <h4 id="titreCat" class="text-truncate color-otobleu"><strong>Par catégories</strong></h4>

        <h4 id="titrePol" class="text-truncate color-otobleu" style="display:none"><strong>Par pôles</strong></h4>

        <button id="bascule" class="btn btn-otobleu mr-2" title="Basculer entre affichage par catégorie et affichage par pôle">
          <i class="fas fa-map-signs"></i> Catégories/Pôles
        </button>

      </div>

      <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-9">
          <p id="aideBascule" class="text-muted text-center"><small>
            Vous pouvez basculer le type d'affichage (par catégorie ou par pôle) en cliquant sur le bouton au-dessus à droite.
          </small></p>
          <p id="aideDragDrop" class="text-muted text-center small" style="display:none">
            Vous pouvez réorganiser les pôles en les déplaçant de bas en haut avec la souris.
            Vous pouvez aussi les regrouper en les décalant vers la droite.
          </p>
        </div>
      </div>
    </div>


    <div id="parCategorie" class="row justify-content-center">
      <div class="col-sm-11 col-md-10 col-lg-9">
        @foreach ($categories as $categorie)
          <div class="row m-3">
            <div class="col-sm-6 col-md-5 col-lg-4 bg-otojaune d-flex flex-row align-items-center">
              <img class="img-75 p-2" src="{{ url('storage/img/categories/'.$categorie->icone)}}" alt="">
              <h6 class="lead text-center">{{ucfirst($categorie->nom)}}</h6>
            </div>
            <div class="col-sm-6 col-md-7 col-lg-8 bg-otobleu pt-2">
              @foreach ($sorigines as $sorigine)
                @if ($categorie->id == $sorigine->origine->categorie_id)
                  <div class="row p-1 pl-3">
                    <p>{{ucfirst($sorigine->origine->reponse)}}</p>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

    </div>

    <div id="parPole" class="row m-3 justify-content-center" style="display:none">
      <div class="col-sm-11 col-md-10 col-lg-9">
        <div id="nestable2" class="dd">
          <ol class="dd-list">
            @foreach($sorigines as $sorigine)
              <li class="dd-item" data-id="{{$sorigine->id}}">
                <div class="dd-handle d-flex flex-row">
                  <img src="{{ url('storage/img/saisie/'.$sorigine->salerte->alerte->theme->icone)}}" alt="-" class="img-handle">
                  <p class="text-handle">
                    {{ucfirst($sorigine->origine->reponse)}}
                  </p>
                </div>
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!--<canvas id="scroll"></canvas>-->

  @push('js')
    <script src="{{asset(config('chemins.js'))}}/jquery.nestable.js"></script>
    <script src="{{asset(config('chemins.js'))}}/liste_des_origines.js"></script>
  @endpush
@endsection
