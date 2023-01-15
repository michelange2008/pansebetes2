<div class="form-group my-3">

  <label class="form-label" for="{{ $name }}">{{ ucfirst($label) }}</label>


  <select id="{{ $name }}" class="form-control" name="{{ $name }}"

    @isset($required)
      @if ($required) required @endif
    @endisset

    >
    <option value=""></option>

    @foreach ($options as $option)

      <option value="{{ $option->id }}"

        @isset($default)

          @if ($option->id == $default)

            selected = "selected"

          @endif

        @endisset

        {{-- mais si c'est une modification on choisit l'ancienne valeur --}}

        @isset($isName)

          @if ($option->id == $isName )

            selected = "selected"

          @endif

        @endisset

        >

        {{ ucfirst( $option->nom ) }}
        {{-- dans certains cas on peut avoir un peu plus d'information sur le
        sens des éléments de la liste déroulante  --}}
        @isset($option->detail)
          ({{ $option->detail }})
        @endisset

      </option>

    @endforeach

  </select>
  {{-- affichage de l'erreur --}}

  <div class="invalid-feedback">

    @error( $name ) {{ $message }} @enderror

    </div>

  </div>
