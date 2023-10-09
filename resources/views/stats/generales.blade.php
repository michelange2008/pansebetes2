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

                <div class="flex-row d-flex justify-content-between">

                    @include('stats.statsCards')
                    
                </div>

            </div>

        </div>

        <div class="my-5 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">
                <h2>Evolution du nombre de saisies</h2>
                {{ $nb_pb_mensuel->renderHtml() }}

            </div>
        </div>

        <div class="my-3 row justify-content-center">

            <div class="col-sm-6 col-md-5 col-lg-4">
                <h2>Origine des utilisateurs.trices</h2>
                {{ $origine_users->renderHtml() }}

            </div>
            <div class="col-sm-6 col-md-5 col-lg-4">
                <h2>Profession des utilisateurs.trices</h2>
                {{ $profession_users->renderHtml() }}

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {!! $nb_pb_mensuel->renderChartJsLibrary() !!}
    {!! $nb_pb_mensuel->renderJs() !!}
    {!! $origine_users->renderJs() !!}
    {!! $profession_users->renderJs() !!}
@endsection
