@section('aide')
<div id="aide">
  <div id="aide-rond" class="aide-bouton"></div>
</div>

<div class="aide-contenu ">
    <div class="close" style="font-size:2rem">
      <i class="fas fa-window-close "></i>
    </div>
    <div class="aide-contenu-texte bg-aide-trans">
      <h3>Saisie des observations</h3>
      <div class="row d-flex">
        <div class="col-md-6">
          <img class="img-100 mr-1 p-2" src="{{asset(config('chemins.aide'))}}/saisie_observations.png" alt="">
        </div>
        <div class="col-md-6">
          <div class="p-3">
            <p>Il faut saisir les observations dans les champs du formulaire</p>
            <p>Certaines informations sont qualitatives: oui/non, ou propre/sale.</p>
            <p>Elles apparaissent comme des menus déroulants</p>
            <p></p>
            <p>D'autres informations sont quantitatives et s'expriment soit en %, soit en nombre d'animaux, etc. </p>
            <p>Si vous ne remplissez pas un champs, il sera considéré comme égal à 0.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
