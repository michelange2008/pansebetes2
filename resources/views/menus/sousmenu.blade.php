@section('sousmenu')

  <div class="container-fluid">

    <div class="alert alert-success d-flex justify-content-between">

      <div class="d-flex flex-row">

        <img class="img-40" src="{{ url('storage/img/especes/'.$saisie->espece->icone)}}" alt="">

        <h3 class="pl-3 text-truncate">
          {{$titre}} ({{$saisie->elevage->nom}} -
          <small>
            {{$saisie->created_at->month}} {{$saisie->created_at->locale('fr')->monthName}} {{$saisie->created_at->year}}
          </small>
          )
        </h3>
      </div>
      <div>
        @isset($bouton1)
          @vers([
            'route' => $route1 ?? '',
            'libelle' => $libelle1 ?? '',
            'fa' => $fa1 ?? '',
            'couleur' => $couleur1 ?? '',
            ])
        @endisset
        @isset($bouton2)
          @vers([
            'route' => $route2 ?? '',
            'libelle' => $libelle2 ?? '',
            'fa' => $fa2 ?? '',
            'couleur' => $couleur2 ?? '',
            ])
        @endisset
      </div>
    </div>


  </div>
@endsection
