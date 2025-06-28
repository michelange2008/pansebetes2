@section('aide')
<div id="aide">
  <div id="aide-rond" class="aide-bouton"></div>
</div>

<div id="aide-contenu-detail" class="aide-contenu">

  <div id="texte-d-1" class="aide-contenu-container">
    <div class="close" style="font-size:2rem">
      <i class="fas fa-window-close "></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans">
      <h3>Synthèse des observations</h3>
      <p>Les pôles pour lequels aucune alerte n'a été signalée sont marqués comme ci dessous</p>
      <div class="alert detail detail-otobleu">
        <h5>Pôle sans alerte</h5>
        <div class="icones">
          <img src="{{URL::asset(config('chemins.saisie'))}}/ok.svg" class="otoveil" alt="ok">
        </div>
      </div>
      <p>Les pôles pour lesquels vous avez signalé des alertes sont marqués en orange</p>
      <div class="alert detail detail-otorange">
        <h5>Pôle avec alerte</h5>
        <div class="icones">
          <img class="otoveil" src="{{URL::asset(config('chemins.saisie'))}}/deplie.svg" alt="deplie">
        </div>
      </div>
      <p>En cliquant <i class="fas fa-mouse-pointer"></i> sur l'icone
        <img class="otoveil" src="{{URL::asset(config('chemins.saisie'))}}/deplie.svg" alt="deplie">
        vous dépliez la liste des alertes qui ont été notée pour ce pôle
      </p>
      <div class="panneau-alerte alert alert-dark bg-otojaune rounded-0">
        <div class="element-alerte justify-content-between">
          <div class="d-flex align-items-center">
            <span class="font-weight-bold">votre alerte&nbsp</span>
            <span>(la valeur seuil)</span>
          </div>
          <img class="otoveil" src="{{URL::asset(config('chemins.saisie'))}}/oeil.svg" alt="voir">
        </div>
      </div>
      <p>Et si vous cliquez sur l'icone <img class="otoveil" src="{{URL::asset(config('chemins.saisie'))}}/oeil.svg" alt="voir">
        vous retrouverez les questions que vous avez cochées.
      </p>
      <p></p>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-d-2" class="btn btn-otorange aide-contenu-texte-plus font-italic curseur">suite <i class="fa fa-angle-double-right"></i></button>
      </div>
    </div>
  </div>

  <div id="texte-d-2" class="desktop-only aide-contenu-container">
    <div class="close" style="font-size:2rem">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans text-light">
      <p>Vous pouvez aussi avoir une vision globale de vos observations en cliquant sur </p>
      <div class="d-flex justify-content-center">
        <p class="aide-petit-bouton bg-otojaune"><i class="fas fa-align-right"></i> Liste de origines</p>
      </div>
      <p>cela vous mènera à une page où toutes les causes possibles de problème que vous avez cochées seront listées quel que soit le pôle</p>
      <p></p>
      <p>Vous pouvez aussi revenir à l'accueil en cliquant sur </p>
      <div class="d-flex justify-content-center">
        <p class="aide-petit-bouton bg-otobleu"><i class="fas fa-undo-alt"></i> Retour</p>
      </div>
    <p></p>
    <div class="d-flex justify-content-end">
      <button id="affiche-texte-d-1" class="btn btn-otorange aide-contenu-texte-plus font-italic"><i class="fa fa-angle-double-left"></i> précédent</button>
    </div>
  </div>
  </div>

</div>

@endsection
