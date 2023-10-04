@section('menuprincipal')
  <div id="app">
    <nav class="navbar navbar-nav navbar-expand-lg navbar-light bg-light navbar-static-top">
      <div class="flex-nowrap container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuAver" aria-controls="menuAver" aria-expanded="false" aria-label="Toggle-navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="decalage collapse navbar-collapse menu-on-right" id="menuAver">
          <ul class="nav navbar-nav navbar-left">

            @include('menus.menuConnexion')

          <li class="nav-item" title="Pour démarrer"><a class="nav-link" href="{{route('accueil')}}">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('aide')}}">Aide</a></li>
          @if (!Auth::user()->isAdmin)
            <li class="nav-item"><a class="nav-link" href="{{route('notes.create')}}">Votre avis</a></li>
          @endif
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="infos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              A propos
            </a>
            <div class="dropdown-menu" aria-labelledby="infos">
              <a class="dropdown-item" href="{{route('instructions')}}">Panse-Bêtes&nbsp?</a>
              <a class="dropdown-item" href="{{route('description')}}">Otoveil&nbsp?</a>
              <a class="dropdown-item" href="{{route('credits')}}">Qui a fait quoi&nbsp?</a>
              <a class="dropdown-item" href="{{route('contact')}}">Nous contacter</a>
              <a class="dropdown-item" href="{{route('mentions_legales')}}">Mentions légales</a>
            </div>
          </li>
          {{-- Menu des statistiques dont les conditions d'affichage sont choisies par l'admin 
          Dans tous les cas les stats sont affichées si l'utilisateur est admin (cad role = admin ou webmaster
          Sinon, il faut que les statsDisplay ne soient pas à la valeur admin (cf. middleware Menu) --}}
          @if ( Auth::user()->isAdmin || Session('statsDisplay') != 'admin')

            @include('menus.menuGestion', ['menu' => session('menuStats')])
              
          @endif

          @if (Auth::user()->isAdmin)

            @include('menus.menuGestion', ['menu' => session('menuGestion')])

          @endif  

        </ul>
      </div>
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Panse-bêtes') }}
      </a>
      <img src="{{url('storage/img/acsa_itab_otoveil.jpeg')}}" alt="otoveil" class="otoveil"/>
    </div>
  </nav>
</div>


@endsection()
