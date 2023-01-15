@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">


  </div>

  <div class="row my-3 justify-content-center">

    <div class="col-md-11">

      @include('fragments.flash')

    </div>

  </div>

  <div class="row mt-3 justify-content-center">

    <div class="col-md-11">

      @include('admin.index.index')

    </div>

  </div>

</div>

@endsection
