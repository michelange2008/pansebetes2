{{-- issu de la vue user.show
affiche les infos du profil de l'utilisateur (nom, origine, fonction)
 --}}
<div class="card h-100">

  <div class="card-header d-flex flex-row align-items-center">
    <div class="me-3">

      <img class="img-40" src="{{ url('storage/img/infos_perso.svg') }}" alt="">

    </div>

    <div>


    <h5 class="card-title">@lang('titres.user_info')</h5>

</div>
  </div>

  <div class="card-body">

    <p class="card-text fst-italic">{{ $user->email }}</p>
    <p class="card-text">{{ $user->profession->nom }}</p>
    <p class="card-text">{{ $user->region->nom }}</p>
    @if ($user->isAdmin)
      <p class="card-text fw-bold">{{ ucfirst($user->role->nom) }}</p>
    @endif

  </div>

  <div class="card-footer">

    @edit([
      'route' => route('user.edit', $user),
    ])

  </div>

</div>
