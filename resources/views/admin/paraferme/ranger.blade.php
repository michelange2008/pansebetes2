@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @include('fragments.flash')

      </div>

    <div class="col-sm-11 col-md-10 col-lg-9">

        @titre()

      </div>

    </div>

    <form class="" action="{{ route('paraferme.storeRanger') }}" method="post">

      @csrf

    <div class="row mt-3 justify-content-center">


        <div class="col-sm-11 col-md-10 col-lg-9">


            @foreach ($parafermes as $paraferme)

              @inputNum([
                'label' => $paraferme->nom,
                'name' => $paraferme->id,
                'min' => 1,
                'step' => 1,
                'required' => true,
                'isName' => $paraferme->ordre
              ])

            @endforeach


        </div>

    </div>

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @enregistreAnnule()

      </div>

    </div>
    
  </form>

  </div>

@endsection
