@section('aide')
<div id="aide">
  <div id="aide-rond" class="aide-bouton"></div>
</div>

<div class="aide-contenu ">

  <div id="texte-d-1" class="desktop-only aide-contenu-container">
    <div class="close" style="font-size:2rem" title="fermer">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans">
      <h3>Nouvelle grille</h3>
      <p>Si vous voulez travailler sur une nouvelle grille, cliquez sur l'icone ci-dessus <i class="fas fa-arrow-up"></i> correspondant au type de troupeau</p>
      <div class="d-flex flex-row justify-content-around ">
        @foreach($especes as $espece)
        <img class="aide-icones shadow" src="{{ 'img/especes/'.$espece->icone }}" alt="">
        @endforeach
      </div>
      <div class="aide-special-info-menu">
        <p></p>
        <p>En cliquant sur l'icone <i class="fas fa-bars"></i> en haut à gauche de l'écran, vous aurez accès au menu général.</p>
        <p></p>
      </div>
      <p></p>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-d-2" class="btn btn-otorange aide-contenu-texte-plus font-italic curseur">suite <i class="fa fa-angle-double-right"></i></button>
      </div>
    </div>
  </div>

  <div id="texte-d-2" class="desktop-only aide-contenu-container">
    <div class="close" style="font-size:2rem" title="fermer">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte desktop-only bg-aide-trans text-light">
      <p class="lead">Vous pouvez aussi travailler sur des grilles que vous aviez saisies précédemment&nbsp:</p>
      <div class="row">
        <div class="col-md-8 mb-1">
          <img class="img-100" src="{{ url('storage/img/aide/aide_modif_saisie.png') }}" alt="">
        </div>
        <div class="col-md-4">
          <p class="mr-3">les <span class="bg-otorange aide-petit-bouton"> <i class='far fa-trash-alt'></i> supprimer </span> </p>
          <p class="mr-3">les <span class='bg-otobleu aide-petit-bouton'> <i class="far fa-eye"></i> Voir </span> </p>
          <p class="mr-3">les <span class="bg-otojaune aide-petit-bouton"> <i class="fa fa-pencil-alt"></i> Modifier </span> </p>
          <p>ou rouvrir le pdf <span style="font-size: 2rem; color:red"><i class="far fa-file-pdf"></i></span></p>
        </div>
      </div>
      <p></p>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-d-1" class="btn btn-otorange aide-contenu-texte-plus font-italic"><i class="fa fa-angle-double-left"></i> précédent</button>
      </div>
    </div>
  </div>
</div>

<div class="aide-contenu ">
  <div id="texte-s-1" class="smartphone-only aide-contenu-container">
    <p class="aide-contenu-chiffre bg-aide-trans">1</p>
    <div class="close" style="font-size:2rem" title="fermer">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte smartphone-only bg-aide-trans">
      <h3>Nouvelle grille</h3>
      <p>Si vous voulez travailler sur une nouvelle grille, cliquez sur le bouton</p>
      <div class="d-flex justify-content-center"><img src="{{'img/plus_rond_bord_blanc.svg' }}" alt=""></div>
      <p>en bas à droite.</p>
      <p>Puis, choisissez l'icone correspondant au type de troupeau.</p>
      <div class="d-flex flex-row justify-content-around">
        @foreach($especes as $espece)
        <img class="aide-icones" src="{{'storage/img/especes/'.$espece->icone}}" alt="">
        @endforeach
      </div>
      <div class="aide-special-info-menu">
        <p></p>
        <p>En cliquant sur l'icone <i class="fas fa-bars"></i> en haut à gauche de l'écran, vous aurez accès au menu général.</p>
        <p></p>
      </div>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-s-2" class="btn btn-otorange aide-contenu-texte-plus font-italic curseur">suite <i class="fa fa-angle-double-right"></i></button>
      </div>
    </div>
  </div>

  <div id="texte-s-2" class="smartphone-only aide-contenu-container">
    <p class="aide-contenu-chiffre bg-aide-trans">2</p>
    <div class="close" style="font-size:2rem" title="fermer">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="aide-contenu-texte smartphone-only bg-aide-trans text-light">
      <p>Vous pouvez aussi travailler sur des grilles existantes:</p>
      <p>les <span class="bg-otorange aide-petit-bouton"> <i class='far fa-trash-alt'></i> supprimer </span> </p>
      <p>les <span class='bg-otobleu aide-petit-bouton'> <i class="far fa-eye"></i> Voir </span> </p>
      <p>les <span class="bg-otojaune aide-petit-bouton"> <i class="fa fa-pencil-alt"></i> Modifier </span> </p>
      <p>ou rouvrir le pdf <span style="font-size: 2rem; color:red"><i class="far fa-file-pdf"></i></span></p>
      <p></p>
      <div class="d-flex justify-content-end">
        <button id="affiche-texte-s-1" class="btn btn-otorange aide-contenu-texte-plus font-italic"><i class="fa fa-angle-double-left"></i> précédent</button>
      </div>
    </div>
  </div>
</div>


@endsection
