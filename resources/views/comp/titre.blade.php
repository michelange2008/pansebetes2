<div class="d-flex alert bg-otobleu align-items-center">

  <img class="img-50" src="{{ url('storage/img/'.$titre->icone) }}" alt="{{ $titre->icone }}">

  <div class="ml-3">

    @if ($titre->translate)

      <h3 class="px-3">{{ ucfirst(__('titres.'.$titre->titre ?? '')) }}</h3>

    @else

      <h3 class="px-3">{{ ucfirst($titre->titre ?? '') }}</h3>

    @endif


    @isset($titre->soustitre)

      <p class="m-3 mb-0"><small>{{ __('titres.'.$titre->soustitre ?? '') }}</small></p>

    @endisset

    @isset($titre->bouton)

      <a class="btn btn-otorange" href="{{ $titre->bouton->route }}">{{ $titre->bouton->libelle ?? "bouton"}}</a>

    @endisset

  </div>


</div>
