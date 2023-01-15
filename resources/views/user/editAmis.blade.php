@extends('layouts.app')

@extends('menus.menuprincipal')

{{-- @extends('aide.aide_accueil', ['especes' => session('especes')]) --}}

@section('contenu')

  <div class="container-fluid">

    <form class="" action="{{ route('amis.update', $user) }}" method="post">
      @csrf
      @method('PUT')

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @titre

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          <h3>Amis</h3>

          @include('user.inputAmiNonAmi', [
            'liste' => $amis_suiveurs,
            'checked' => 'checked'
          ])

          <h3>Utilisateurs de Panse-Bêtes</h3>

          @include('user.inputAmiNonAmi', [
            'liste' => $non_amis,
          ])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection
