<div class="card h-100">

  <div class="card-header d-flex flex-row align-items-center">

    <div class="me-3">

      <img class="img-40" src="{{ url('storage/img/amis_suivis.svg') }}" alt="">

    </div>

    <div>

      <h5 class="card-title">@lang('commun.amis')</h5>
      <p>{{ ucfirst(__('commun.amis_suivis')) }}</p>

    </div>

  </div>

  <div class="card-body">

    @if ($amis_suivis->count() > 0)

      @foreach ($amis_suivis as $ami)

        <a href="{{ route('saisiesAmi', $ami) }}" title="Voir les saisies">

          <p>
            {{ $ami->name }}

            @if ($ami->saisies->count() == 1)
              ({{ $ami->saisies->count() }} saisie <i class="fa-solid fa-up-right-from-square"></i> )

            @elseif ($ami->saisies->count() > 1)
              ({{ $ami->saisies->count() }} saisies <i class="fa-solid fa-up-right-from-square"></i> )

            @endif

          </p>

        </a>

      @endforeach

    @endif

  </div>

  <div class="card-footer">
    <p>Pour que des personnes apparaissent ici, il faut qu'elles vous aient désigné.e comme ami.e</p>
  </div>

</div>
