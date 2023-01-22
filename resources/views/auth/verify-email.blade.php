@extends('layouts.app')


@section('contenu')

  <div class="container-fluid">

    <div class="row justify-content-center my-5">

      <div class="col-md-6 my-5">

        <img class="img-fluid m-4" src="{{ url('storage/img/pansebetes.svg') }}" alt="">
        <h3>@lang('auth.valide_inscription')</h3>
          <div class="lead">
            <p>@lang('auth.merci')</p>
            <p>@lang('auth.send_email')</p>
            <p>@lang('auth.demande_resend')</p>
          </div>

          @if (session('status') == 'verification-link-sent')
            <div class="lead my-3">
              @lang('auth.email_resent')
            </div>
          @endif

          <div class="d-flex justify-content-start">
            <form method="POST" action="{{ route('verification.send') }}">
              @csrf

              <div>
                <button type="submit" class="me-3 btn btn-otobleu">
                  <i class="fa-solid fa-square-envelope"></i>
                  @lang('auth.resend_email')
                </button>
              </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <button type="submit" class="btn btn-secondary">
                <i class="fa-solid fa-circle-xmark"></i>
                @lang('auth.abandonne')
              </button>
            </form>
          </div>


      </div>

    </div>

  </div>

@endsection
