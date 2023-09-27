<div class="card">

  <div class="flex-row card-header d-flex align-items-center">

    <div class="me-3">

      <img class="img-40" src="{{ url('storage/img/categories/logement.svg') }}" alt="">

    </div>

    <div>

      <h5 class="card-title">@lang('commun.exploitation')</h5>

    </div>

  </div>

  <div class="card-body">

    @if ($user->parafermes()->count() == 0)

      <div class="card-text fst-italic">

        <p>@lang('commun.no_info')</p>

        <p>@lang('commun.clic_button_sub')</p>

      </div>

    @else

      @foreach ($user->parafermes->sortBy('ordre') as $paraferme)

        <div class="flex-row card-text d-flex justify-content-between">

          <p>
            {{ ucfirst($paraferme->nom) }} :
          </p>

          <p class="fw-bold">
            {{ ucfirst($paraferme->param->value) }} {{ ($paraferme->unite != "NULL") ? $paraferme->unite : '' }}
          </p>

        </div>

      @endforeach

    @endif

  </div>

  <div class="card-footer">

    @edit([
    'route' => route('ferme.edit', $user),
    ])

  </div>

</div>
