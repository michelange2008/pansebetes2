<div class="row">

  @foreach ($liste as $personne)

    <div class="col-4">

      <div class="input-group m-3">

        <div class="input-group-text" style="width:350px" >

          <input id="{{ $personne->id }}" class="form-check-input mt-0 me-3"
          name = "{{ $personne->id }}"
          {{ $checked ?? ''}}
          type="checkbox">

          <label for="{{ $personne->id }}">{{ $personne->name }}</label>

        </div>

      </div>

    </div>

  @endforeach

</div>
