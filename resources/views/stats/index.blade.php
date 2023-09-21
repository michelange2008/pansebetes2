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
        
        <div class="mt-3 row justify-content-center">


            <div class="col-sm-11 col-md-10 col-lg-9">

                <div class="flex-row d-flex justify-content-between">

                    <div class="card">
                        <div class="text-center card-body">
                            <h5>Nombre d'utilisateurs</h5>
                            <h3>{{ $nb_utilisateurs }}</h3>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="text-center card-body">
                            <h5>Nombre de saisies</h5>
                            <h3>{{ $nb_saisies }}</h3>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="text-center card-body">
                            <h5>Moyenne par utilisateur</h5>
                            <h3>{{ $nb_saisies/$nb_utilisateurs }}</h3>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
