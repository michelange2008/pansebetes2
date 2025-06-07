@extends('layouts.app')

@section('contenu')
    <div class="container-fluid">

        <div class="my-3 row justify-content-center">

            <div class="my-3 col-md-10 col-lg-9 col-xl-8 bg-otobleu">

                <div class="py-4 m-4 jumbotron">

                    <h1 class="display-4">Il semble que votre compte ait été désactivé !</h1>

                    <hr class="my-4">

                    <p class="lead">Pour en connaître la raison, n'hésitez pas à envoyer un mail à:</p>
                    <p class="h4">
                        <a class="text-white" href="mailto:{{ $mail_adress }}">
                            {{ $mail_name }} <i class="fas fa-envelope"></i>
                        </a>
                    </p>

                    <hr class="my-4">
                    <a class="btn btn-otorange btn-lg" href="{{ route('front') }}" role="button">Revenir à l'accueil</a>

                </div>

            </div>

        </div>

    </div>
@endsection
