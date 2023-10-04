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

                    <div class="card">
                        <div class="text-center card-body">
                            <h3>{{ $nb_utilisateurs }} utilisateurs</h3>
                            <h5>enregistrés</h5>
                        </div>
                    </div>

                    <div class="card">
                        <div class="text-center card-body">
                            <h3>{{ $nb_saisies }} panse-bêtes</h3>
                            <h5>réalisés par {{ $nb_user_saisie }} utilisateurs</h5>

                        </div>
                    </div>

                    <div class="card">
                        <div class="text-center card-body">
                            <h3>{{ round($nb_saisies / $nb_user_saisie, 1) }} panse-bêtes</h3>
                            <h5>réalisés en moyenne par utilisateur</h5>
                        </div>
                    </div>

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
