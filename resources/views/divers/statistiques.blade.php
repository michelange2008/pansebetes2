@extends('layouts.app')

@section('contenu')
    <div class="container-fluid">

        <div class="p-5 my-3 row bg-otorange">
            <div class="col-sm-11 col-md-10 col-lg-9">
                <img class="img-fluid" src="{{ url('storage/img/acsa_itab_otoveil.jpeg') }}" alt="Logo multiple">
            </div>

            <div class="my-3 col-sm-11 col-md-10 col-lg-9">
                <h1 class="display-5 fw-bold">@lang('pb.pb_en_chiffres')</h1>
            </div>
            <div class="my-3 col-sm-11 col-md-10 col-lg-9">
                @vers([
                    'route' => route('visiteur.statistiques.utilisation'),
                    'libelle' => 'Utilisation de Panse-Bêtes',
                    'couleur' => 'otobleu',
                    'fa' => 'fa-chart-pie',
                ])
                @vers([
                    'route' => route('visiteur.statistiques.exploitations'),
                    'libelle' => 'Description des exploitations',
                    'couleur' => 'otobleu',
                    'fa' => 'fa-cow',
                ])
                @annule(['route' => '/', 'nomAnnule' => 'Retour'])
            </div>
        </div>

        <div class="m-3 row justify-content-center">
            <div class="col-md-11">
                <h2 class="h2">@lang('pb.pb_utilisation')</h2>
                @include('stats.composants.statsCards')
            </div>
        </div>

        <div class="m-3 row justify-content-center">
            <div class="my-3 col-md-11">
                @include('stats.composants.utilisationPb')
            </div>
        </div>

    </div>
@endsection
