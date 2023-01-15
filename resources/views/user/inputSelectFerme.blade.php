{{-- issu de  user.editFerme--}}
<div class="form-group mb-3">

  <label class="form-label" for="{{ $paraferme->nom }}">{{ $paraferme->nom }}</label>

  <select class="form-control" name="{{ $paraferme->id }}">

    <option value=""></option>

    @foreach ($paraferme->parties as $key => $partie)

      <option value="{{ $partie }}"

      @if ($paraferme->value == trim($partie))

        selected = "selected"

      @endif

      >

      {{ ucfirst(trim($partie)) }}

    </option>

  @endforeach

</select>

</div>
