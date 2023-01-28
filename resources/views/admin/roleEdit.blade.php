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

    <div class="row justify-content-start my-3">

      <div class="offset-2 col-sm-6 col-md-5 col-lg-4">

        <form class="" action="{{ route('admin.roleUpdate', $user->id) }}" method="post">
          @csrf
          @method("PUT")

          @inputSelect([
            'name' => "role_id",
            'label' => "rôle",
            'required' => true,
            'options' => $roles,
            'isName' => $user->role->id,
          ])

          @enregistreAnnule()
        </form>

      </div>

    </div>


  </div>

@endsection
