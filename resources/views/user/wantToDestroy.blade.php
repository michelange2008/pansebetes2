@extends('layouts.app')

@extends('menus.menuprincipal')


@section('contenu')

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <div class="alert bg-otobleu">
          <h1>Voulez-vous vraiment supprimer votre compte ?</h1>
        </div>

      </div>

    </div>

    <div class="row justify-content-center my-5">

      <div class="col-sm-10 col-md-8 col-lg-6 border birder-2 px-5">

        <div class="lead my-3">

          <p>En supprimant votre compte, vous supprimerez aussi toutes les saisies réalisées.</p>

          <p>Veuillez saisir votre mot de passe pour valider la suppression.</p>

        </div>

        <form method="post" action="{{ route('user.destroy') }}" class="p-6">
          @csrf
          @method('delete')
          @if ($errors->named->any())
              <div class="alert alert-danger">
                problème
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <input id="password" type="password" name="password" class="form-control" placeholder="@lang('auth.mdp')" data-toggle="password">
          @error ('password')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror

          <div class="my-3">

            <a href="{{ route('accueil') }}"class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> @lang('boutons.accueil')</a>

            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> @lang('boutons.del_conf')</button>
          </form>

          </div>

      </div>



    </div>

  </div>

@endsection

@section('scripts')
  <script src="{{ url('js/bootstrap-show-password.min.js') }}" charset="utf-8"></script>
@endsection
