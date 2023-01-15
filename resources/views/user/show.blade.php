@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">


        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

          <div class="col">

              @include('user.profil')

          </div>

          <div class="col">

            @include('user.amis_suivis')

          </div>

          <div class="col">

            @include('user.amis_suiveurs')

          </div>

          <div class="col">

            @include('user.ferme')

          </div>

      </div>

      </div>

    </div>

  </div>

@endsection
