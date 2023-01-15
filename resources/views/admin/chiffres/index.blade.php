{{-- Issu de ChiffreController@index --}}
@extends('layouts.app')

@extends('menus.menuprincipal')

@section('sousmenu')


  @section('contenu')

      <div class="container-fluid">

        <div class="row my-3 justify-content-center">

          <div class="col-sm-11 col-md-10 col-lg-9">

            @include('fragments.flash')

          </div>

        </div>

        <div class="row justify-content-center my-3">

          <div class="col-sm-11 col-md-10 col-lg-9">

            @include('admin.index.index')

          </div>

        </div>

      </div>

  @endsection
