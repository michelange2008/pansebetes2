{{-- issu de la vue user.show
destiner à supprimer le profil utilisateur
 --}}
<div class="card h-100">

  <div class="card-header d-flex flex-row align-items-center">
    <div class="me-3">

      <img class="img-40" src="{{ url('storage/img/destroy.svg') }}" alt="">

    </div>

    <div>


    <h5 class="card-title">@lang('titres.user_destroy')</h5>

</div>
  </div>

  <div class="card-body">

    <p>@lang('commun.del_user')</p>

  </div>

  <div class="card-footer">

    <a href="{{ route('user.wantToDestroy') }}" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> @lang('boutons.supprimer')</a>

  </div>

</div>
