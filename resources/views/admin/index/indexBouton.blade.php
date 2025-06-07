<div id="toolbar">

  <a href="{{ route($datas->add->route) }}" type="submit" class="btn btn-otobleu"><i class="fas fa-plus-square"></i> {{ $datas->add->titre}}</a>

  @isset($route_retour) {{-- Ce bouton n'apparaît que lorsque l'on accède à au tableau par un lien autre que le menu
    afin de disposer d'un bouton pour revenir en arrière  --}}

    @bouton([
      'type' => 'route',
      'couleur' => 'btn-secondary',
      'route' => $route_retour,
      'id' => $user_id,
      'intitule' => 'boutons.retour',
      'fa' => 'fa fa-undo',
    ])

  @endisset

</div>
