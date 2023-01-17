@extends('layouts.app')

@section('contenu')

      <div class="p-3 my-3 bg-otorange">

        <div class="container-fluid py-2">

          <div class="d-flex flex-row justify-content-start align-items-center">

            <div class="col-4">

              <img class="p-2 img-200" src="{{ url('storage/img/pansebetes.jpeg') }}" alt="Logo Panse-Bêtes">

            </div>

            <div class="col-8">

              <h1 class="display-4 fw-bold">Bienvenue sur Panse-Bêtes</h1>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="container-fluid">

      <div class="row my-3 justify-content-middle">

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Découvrir</h5>
                <p class="card-text">Vous ne connaissez pas Panse-Bêtes ?</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-otobleu" type="button" name="button">Découvrir</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Se connecter</h5>
                  <p class="card-text">Déjà inscrit ? Connectez-vous pour retrouver votre espce Panse-Bêtes</p>
              </div>
              <div class="card-footer">
                <a href="{{route('login')}}">
                <button class="btn btn-otobleu" type="button" name="button">Se connecter</button>
              </a>
              </div>
            </div>
        </div>
          <div class="col">
            <div class="card">
              <img src="..." class="card-img-top" alt="...">
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
