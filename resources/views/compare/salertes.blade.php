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

          <table class="table table-hover table-bordered">

            <thead class="thead-light fw-bold">
              <tr>
                <td>@lang('saisie.nom_alerte')</td>

                @foreach ($saisies as $saisie)

                  @if ($loop->first)

                    <td class="text-center">Seuils d'alertes</td>

                  @else

                    <td class="text-center">{{ $saisie->created_at->format('d/m/y') }}</td>

                  @endif

                @endforeach
              </tr>
            </thead>

            <tbody>

              @foreach ($salertes as $nom => $saisies)

              <tr>
                <td>{{ $nom }}</td>

                @foreach ($saisies as $saisie)

                  @if ($saisie->danger == 1)

                    <td class="bg-otorange text-center m-3 fw-bold">
                      @if ($saisie->unite == null)

                      @else

                        {{ $saisie->valeur }} {{ $saisie->unite }}
                      @endif
                    </td>

                  @elseif ($saisie->danger == 0)

                    <td class="bg-success text-center">

                      @if ($saisie->unite == null)

                      @else

                        {{ $saisie->valeur }} {{ $saisie->unite }}
                      @endif

                    </td>

                  @else

                    <td class="bg-light">

                      {{ $saisie->valeur }}

                    </td>

                  @endif

                @endforeach
              </tr>

            @endforeach

            </tbody>


          </table>

        </div>

      </div>

      <div class="row my-3 justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">
          {{-- COmme la page d'affichage de la synthèse de la comparaison
          est le résultat d'une route POST avec le choix des saisies comparées
          le bouton de retour à cette page doit aussi être le résultat d'un
          formulaire. D'où le code ci-dessous qui mime un formulaire caché et
          transforme le bouton submit en bouton page précédénte --}}
          <form action="{{ route('compare.themes') }}" method="post">
            @csrf
            @foreach ($saisies as $saisie)

              <input class="d-none" class="form-check-input" type="checkbox"
                name="{{ $saisie->id }}" value="{{ $saisie->id }}" checked="checked">

            @endforeach

            @enregistre([
              'couleur' => 'btn-secondary',
              'fa' => 'fas fa-undo',
              'nomBouton' => __('boutons.back2synthese'),
            ])
          </form>

        </div>

      </div>

    </div>

  </div>


@endsection
