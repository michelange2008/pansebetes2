@extends('layouts.app')

@section('contenu')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card m-3">
          <img class="card-img-top mb-3" src="{{asset(config('chemins.images'))}}/itab_otoveil_long.jpeg" alt="ITAB Otoveil">
          <div class="card-body">
            @isset($message)
              <div class="alert alert-success">
                <h3>{{$message}}</h3>
              </div>
            @endisset
            @isset($error)
              <div class="alert alert-danger">
                <h3>{{$error}}</h3>
              </div>
            @endisset

            <div class="">
              <a href="{{route('login')}}">
                <button class="btn btn-otobleu rounded-0" type="button" name="button"> <i class="fa fa-sign-out-alt"></i> Retour</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
