@extends('layouts.app')

@section('contenu')

  <div class="p-3 my-3 bg-otorange">

    <div class="container-fluid py-2">

      <div class="col-md-6">

        <img class="img-fluid" src="{{ url('storage/img/acsa_itab_otoveil.jpeg') }}" alt="Logo multiple">

      </div>

      <div class="d-flex flex-row justify-content-start align-items-center">

        <div class="col p-2">

          <h1 class="display-5 fw-bold">@lang('pb.bienvenue')</h1>
          <p class="lead">@lang('pb.titre')</p>
          <p>@lang('pb.obj')</p>
          <p>@lang('pb.qui')</p>
          <a href="{{route('visiteur.presentation')}}" class="btn btn-otobleu">
            <i class="fa-solid fa-arrow-right"></i>
            @lang('pb.savoir_plus')
          </a>
        </div>

      </div>

    </div>

  </div>

</div>

<div class="container-fluid">

  <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-around mb-3">

    <div class="col-md-5">
      <div class="card">

        <div class="card-header d-flex align-items-center">
          <img src="{{ url('storage/img/login.svg') }}" class="img-50  me-3" alt="...">
          <h5 class="card-title">@lang('auth.deja_inscrit')</h5>
        </div>

        <div class="card-body">
          @include('auth.login')
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card">

        <div class="card-header d-flex align-items-center">
          <img src="{{ url('storage/img/sign_in.svg') }}" class="me-3 img-50" alt="...">
          <h5 class="card-title">@lang('auth.pas_inscrit')</h5>
        </div>

        <div class="card-body">
          <p>@lang('pb.faut_compte')</p>
          <p>@lang('pb.gratuit')</p>
          <p>@lang('pb.protection_donnees')</p>
          <p>@lang('pb.supprimer_possible')</p>
        </div>

        <div class="card-footer">
          <a class="btn btn-otobleu" href="{{route('register')}}">
            <i class="fa-solid fa-pencil"></i>
            @lang('auth.inscrire')
          </a>
        </div>

      </div>
    </div>
  </div>

</div>

</div>

@endsection

@section('scripts')
  <script src="js/bootstrap-show-password.min.js" charset="utf-8"></script>
@endsection
