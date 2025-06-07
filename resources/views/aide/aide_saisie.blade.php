@section('aide')
<div id="aide">
  <div id="aide-rond" class="aide-bouton"></div>
</div>

<div class="aide-contenu aide-contenu-saisie">
  <div id="texte-d-1" class=" aide-contenu-container">
    <div class="close" style="font-size:2rem">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans">
      <h3>Choisir un pôle d'observation</h3>
      <p>Il y a <strong>6 à 7 pôles d'observation</strong> (selon les espèces). Vous pouvez tous les passer en revue les uns après les autres ou simplement ceux qui vous intéressent.</p>
      <p>Pour cela, il suffit de <span class="aide-petit-bouton bg-otobleu"> cliquer sur le titre du pôle </span>&nbspque l'on veut explorer.</p>
      <p>Il est intéressant dans tous les cas de commencer par le premier pôle: </p>
      <div class="d-flex justify-content-center">
        <p class="bg-otobleu pr-3 text-center" style="width:max-content;">
          <img class="aide-icones" src="{{asset(config('chemins.saisie'))}}/global.svg" alt="global"> Regard global sur le troupeau
        </p>
      </div>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-d-2" class="btn btn-otorange aide-contenu-texte-plus font-italic curseur">suite <i class="fa fa-angle-double-right"></i></button>
      </div>
    </div>
  </div>

  <div id="texte-d-2" class="aide-contenu-container">
    <div class="close" style="font-size:2rem">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans text-light">
      <p>Une fois le premier pôle terminé, vous reviendrez à cette page. Vous pourrez alors choisir un autre pôle</p>
      <p>Quand vous aurez passé en revue tous les pôles qui vous intéressent,</p>
      <p>cliquez sur</p>
      <div class="d-flex justify-content-center">
        <p><span class="bg-otobleuclair aide-petit-bouton p-3"> J'ai fini et je veux voir la synthèse</span></p>
      </div>
      <p></p>
      <p class="text-right">pour avoir un aperçu global de vos observations</p>
      <p></p>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-d-1" class="btn btn-otorange aide-contenu-texte-plus font-italic"><i class="fa fa-angle-double-left"></i> précédent</button>
      </div>
    </div>
  </div>
</div>

@endsection
