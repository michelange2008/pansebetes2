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

                <img class="img-200" src="{{ url('storage/img/work_in_progress.svg') }}" alt="EN travaux">

            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection
