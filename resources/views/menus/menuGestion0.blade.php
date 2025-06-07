<li class="nav-item dropdown">
  @foreach (session('menuGestion') as $menu)
      @if ($menu['niveau'] == 'parent')
        <a href="{{ $menu['route'] }}" class="nav-link dropdown-toggle" id="{{ $menu['id'] }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          {{ $menu['nom'] }}
        </a>

        @if ($menu['hasSousmenu'])

          <div class="dropdown-menu" aria-labelledby="coeur">

          @foreach (session('menuGestion') as $sousmenu)

            @if ($sousmenu['niveau'] == 'sousmenu_1' && $sousmenu['parent'] == $menu['id'])

              <a class="dropdown-item" href="{{route($sousmenu['route'])}}">
                <img class="img-40" src="{{url('storage/img/'. $sousmenu['icone'])}}" alt="">
                {{ $sousmenu['nom'] }}
              </a>

            @endif

          @endforeach
        </div>
        @endif

      @endif
  @endforeach
  <div class="dropdown-menu" aria-labelledby="coeur">
    <a class="dropdown-item" href="{{route('chiffre.index')}}">
      <img class="img-40" src="{{url('storage/img/saisie/chiffres.svg')}}" alt="">
      Chiffres
    </a>

    <a class="dropdown-item dropdown-toggle" id="alertes" data-toggle="dropdown" aria-haspopup="true  " aria-expanded="true" href="{{route('alerte.index')}}">
      <img class="img-40" src="{{url('storage/img/saisie/alertes.svg')}}" alt="">
      Alertes
    </a>
    <div class="dropdown-menu" aria-labelledby="alertes">
      <a class="dropdown-item" href="{{route('alerte.indexParEspece', "Vaches laitières")}}">
        <img class="img-40" src="{{url('storage/img/especes/VL.svg')}}" alt="">
        Vaches laitières</a>
      <a class="dropdown-item" href="{{route('alerte.indexParEspece', "Vaches allaitantes")}}">
        <img class="img-40" src="{{url('storage/img/especes/VA.svg')}}" alt="">
        Vaches allaitantes</a>
      <a class="dropdown-item" href="{{route('alerte.indexParEspece', "Brebis allaitantes")}}">
        <img class="img-40" src="{{url('storage/img/especes/OA.svg')}}" alt="">
        Brebis allaitantes</a>
      <a class="dropdown-item" href="{{route('alerte.indexParEspece', "Chèvres laitières")}}">
        <img class="img-40" src="{{url('storage/img/especes/CP.svg')}}" alt="">
        Chèvres laitières</a>
      <a class="dropdown-item" href="{{route('alerte.indexParEspece', "Brebis laitières")}}">
        <img class="img-40" src="{{url('storage/img/especes/OL.svg')}}" alt="">
        Brebis laitières</a>
    </div>

    <a class="dropdown-item" href="{{route('paraferme.index')}}">
      <img class="img-40" src="{{url('storage/img/categories/logement.svg')}}" alt="">
      Exploitations
    </a>

  </div>
</li>
