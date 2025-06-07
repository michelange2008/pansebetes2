<!-- Authentication Links -->
@if (Auth::guest())
  <li class="nav-item">
    <a class="nav-link" href="{{route('login')}}">
      Se connecter
    </a>
  </li>

@else
  <li class="nav-item dropdown">

    <a href="#" class="nav-link dropdown-toggle bg-otobleu"
        id="utilisateur" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="true">
        <img class="img-20" src="{{url('storage/img/roles/base.svg')}}" alt="">

      {{ Auth::user()->name }}

    </a>

    <div class="dropdown-menu" aria-labelledby="utilisateur">

      <a class="dropdown-item" href="{{ route('login') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <img class="img-20" src="{{url('storage/img/logout.svg')}}" alt="">
        Déconnection
      </a>

      <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}">
        <img class="img-20" src="{{url('storage/img/profil.svg')}}" alt="">
        Mon profil
      </a>
    <form id="logout-form" action="{{ route('logout') }}"
            method="POST" style="display: none;">

        {{ csrf_field() }}

      </form>

    </div>

  </li>

@endif
