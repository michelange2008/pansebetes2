@extends('layouts.app')

@section('contenu')
    <div class="py-3 container-fluid">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="alert bg-otobleu d-flex">
                    <img class="px-2 img-50" src="{{ url('storage/img/profil_clair.svg') }}" alt="profil">
                    <h1>Panse-Bêtes: création d'un compte</h1>

                </div>

            </div>

        </div>

        <form class="my-3 row g-3 justify-content-center" method="POST" action={{ route('register') }}>
            @csrf

            <div class="col-md-5">
                <label for="name" class="form-label">@lang('auth.name')</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="email" class="form-label">@lang('auth.email')</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="password" class="form-label">@lang('auth.mdp')</label>
                <input type="password" name="password" value="" class="form-control" data-toggle="password" required>
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="password_confirmation" class="form-label">@lang('auth.mdp_confirm')</label>
                <input id="password_confirmation" type="password" name="password_confirmation" value=""
                    class="form-control" data-toggle="password" required>
                @error('password-confirmation')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <select class="my-4 form-select" name="profession" required>
                    <option selected disabled value="">Votre profession ?</option>
                    @foreach ($professions as $profession)
                    <option value="{{ $profession->id }}">{{ $profession->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5">
                <select class="my-4 form-select" name="region" required>
                    <option selected disabled value="">Votre région ?</option>
                    @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-10" style="font-style: italic; color:gray">
                <p>(Tous les champs sont obligatoires)</p>
            </div>
            
            <div class="col-md-10">
                <button type="submit" class="btn btn-otobleu">Enregistrer</button>
                <a class="btn btn-secondary" href="{{ route('accueil') }}">@lang('auth.abandonne')</a>
            </div>

        </form>

    </div>
@endsection

@section('scripts')
    <script src="js/bootstrap-show-password.min.js" charset="utf-8"></script>
@endsection
