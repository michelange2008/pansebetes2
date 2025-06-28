{{-- issu de SorigineCOntroller@show
Page affichée par le menu modifier les origines qui affiche d'abord la liste des
alertes par thème et propose un bouton pour choisir les origines
 --}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_alertes')

@extends('menus.menuSaisie')

@section('contenu')

  <div class="row justify-content-center">

    <div class="ccol-sm-11 col-md-10 col-lg-9">

      <h3>@lang('titres.origines_edit')</h3>

        @foreach ($themes as $theme)

          <div class="mt-3 p-3 d-flex flex-row align-items-center

            bg-otobleu  @if ($theme->nb_salertes > 0) bg-otorange @endif"

          >

            <img class="img-40" src="{{url('storage/img/saisie/'.$theme->icone)}}" alt="">

            <h5>{{ ucfirst($theme->nom) }}</h5>

          </div>

          @foreach ($salertes as $salerte)

            @if ($salerte->alerte->theme_id == $theme->id)

              <div class=" p-3 mb-1 bg-otojaune d-flex justify-content-between">

                <div class="">

                  <p class="lead">{{ $salerte->alerte->nom }}</p>

                  <p>{{ $salerte->valeur }} {{ $salerte->alerte->unite }} ( {{ $salerte->norme }} )</p>

                  @if ( $salerte->nbsorigine > 0 )

                    <h6><strong>{{ $salerte->nbsorigine }}</strong> @lang('saisie.causes')</h6>

                  @endif

                </div>

                <div class="">
                  {{-- Choix d'un formulaire et non pas d'un simple bouton pour passer les données hidden
                  à la méthode sorigineEdit. --}}
                  <form class="" action="{{ route('sorigines.edit') }}" method="post">
                    @csrf
                    <input type="hidden" name="saisie_id" value="{{ $saisie->id }}">
                    <input type="hidden" name="alerte_id" value="{{ $salerte->alerte_id }}">
                    <input type="hidden" name="salerte_id" value="{{ $salerte->id }}">

                    @include('fragments.boutonEnregistrer', [
                      'nomBouton' => 'Choisir les origines',
                      'fa' => 'fas fa-marker',
                    ])
                  </form>


                </div>

              </div>

            @endif

          @endforeach

        @endforeach


      </div>

    </div>
    <div class="row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @enregistreAnnule([

        ])

      </div>

    </form>

    </div>

  </div>

@endsection
