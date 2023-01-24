<form class="" action="{{ route('login') }}" method="post">

  @csrf

  <div class="mb-3">

    <label for="email" class="form-label">@lang('auth.email')</label>
    <input type="email" name="email" value=""
        class="form-control @error ('email') is-invalid @enderror" required>
      @error ('email')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror

  </div>

  <div class="mb-3">

    <label for="password" class="form-label">@lang('auth.mdp')</label>
    <input type="password" name="password" value=""
    class="form-control" data-toggle = "password" required>
  @error ('password')
    <div class="alert alert-danger">
      {{ $message }}
    </div>
  @enderror

  </div>

  <div class="form-check">

    <input id="remember_me" type="checkbox" value="" name="remember"class="form-check-input">
    <label for="remember_me" class="form-check-label">@lang('auth.rester_connect')</label>

  </div>

  <div class="my-4">

    <button type="submit" name="button" class="btn btn-otobleu">
      <i class="fa-solid fa-right-to-bracket"></i>
      @lang('auth.connect')
    </button>

  </div>

</form>

  <hr class="divider">
@if (Route::has('password.request'))
  <a class="link-primary" href="{{ route('password.request') }}">
    @lang('auth.mdp_oublie')
  </a>
@endif
