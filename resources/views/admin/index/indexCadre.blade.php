@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">


  </div>

  <div class="row my-3 justify-content-center">

    <div class="col-sm-11 col-md-10 col-lg-9">

      @include('fragments.flash')

    </div>

  </div>

  <div class="row mt-3 justify-content-center">

    <div class="col-sm-11 col-md-10 col-lg-9">

      @include('admin.index.indexTab')

    </div>

  </div>

</div>

@endsection
