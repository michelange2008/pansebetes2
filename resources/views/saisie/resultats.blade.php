@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_detail')

@extends('menus.sousmenu', ['titre' => "Analyse des alertes"])

@section('contenu')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="alert bg-otobleu">
          <h5 class=" text-truncate"><img class="img-40 mr-3" src="{{asset(config('chemins.saisie'))}}/analyse.svg" alt=""> Recherche des origines possibles</h5>
        </div>
        <p class="text-muted"><small>Pour afficher la listes des origines possibles, cliquez sur la double-flèche à droite de chaque alerte</small></p>
      </div>
    </div>

  {{ Form::open(['route' => 'sorigines.show.store'])}}

    <div class="row justify-content-center">
      <div class="col-md-10">
        @foreach($resultats as $resultat)

          <div id="alerte_{{$resultat->alerte->id}}" class="alerte-item bg-otorange deplie d-flex flex-row justify-content-between curseur">
            <div>
              <p><strong>{{$resultat->alerte->nom}}</strong> <em>({{$resultat->alerte->theme->nom}})</em></p>
              <p class=" text-light">
                @if($resultat->alerte->type !== 'liste')
                  {{$resultat->valeur}} {{$resultat->alerte->unite}} (limite {{$resultat->alerte->niveau}} {{$resultat->alerte->unite}})
                @else

                @endif
              </p>
            </div>
            <div class="element-centre">
              <img class="img-40" id="img_{{$resultat->alerte->id}}" src="{{asset(config('chemins.saisie'))}}/deplie.svg" alt="déplie" class="otoveil">
            </div>
          </div>
          <div id = "origine_{{$resultat->alerte->id}}" class ="non-affiche" >
            @foreach($resultat->alerte->origines as $origine)
              <div class="container-fluid origine bg-otojaune d-flex flex-row " >
                <div class="col-10">
                  {{ Form::label($resultat->id."_".$origine->id, ucfirst($origine->reponse))}}
                </div>
                <div style="margin:auto">
                  <!-- boucle destinée à recocher les cases qui avaient été cochées à la précédente saisie -->
                  @if (in_array($origine->id, $liste_origines))
                    <!-- case cochée -->
                    {{ Form::checkbox($resultat->id."_".$origine->id, '', true)}}
                  @else
                    <!-- case non cochée -->
                    {{ Form::checkbox($resultat->id."_".$origine->id)}}
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
    <div class="row">
      <div class="col-md-11 d-flex justify-content-end">
        <button type="submit" class="btn btn-otorange rounded-0">
          <i class="fas fa-share-square"></i> Envoyer
        </button>
        <a href="{{URL::previous()}}" class="btn btn-otobleu rounded-0 ml-2"><i class="fas fa-undo-alt"></i> Retour aux observations</a>
      </div>
      <div class="col-md-1">

      </div>
      </div>
    {{Form::close()}}

    </div>

@endsection
