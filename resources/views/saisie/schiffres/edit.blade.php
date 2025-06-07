@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('aide.aide_alertes')

@extends('menus.menuSaisie')

@section('contenu')


  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('fragments.flashCollect')

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <h3>@lang('titres.chiffres_edit')</h3>

        <p class="lead">@lang('commun.info_saisie_chiffres')</p>

        <p class="lead">
          @lang('commun.info_picto_saisie_chiffres')
          <span class="badge rounded-pill text-bg-info">?</span>
        </p>

        <form class="" action="{{route('schiffre.store')}}" method="post">

          @csrf

          @enregistreAnnule([
          'couleur' => 'btn-otorange',
          'route' => route('saisie.show', $saisie->id),
          ])

          @foreach ($chiffresGroupes as $groupe => $chiffres)
            <div class="bg-otobleu px-3 py-1">
              <h4 class="p-0">
                {{ ucfirst($groupe) }}
              </h4>
            </div>

            <input type="hidden" name="saisie_id" value="{{ $saisie->id }}">

            @foreach ($chiffres as $chiffre)

                <div class="form-group row my-2">

                  <label class="col-sm-8 col-form-label"
                  for="C{{ $chiffre->id }}">
                  {{-- Si le chiffre doit forcément avoir une valeur non null,
                  on le met en rouge --}}
                  @if ($chiffre->nonullable)
                    <span class="text-danger fw-bold">
                  @else
                    <span>
                  @endif

                  {{$chiffre->id.' - '.ucfirst($chiffre->nom) }}</span>
                  {{-- Si il existe une explication (detail) pour ce chiffre, on l'affiche --}}
                  @if ($chiffre->detail != null)

                    <span class="badge rounded-pill text-bg-info" title="{{ $chiffre->detail }}">?</span>
                  @endif
                </label>
                <div class="col-sm-4">

                  <input class="form-control chiffre text-center "
                  type="number"
                  min= "{{ $chiffre->min ?? 0}}"
                  step="{{ $chiffre->step }}"
                  name="C{{ $chiffre->id }}"

                  @isset($chiffre->nonullable)
                    @if ($chiffre->nonullable)
                      required
                    @endif
                  @endisset

                  @if ($chiffresSaisis->where('chiffre_id', $chiffre->id)->first() != null)
                    value="{{ $chiffresSaisis->where('chiffre_id', $chiffre->id)->first()->valeur  ?? old($chiffre->id) }}"
                  @else
                    @isset($chiffre->nonullable)
                      @if (!$chiffre->nonullable)
                        value="{{ $chiffre->defaut }}"
                      @endif
                    @endisset

                  @endif
                  >
                </div>

              </div>

            @endforeach

          @endforeach

          @enregistreAnnule([
          'couleur' => 'btn-otorange',
          'route' => route('saisie.show', $saisie->id),
          ])

        </form>

      </div>

    </div>

  </div>



@endsection
