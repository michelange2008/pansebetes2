<div class="card h-100">

  <div class="card-header d-flex flex-row align-items-center">

    <div class="me-3">

      <img class="img-40" src="{{ url('storage/img/amis_suiveurs.svg') }}" alt="">

    </div>

    <div class="">

      <h5 class="card-title">@lang('commun.amis')</h5>
      <p>{{ ucfirst(__('commun.amis_suiveurs')) }}</p>

    </div>

  </div>

  <div class="card-body">

    @if ($amis_suiveurs->count() > 0)

      @foreach ($amis_suiveurs as $ami)

        <p>{{ $ami->ami->name }}</p>

      @endforeach

    @endif

  </div>

  <div class="card-footer">

    @edit([
    'route' => route('amis.edit', $user),
    ])

  </div>

</div>
