{{-- issu de  user.editFerme--}}
<div class="form-group mb-3">

  <label class="form-label" for="{{ $paraferme->nom }}">
    {{ $paraferme->nom }}
     <span class="fst-italic text-secondary">(@lang('forms.select_multiple'))</span>
  </label>

  <select size= "{{ count($paraferme->parties) + 2 }}" multiple class="form-control" name="{{ $paraferme->id }}[]">

    @foreach ($paraferme->parties as $key => $partie)

      <option value="{{ $partie }}"

      @if ( str_contains($paraferme->value, $partie))

        selected = "selected"

      @endif

      >

      {{ ucfirst(trim($partie))}}

    </option>

  @endforeach

  <option value="" disabled>
    &#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;&#x2500;
  </option>

  <option value="">@lang('forms.no_option')</option>

</select>

</div>
