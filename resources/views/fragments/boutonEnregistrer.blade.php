<button id="{{ $id ?? "soumettre" }}"
  class="btn {{$couleur ?? 'btn-otobleu'}} {{ $css ?? '' }} my-3 mr-1"
  type="submit">

  <i class="{{ $fa ?? 'fas fa-save' }}"></i>

  @lang($nomBouton ?? 'boutons.save')

</button>
