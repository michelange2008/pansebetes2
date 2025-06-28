{{-- matrice de champs d'input type checkbox
-> 2 variables obligatoire: $name, $label,
-> 1 variable facultative en cas de modification et non de création
--}}
<div class="my-3 form-group">

  <label for="{{ $name }}">{{ ucfirst($label) }}</label>

  <input id="{{ $name }}"
  class="form-check-input"
  type="checkbox"
  name="{{ $name }}"
  {{-- si c'est une modification on affiche la valeur d'origine --}}
  value="{{ ucfirst($isName) ?? old($name) }}"

  @isset($checked)

    @if ($checked)
      class="fw-bold"
      checked = "checked"
    @endif

  @endisset

  >

</div>
