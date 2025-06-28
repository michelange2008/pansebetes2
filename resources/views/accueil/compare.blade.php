<div class="card mb-3 alert alert-dark">

  <div class="card-body">

    <div class="row no-gutters">

      <div class="col-md-4 col-lg-3 col-xl-2">

        <img src="{{ url('storage/img/divers/compare.svg') }}"
        class="card-img d-none d-md-block" alt="...">

      </div>

      <div class="col-md-8 col-lg-9 col-xl-10">

        <h4 class="card-title">@lang('commun.compare_titre')</h4>

        @if ($saisies->count() < 2)

          <p class="card-text">@lang('commun.compare_texte_futur')</p>

        @else

          <p class="card-text">@lang('commun.compare_texte')</p>

        @endif

        @if ($saisies->count() < 2)

          <a class="btn btn-sm disabled rounded-0"
            href="{{ route('compare.index') }}">
              <i class="fa-solid fa-user-pen"></i> @lang('boutons.go')
          </a>

        @else

          <a class="btn btn-sm btn-otobleu rounded-0"
            href="{{ route('compare.index') }}">
              <i class="fa-solid fa-user-pen"></i> @lang('boutons.go')
          </a>

        @endif

      </div>

    </div>

  </div>

</div>
