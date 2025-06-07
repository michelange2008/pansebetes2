
@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_alertes')

@extends('menus.menuSaisie')

@section('contenu')


  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

          <table class="table table-hover">

            <thead>
              <tr>
                <th><h3>@lang('titres.d_chiffrees')</h3></th>
                <th>Seuils d'alerte</th>
                <th class="text-center">Vos parametres</th>
              </tr>
            </thead>

            @foreach ($themes as $theme)

            <tbody>
              <tr>
                <td colspan="3" class="bg-otobleu">
                  <h5>{{ ucfirst($theme->nom) }}</h5>
                </td>

              </tr>

              @foreach ($salertesNum as $salerte)

                @if ($salerte->alerte->theme->id == $theme->id)


                <tr>

                  <td>

                    @if ($salerte->danger)
                        <strong><i class="fa-solid fa-circle-exclamation"></i>
                    @endif
                    {{ $salerte->alerte->nom }}

                  </td class="text-center">

                  <td>

                    {{ $salerte->norme }}

                  </td>

                    {{-- on affiche d'une couleur différente selon si les indicateurs dépassent les alertes --}}
                    @if ($salerte->danger)

                      <td class="bg-otorange text-center">

                      @else

                        <td class="text-center">

                        @endif

                    {{ $salerte->valeur }} {{ $salerte->alerte->unite }}

                  </td>

                    @endif

                </tr>

              @endforeach

            </tbody>

          @endforeach

        </table>

        @synthese()

      </div>

    </div>

  </div>

@endsection
