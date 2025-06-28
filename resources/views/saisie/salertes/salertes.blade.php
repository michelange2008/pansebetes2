{{-- issu de saisie.accueilSaisiePleine.blade.php --}}
<h3>@lang('titres.synth_globale')</h3>

@foreach ($themes as $theme)
  {{-- S'il dans un thème il n'y a pas d'alerte on affiche le nom en couleur bleue --}}
  @if ($theme->nb_salertes == 0)

    @include('saisie.themes.themesSansAlertes')
  {{-- sinon on affiche le nom en orange et avec possibilité de déplier pour voir les salertes --}}
  @else
    {{-- Bandeau orange avec le nom du thème et le nombre de salertes --}}
    @include('saisie.themes.themesAvecAlertesSynthese')

  @endif

@endforeach
