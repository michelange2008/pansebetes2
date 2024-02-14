@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="mt-3 row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('fragments.flash')

      </div>

    <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()
      </div>

    </div>

    <div class="mt-3 row justify-content-center">


        <div class="col-sm-11 col-md-10 col-lg-9">

          <ul class="list-group">

            <li class="list-group-item bg-otorange">

              <div class="d-flex align-items-center">

                <img class="img-50" src="{{ url('storage/img/especes/'.$alerte->espece->icone) }}" alt="">

                <div class="mx-3">

                  <h4>{{ $alerte->nom }}</h4>

                </div>

              </div>

            </li>

            <li class="list-group-item">

              <div class="d-flex align-items-center">

                <img class="img-50" src="{{ url('storage/img/saisie/'.$alerte->theme->icone) }}" alt="">

                <div class="mx-3">

                  <p>@lang('tableaux.theme')</p>

                  <h5 class="fw-bold">{{ ucfirst($alerte->theme->nom) }}</h5>

                </div>

              </div>


            </li>

            <li class="list-group-item">

              <p>@lang('tableaux.type')</p>

              <p>
                <span class=fw-bold>{{ ucfirst($alerte->type->nom) }}</span>
                ({{ $alerte->type->detail }})
              </p>

              @isset($alerte->numalerte)

                @if ($alerte->numalerte->round == 1)

                  <p>@lang('tableaux.round') {{ $alerte->numalerte->round }} @lang('tableaux.round_un_chiffre').</p>

                @elseif ($alerte->numalerte->round > 1)

                  <p>@lang('tableaux.round') {{ $alerte->numalerte->round }} @lang('tableaux.round_plusieurs_chiffres').</p>

                @endif

              @endisset

            </li>

            <li class="list-group-item">

            @if ($alerte->type->nom == "liste")

              <p>@lang('tableaux.list_items')</p>

              <p class="fw-bold">

                @foreach ($alerte->critalertes as $critere)
                  <span @if ($critere->isAlerte)
                    class="text-danger" @else class="text-success"
                  @endif >
                    {{ ucfirst($critere->nom) }}
                  </span>
                  @if (!$loop->last) / @endif

                @endforeach

              </p>

            @else

              <p>@lang('alertes.recommandations')</p>

              @if ($alerte->numalerte != null && ($alerte->numalerte->borne_inf != null && $alerte->numalerte->borne_inf != 0))

                <p class="fw-bold">@lang('alertes.min')

                   {{ $alerte->numalerte->borne_inf }} {{ $alerte->unite }}</p>

              @endif

              @if ($alerte->numalerte != null && $alerte->numalerte->borne_sup != null)

                <p class="fw-bold">@lang('alertes.max') {{ $alerte->numalerte->borne_sup }} {{ $alerte->unite }}</p>

              @endif

            @endif

            </li>

            @if ($alerte->type->nom == "ratio")

              <li class="list-group-item">

                <p>@lang('alertes.mode_calcul')</p>

                @if(isset($alerte->numalerte->denom->nom) && isset($alerte->numalerte->num->nom))

                  <p class="fw-bold">{{ $alerte->numalerte->num->nom }} / {{ $alerte->numalerte->denom->nom }}</p>

                @else

                  <p class="fw-bold text-danger">
                    @lang('alertes.warning')
                    @lang('alertes.revoir_parametres')
                  </p>

                @endif

              </li>

            @elseif ($alerte->type->nom == "pourcentage")

              <li class="list-group-item">

                <p>@lang('alertes.mode_calcul')</p>
                {{-- Cas où le numérateur et le dénominateur sont présents --}}
                @if(isset($alerte->numalerte->denom->nom) && isset($alerte->numalerte->num->nom))

                  <p class="fw-bold">({{ $alerte->numalerte->num->nom }} / {{ $alerte->numalerte->denom->nom }}) x 100</p>
                {{-- Cas où il manque un élément de calcul du pourcentage --}}
                @else

                  <p class="fw-bold text-danger">
                    @lang('alertes.warning')
                    @lang('alertes.revoir_parametres')
                  </p>

                @endif

              </li>

            @endif

            <li class="list-group-item">

              @if ($alerte->actif)

                  <h4><span class="badge bg-success">@lang('alertes.activee')</span></h4>

              @else

                  <h4><span class="badge bg-danger">@lang('alertes.desactivee')</span></h4>

              @endif

            </li>

          </ul>

        </div>

    </div>

    <div class="mt-3 row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9 d-flex justify-content-end">

        @edit(['route' => route('alerte.edit', $alerte->id)])

        @annule([
          'route' => route('alerte.indexParEspece', $alerte->espece->id),
          'nomAnnule' => __('boutons.retour'),
        ])

      </div>

    </div>

  </div>

@endsection
