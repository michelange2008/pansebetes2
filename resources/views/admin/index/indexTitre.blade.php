<div class="d-flex alert bg-otobleu justify-content-left align-items-center">

    <img class="img-50" src="{{ url('storage/img/'.$indexTab->titre->icone) }}" alt="{{ $indexTab->titre->icone }}">

    <div class="ml-3">

      <h3 class="px-3">{{ ucfirst(__('tableaux.'.$indexTab->titre->titre ?? '')) }} </h3>

      <h5 class="px-3">{{ $indexTab->titre->soustitre ?? '' }}</h5>

    </div>

  <div>

    @if ($indexTab->titre->bouton)

      <a class="btn btn-otorange" href="{{ route($indexTab->titre->bouton->route) }}">

        <i class="{{ $indexTab->titre->bouton->fa }}"></i>
        {{ $indexTab->titre->bouton->libelle ?? "bouton"}}

      </a>

    @endif

  </div>

</div>
