<li class="nav-item dropdown">

    <a href="#" class="nav-link dropdown-toggle" id="admin" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="true">
        Administration
    </a>

    <ul class="dropdown-menu" aria-labelledby="admin">
        <li>
            <a class="dropdown-item" href="{{ route('admin.utilisateurs') }}">
                <img class="img-40" src="{{ url('storage/img/infos_perso.svg') }}" alt="">
                Utilisateurs
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('admin.statsDisplayEdit') }}">
                <img class="img-40" src="{{ url('storage/img/admin/statsDisplay.svg') }}" alt="">
                Affichage des stats
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('paraferme.index') }}">
                <img class="img-40" src="{{ url('storage/img/categories/logement.svg') }}" alt="">
                Paramètres des exploitations
            </a>

        </li>
        <li>
            <a href="{{ route('chiffre.indexParEspece', 2) }}" class="dropdown-item" id="chiffres">

                <img class="img-40" src="{{ url('storage/img/saisie/chiffres.svg') }}" alt="">

                Chiffres

            </a>
        </li>
        <li>
          <a href="{{ route('alerte.indexParEspece', 2) }}" class="dropdown-item" id="alertes">

              <img class="img-40" src="{{ url('storage/img/saisie/alertes.svg') }}" alt="">

              Alertes

          </a>
      </li>

        {{-- <button href="#" class="nav-link dropdown-toggle dropdown-toggle-split" id="alertes"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

            <img class="img-40" src="{{ url('storage/img/saisie/alertes.svg') }}" alt="">

            Alertes

        </button>

        <ul class="dropdown-menu" aria-labelledby="alertes">

            <a class="dropdown-item" href="{{ route('alerte.indexParEspece', 2) }}">
                <img class="img-40" src="{{ url('storage/img/especes/VL.svg') }}" alt="">
                Vaches laitières
            </a>

            <a class="dropdown-item" href="{{ route('alerte.indexParEspece', 1) }}">
                <img class="img-40" src="{{ url('storage/img/especes/VA.svg') }}" alt="">
                Vaches allaitantes
            </a>
            <a class="dropdown-item" href="{{ route('alerte.indexParEspece', 3) }}">
                <img class="img-40" src="{{ url('storage/img/especes/CP.svg') }}" alt="">
                Chèvres
            </a>
            <a class="dropdown-item" href="{{ route('alerte.indexParEspece', 4) }}">
                <img class="img-40" src="{{ url('storage/img/especes/OA.svg') }}" alt="">
                Brebis allaitantes
            </a>

            <a class="dropdown-item" href="{{ route('alerte.indexParEspece', 5) }}">
                <img class="img-40" src="{{ url('storage/img/especes/OL.svg') }}" alt="">
                Brebis laitières
            </a>

        </ul>
 --}}

        {{-- <button href="#" class="nav-link dropdown-toggle dropdown-toggle-split" id="chiffres"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

            <img class="img-40" src="{{ url('storage/img/saisie/chiffres.svg') }}" alt="">

            Chiffres

        </button>

        <ul class="dropdown-menu" aria-labelledby="chiffres">
            <li>

                <a class="dropdown-item" href="{{ route('chiffre.indexParEspece', 2) }}">
                    <img class="img-40" src="{{ url('storage/img/especes/VL.svg') }}" alt="">
                    Vaches laitières
                </a>
            </li>

            <a class="dropdown-item" href="{{ route('chiffre.indexParEspece', 1) }}">
                      <img class="img-40" src="{{ url('storage/img/especes/VA.svg') }}" alt="">
                      Vaches allaitantes
                    </a>
                  <a class="dropdown-item" href="{{ route('chiffre.indexParEspece', 3) }}">
                      <img class="img-40" src="{{ url('storage/img/especes/CP.svg') }}" alt="">
                      Chèvres
                    </a>
                    <a class="dropdown-item" href="{{ route('chiffre.indexParEspece', 4) }}">
                      <img class="img-40" src="{{ url('storage/img/especes/OA.svg') }}" alt="">
                      Brebis allaitantes
                    </a>
                    <a class="dropdown-item" href="{{ route('chiffre.indexParEspece', 5) }}">
                      <img class="img-40" src="{{ url('storage/img/especes/OL.svg') }}" alt="">
                      Brebis laitières
                    </a>
        </ul>
 --}}
    </ul>
</li>
