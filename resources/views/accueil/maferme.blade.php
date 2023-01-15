<div class="card mb-3 alert alert-dark" role="alert">

  <div class="card-body">

    <div class="row no-gutters">

      <div class="col-md-4 col-lg-3 col-xl-2">

        @if ($user->parafermes()->count() == 0)

          <img src="{{ url('storage/img/divers/ferme_rouge.svg') }}"
          class="card-img d-none d-md-block" alt="...">

        @else

          <img src="{{ url('storage/img/divers/ferme.svg') }}"
          class="card-img d-none d-md-block" alt="...">

        @endif

      </div>

      <div class="col-md-8 col-lg-9 col-xl-10">


        <h4 class="card-title">@lang('commun.parafermes')</h4>

        @if ($user->parafermes()->count() == 0)

          <p class="card-text">@lang('commun.parafermes_saisie')</p>

        @else

          <p class="card-text">@lang('commun.parafermes_edit')</p>


        @endif

        <a class="btn btn-sm btn-otobleu rounded-0"
          href="{{ route('ferme.edit', $user) }}">
            <i class="fa-solid fa-user-pen"></i> @lang('commun.ma_ferme')
        </a>

        <a class="btn btn-sm btn-otorange rounded-0"
          href="{{ route('pdf.modeleExploitation') }}" target="_blank">
            <i class="fa-solid fa-file-pdf"></i> @lang('commun.ma_ferme_pdf')
        </a>

      </div>

    </div>

  </div>

</div>
