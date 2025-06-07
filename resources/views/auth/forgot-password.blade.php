@extends('layouts.app')

@section('contenu')

  <div class="container-fluid">

    <div class="row my-5">

    </div>

    <div class="row justify-content-center my-5">

      <div class="col-sm-10 col-md-8 col-lg-6 border birder-2 px-5">

        <div class="alert bg-otobleu my-3">

          <h1>@lang('passwords.password_forgotten')</h1>

        </div>

        <div class="lead my-3">

          <p>@lang('passwords.forgot_password')</p>

        </div>

        <form method="POST" action="{{ route('password.email') }}" class="p-6">
          @csrf
          <label for="email" class="form-label">@lang('auth.email')</label>
          <input id="email" type="email" name="email" class="form-control" placeholder="@lang('auth.mdp')">
          @error ('email')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror

          <div class="my-3">

            <button type="submit" class="btn btn-danger">@lang('passwords.email_reset_link')</button>
          </form>

          </div>

          <div class="lead">

            <p>@lang('passwords.explic_link_reset')</p>
          </div>

      </div>



    </div>

  </div>

@endsection
