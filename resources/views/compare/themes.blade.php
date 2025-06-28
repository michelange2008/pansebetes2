@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')


  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('fragments.flash')

      </div>

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()

      </div>

      <div class="row my-3 justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          <table data-toggle="table">

            <thead>
              <tr>

                @foreach ($compare->entete as $entete)

                  @if ($loop->first)

                    <th data-width="350">{{ __($entete) }}</th>

                  @else

                    <th class="text-center">
                      {{ $entete->nom }}
                    </br>
                    <span class="d-none d-lg-block">
                        {{ $entete->created_at->day }} {{ $entete->created_at->monthName }} {{ $entete->created_at->year }}
                    </span>
                    <span class="d-block d-lg-none">
                      {{ $entete->created_at->format('j/m/y') }}
                    </span>

                  </th>

                @endif

              @endforeach

            </tr>
          </thead>

          <tbody>

            @foreach ($compare->lignes as $ligne)
              <tr class="my-3">

                @foreach ($ligne as $item)

                  @if ($loop->first)

                      <td class="bg-otobleu">
                        <a href="{{ route('compare.salertes', [$item, $saisies_choisies]) }}">
                          <img class="img-40" src="{{ url('storage/img/saisie/'.$item->icone) }}" alt="">
                          <span class="text-white">{{ ucfirst($item->nom) }}</span>
                          <i class="text-secondary fa-solid fa-square-arrow-up-right" title="Cliquez pour voir le détail"></i>
                      </a>
                      </td>

                    @else

                      @if ($item > 5)

                        <td class="comp-5 text-center align-middle">{{ $item }}</td>

                      @else

                        <td class="comp-{{ $item }} text-center align-middle">
                          {{ $item }}
                        </td>

                      @endif

                    @endif


                  @endforeach


                </tr>

              @endforeach

            </tbody>

          </table>

          <div class="my-3 fst-italic">
            <i class="fa-solid fa-computer-mouse text-secondary"></i>
            Cliquez sur le nom d'un thème pour afficher le détail des alertes pour ce thème
          </div>

          <div>
            @annule([
              'route' => route('compare.index'),
              'nomAnnule' => __('boutons.retour_choix_compare'),
            ])
          </div>

        </div>

      </div>

    </div>

  </div>


@endsection
