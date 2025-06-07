{{-- matrice de champs d'input type text
    -> 2 variables obligatoire: $name, $label,
    -> 1 variable facultative en cas de modification et non de création
 --}}
<div class="custom-control control-checkbox my-3">

  <input id="{{ $name }}"
    class="custom-control-input @error( $name ) is-invalid @enderror"
    name = {{ $name }}
    value = 1
    type="checkbox"
    @isset($isName)
      @if ($isName)
        checked = "checked"
      @endif
    @endisset
    >

    <label class="custom-control-label" for="{{ $name }}">{{ ucfirst($label) }}</label>
  {{-- affichage de l'erreur --}}
  <div id="{{ $name }}feedback" class="invalid-feedback">

    @error( $name ) {{ $message }} @enderror

  </div>

</div>
