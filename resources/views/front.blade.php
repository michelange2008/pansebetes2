@extends('layouts.app')

@section('contenu')

      <div class="p-3 my-3 bg-otorange">

        <div class="container-fluid py-2">

          <div class="d-flex flex-row justify-content-start align-items-center">

            <div class="col-4">

              <img class="p-2 img-200" src="{{ url('storage/img/pansebetes.jpeg') }}" alt="Logo Panse-Bêtes">

            </div>

            <div class="col-8">

              <h1 class="display-5 fw-bold">Bienvenue sur Panse-Bêtes</h1>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="container-fluid">

      <div class="row my-3 justify-content-middle">

        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-around">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">

                <img src="{{ url('storage/img/divers/ampoule.svg') }}" class="card-img-top img-50" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Vous ne connaissez pas Panse-Bêtes ?</h5>
              </div>
              <div class="card-footer">
                <button class="btn btn-otobleu" type="button" name="button">Découvrir</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">

                <img src="{{ url('storage/img/login.svg') }}" class="card-img-top img-50" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Déjà inscrit, connectez-vous</h5>
              </div>
              <div class="card-footer">

                @include('auth.login2')

              </div>
            </div>
        </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <img src="{{ url('storage/img/sign_in.svg') }}" class="card-img-top img-50" alt="...">

              </div>
              <div class="card-body">
                <h5 class="card-title">S'enregistrer</h5>
                <p class="card-text">Pour utiliser Panse-Bêtes, inscrivez-vous ici !</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-otobleu" type="button" name="button">S'inscrire</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

@endsection

@section('scripts')
  <script src="js/bootstrap-show-password.min.js" charset="utf-8"></script>
@endsection
