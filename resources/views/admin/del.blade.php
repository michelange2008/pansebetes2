@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre([ 'titre' => $titre ])

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <p class="lead">
          @lang('commun.warning_del_user')
          {{ $user->name }}.

        </p>
        @if ($nb_saisies == 1)

          <p class="lead">@lang('commun.et_sa_saisie')</p>

        @elseif ($nb_saisies > 1)

          <p class="lead">@lang('commun.est_ses_saisies', ['nb_saisies' => $nb_saisies])</p>

        @endif

      </div>

    </div>

    <div class="row justify-content-start my-3">

      <div class="offset-2 col-sm-6 col-md-5 col-lg-4">

        <form class="" action="{{ route('admin.roleUpdate', $user->id) }}" method="post">
          @csrf
          @method("DELETE")

          @if ($nb_saisies > 0 && $user_zero != null)

            @inputOuiNon([
              'name' => "keep_saisies",
              'label' => "Doit-on garder ses saisies anonymisées"
              // 'isName' => false
            ])

          @endif

          @enregistreAnnule([
            'couleur' => 'btn-danger',
            'fa' => "fa-solid fa-bomb",
            'nomBouton' => 'boutons.del_conf'
          ])
        </form>

      </div>

    </div>


  </div>

@endsection
