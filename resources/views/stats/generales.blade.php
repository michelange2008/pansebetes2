@extends('layouts.app')


@extends('menus.menuprincipal')

@section('contenu')
    <div class="container-fluid">

        <div class="mt-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @include('fragments.flash')

            </div>

        </div>

        <div class="mt-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @titre()

            </div>

        </div>

        <div class="my-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                    @include('stats.composants.statsCards')

            </div>

        </div>

        <div class="my-5 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @include('stats.composants.utilisationPb')
                
            </div>

        </div>

    </div>
@endsection

