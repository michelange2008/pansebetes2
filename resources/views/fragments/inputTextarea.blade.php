<div class="form-group my-3">

  <label class="form-label" for="{{ $name }}">{{ ucfirst($label) }}</label>

  <textarea id="{{ $name }}" class="form-control"
            name="{{ $name }}" rows="3"
            placeholder = "{{ $placeholder ?? "" }}"
    >{{ old( $name ) ?? $isName }}</textarea>

  {{-- affichage de l'erreur --}}
  <div id="{{ $name }}feedback" class="invalid-feedback">

    @error( $name ) {{ $message }} @enderror

  </div>

</div>
