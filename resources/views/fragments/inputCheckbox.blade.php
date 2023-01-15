{{-- matrice de champs d'input type text
-> 2 variables obligatoire: $name, $label,
-> 1 variable facultative en cas de modification et non de création
--}}
<div class="form-group my-3">

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
