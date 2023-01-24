@extends('layouts.app')

@section('contenu')

  <div class="container-fluid py-3">

    <div class="row justify-content-center">

      <div class="col-md-10">

        <div class="alert bg-otobleu d-flex">
          <img class="img-50 px-2" src="{{ url('storage/img/profil_clair.svg') }}" alt="profil">
          <h1>Panse-Bêtes: création d'un compte</h1>

        </div>

      </div>

    </div>

    <form class="row g-3 my-3 justify-content-center" method="POST" action={{ route('register') }}>
      @csrf

      <div class="col-md-5">
        <label for="name" class="form-label">@lang('auth.name')*</label>
        <input type="text" name="name" value="{{ old('name') }}"  required
          class="form-control @error ('name') is-invalid @enderror">
        @error ('name')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="col-md-5">
        <label for="email" class="form-label">@lang('auth.email')*</label>
        <input type="email" name="email" value="{{ old('email') }}" required
          class="form-control @error ('email') is-invalid @enderror" >
        @error ('email')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="col-md-5">
        <label for="password" class="form-label">@lang('auth.mdp')*</label>
        <input type="password" name="password" value=""
          class="form-control" data-toggle = "password" required>
        @error ('password')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="col-md-5">
        <label for="password_confirmation" class="form-label">@lang('auth.mdp_confirm')*</label>
        <input id="password_confirmation" type="password" name="password_confirmation" value=""
          class="form-control" data-toggle = "password" required>
        @error ('password-confirmation')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
    </div>

      <div class="col-md-10">
        <p class="text-secondary mt-3">Les champs marqués d'un astérique sont obligatoires.</p>
        <p class="text-secondary mt-3">Les deux champs ci-dessous sont facultatifs.</p>
      </div>

      <div class="col-md-5">
        <select class="form-select my-4" name="profession">
          <option selected disabled>Votre profession ?</option>
          <option value="Eleveur">Eleveur</option>
          <option value="Technicien">Technicien</option>
          <option value="Animateur">Animateur</option>
          <option value="Vétérinaire">Vétérinaire</option>
          <option value="Enseignant">Enseignant</option>
          <option value="Etudiant">Etudiant</option>
          <option value="Autre">Autre</option>
        </select>
      </div>

      <div class="col-md-5">
        <select class="form-select my-4" name="region">
          <option selected disabled>Votre région ?</option>
          <option value= "Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
          <option value= "Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
          <option value= "Bretagne">Bretagne</option>
          <option value= "Centre-Val_de_Loire">Centre-Val de Loire</option>
          <option value= "Corse">Corse</option>
          <option value= "Grand_Est">Grand Est</option>
          <option value= "Guadeloupe">Guadeloupe</option>
          <option value= "Guyane">Guyane</option>
          <option value= "Hauts-de-France">Hauts-de-France</option>
          <option value= "Île-de-France">Île-de-France</option>
          <option value= "La_Réunion">La Réunion</option>
          <option value= "Martinique">Martinique</option>
          <option value= "Mayotte">Mayotte</option>
          <option value= "Normandie">Normandie</option>
          <option value= "Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
          <option value= "Occitanie">Occitanie</option>
          <option value= "Pays_de_la_Loire">Pays de la Loire</option>
          <option value= "Provence-Alpes-Côte_d'Azur">Provence-Alpes-Côte d'Azur</option>
          <option value= "Hors_de_France">Hors de France</option>
        </select>
      </div>

      <div class="col-md-10">
        <button type="submit" class="btn btn-otobleu">Enregistrer</button>
        <a class="btn btn-secondary" href="{{route('accueil')}}">@lang('auth.abandonne')</a>
      </div>

    </form>

  </div>

@endsection

@section('scripts')
  <script src="js/bootstrap-show-password.min.js" charset="utf-8"></script>
@endsection
