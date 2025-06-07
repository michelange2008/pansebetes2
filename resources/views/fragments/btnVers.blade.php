<a class="btn btn-{{ $couleur ?? 'otorange' }} rounded-0 my-1"
    href="{{ $route ?? route('accueil') }}"
    target = {{ $target ?? '_self' }}>

    <i class="fas {{ $fa ?? 'fa-file-alt' }}"></i> {{ $libelle ?? __('boutons.valider') }}

</a>
