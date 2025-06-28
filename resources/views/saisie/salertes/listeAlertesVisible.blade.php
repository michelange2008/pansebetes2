{{-- issu de salertes.blade.php
Affiche la liste des alertes pour chaque thème quand il y en a --}}

<div  id="origine_{{ $theme->id }}" >

  @foreach($salertes as $salerte)

    @if($salerte->alerte->theme->id === $theme->id && $salerte->danger)

      {{-- <div class="panneau-alerte alert alert-dark bg-otojaune rounded-0 d-flex justify-content-between flex-row"> --}}
      {{-- Choix d'un formulaire et non pas d'un simple bouton pour passer les données hidden
      à la méthode sorigineEdit. --}}
      <form class="panneau-alerte alert alert-dark bg-otojaune rounded-0 d-flex
                  justify-content-between flex-row"
            action="{{ route('sorigines.edit') }}" method="post">

        @csrf
        <input type="hidden" name="saisie_id" value="{{ $saisie->id }}">
        <input type="hidden" name="alerte_id" value="{{ $salerte->alerte_id }}">
        <input type="hidden" name="salerte_id" value="{{ $salerte->id }}">

        <div class="intitule-alerte">

          <p class="">{{$salerte->alerte->nom}}</p>

          <strong>{{ $salerte->valeur }} {{ $salerte->alerte->unite }}</strong>&nbsp( {{ $salerte->norme }} )

        </div>

        {{-- Bouton invisible (on voit que le texte et les icones) pour ajouter,
        enlever ou modiffier les sorigines de la salerte --}}
        <button type="submit" salerte_id = {{ $salerte->id }}
          class="btn d-flex flex-row align-items-center">
          {{-- L'affichage est différent s'il y a dejà des sorigines pour les
          salertes --}}
          @if ($salerte->nbsorigine > 0)

            <div class="mx-3">{{ $salerte->nbsorigine }} @lang('saisie.causes')</div>

            <img class="img-40-pale" src="{{ url('storage/img/saisie/oeil.svg') }}"
              alt="origine" title="@lang('tooltips.sorigines_edit')" />

          @else

            <img class="img-40-pale" src="{{ url('storage/img/pen.svg') }}"
              alt="origine" title="@lang('tooltips.sorigines_add')" class="" />

          @endif

        </button>

      </form>

  @endif

@endforeach

</div>
