@foreach ($menu as $niv_1 => $contenu)

  @if ($menu->$niv_1->niveau == 'niv_1')

    <li class="nav-item">

      @if (!$menu->$niv_1->hasSousmenu)

      <a href="{{ route($menu->$niv_1->route, $menu->$niv_1->id) }}" class="nav-link"
        id="{{ $menu->$niv_1->id }}">

        {{ ucfirst($menu->$niv_1->nom) }}

      </a>

    </li>

    @else
    <li class="nav-item dropdown">

      <a href="#" class="nav-link dropdown-toggle"
        id="{{ $menu->$niv_1->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

        {{ ucfirst($menu->$niv_1->nom) }}

      </a>

      <div class="dropdown-menu" aria-labelledby="{{ $menu->$niv_1->id }}">


          @foreach ($menu as $niv_2 => $contenu)

            @if ($menu->$niv_2->niveau == 'niv_2' && $menu->$niv_2->parent == $menu->$niv_1->id)

              @if (!$menu->$niv_2->hasSousmenu)

                <a class="dropdown-item" href="{{route($menu->$niv_2->route)}}">

                  <img class="img-40" src="{{url('storage/img/'. $menu->$niv_2->icone)}}" alt="">

                  {{ $menu->$niv_2->nom }}

                </a>


              @else

                <a id={{ $menu->$niv_2->id }} class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                  <img class="img-40" src="{{url('storage/img/'. $menu->$niv_2->icone)}}" alt="">

                  {{ ucfirst($menu->$niv_2->nom) }}

                </a>

                <div class="dropdown-menu" aria-labelledby="{{ $menu->$niv_2->id }}">

                  @foreach ($menu as $niv_3 => $contenu)

                    @if ($menu->$niv_3->niveau == 'niv_3' && $menu->$niv_3->parent == $menu->$niv_2->id && $menu->$niv_3->visible)

                      <a class="dropdown-item" href="{{route($menu->$niv_3->route, $menu->$niv_3->id)}}">

                        <img class="img-40" src="{{url('storage/img/'. $menu->$niv_3->icone)}}" alt="">

                        {{ ucfirst($menu->$niv_3->nom) }}

                      </a>

                    @endif

                  @endforeach

                </div>

              @endif

            @endif

          @endforeach

        </div>

        @endif

    </li>

  @endif

@endforeach
