<li class="nav-item dropdown">

    <a href="#" class="nav-link dropdown-toggle" id="admin" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="true">
        Statistiques
    </a>

    <ul class="dropdown-menu" aria-labelledby="admin">
        <li>
            <a class="dropdown-item" href="{{ route('stats.generales') }}">
                <img class="img-40" src="{{ url('storage/img/pansebetes.svg') }}" alt="">
                Utilisation de Panse-Bête
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('stats.exploitations') }}">
                <img class="img-40" src="{{ url('storage/img/divers/ferme.svg') }}" alt="">
                Synthèse des exploitations
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('stats.pansebetesParEspece', 2)}}">
                <img class="img-40" src="{{ url('storage/img/stats.svg') }}" alt="">
                Synthèses des Panse-Bête
            </a>
        </li>

    </ul>
</li>
