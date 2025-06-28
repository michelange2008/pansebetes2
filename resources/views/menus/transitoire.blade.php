<h5>Données chiffrées</h5>

<div class="m-1">

  @vers([
    'route' => route('schiffre.show', $saisie->id),
    'couleur' => 'otobleu',
    'fa' => 'fas fa-calculator',
    'libelle' => __('boutons.voirChiffres'),
  ])

</div>


<h5>Modifier la saisie</h5>

<div class="m-1">

  @vers([
    'route' => route('schiffre.edit', $saisie->id),
    'couleur' => "otobleu",
    'fa' => 'fas fa-calculator',
    'libelle' => __('boutons.chiffres'),
  ])

  @vers([
    'route' => route('saisie.observations', $saisie->id),
    'couleur' => "otojaune",
    'fa' => 'fas fa-eye',
    'libelle' => __('boutons.observations'),
  ])

</div>
