@extends('layouts.app')


@extends('menus.menuprincipal')
@push('js')
  <script src="{{asset(config('chemins.js'))}}/admin.js"></script>
@endpush

@section('contenu')

  <!-- Tableau des demandes d'accès -->
    <div class="container-fluid">
      <div class="alert alert-warning">
        <h3><i class="fas fa-user-check"></i> Demandes d'accès</h3>
      </div>
      @if ($demandes->count() > 0)
      <div class="table-responsive contenu">
        <table class="table table-hover">
          <thead class="table-dark">
            <th>nom</th>
            <th>email</th>
            <th>profession</th>
            <th>région</th>
            <th class="text-center">Supprimer</th>
            <th class="text-center">Envoyer un mail</th>
            <th class="text-center">Inscrire</th>
          </thead>
          <tbody id="nonvalide">
              @foreach ($demandes as $demande)

                  <tr id="ligneNonValide_{{$demande->id}}" class="ligne_nonvalide">
                    <td id="nomNonValide_{{$demande->id}}">{{$demande->name}}</td>
                    <td id="emailNonValide_{{$demande->id}}">{{$demande->email}}</td>
                    <td id="professionNonValide_{{$demande->id}}">{{$demande->profession}}</td>
                    <td id="regionNonValide_{{$demande->id}}">{{str_replace('"', '', $demande->region)}}</td> <!-- fallait enlever les doubles quotes des régions -->
                    <td id="suppr_{{$demande->id}}" class="destroy cell-delmod curseur">
                      <img src="{{asset(config('chemins.admin'))}}/destroy.svg" alt="destroy" title = "Inscription de robot à détruire sans poser de question">
                    </td>
                    <td id="del_{{$demande->id}}" class="delete cell-delmod">
                      <a class="d-block text-center"
                      href="mailto:{{$demande->email}}?subject=Votre demande d'identifiant Panse-Bêtes&body=Bonjour {{$demande->nom}}">
                      <img class="img-25" src="{{asset(config('chemins.admin'))}}/question.svg" alt="On sait pas"
                      title = "Inscription qui pose problème mais à qui on va envoyer un mail">
                      </a>
                    </td>
                    <td id="ok_{{$demande->id}}" class="garder cell-delmod curseur">
                      <img src="{{asset(config('chemins.admin'))}}/plus.svg" alt="Garder" title="Inscription OK à valider">
                    </td>
                  </tr>

              @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="lead ml-3">Il n'y a pas de demande d'accès en cours.</p>
    @endif
  </div>

  <!-- Tableau des utilisateurs -->
  <div id="totum" class="container-fluid">
    <div class="alert alert-success">
      <h3><i class="fas fa-users"></i> Gestion des utilisateurs</h3>
    </div>
    <div class="table-responsive contenu">
      <table class="table table-hover">
        <thead class="table-dark">
          <th>Nom</th>
          <th>Email</th>
          <th class="text-center">Saisies</th>
          <th class="text-center">Administrateur</th>
          <th class="text-center">Supprimer</th>
        </thead>
        <tbody id="user">
          @foreach ($users as $user)
            @if ($user->valide == 1)
              <tr id="ligne_{{$user->id}}" class="ligne {{($user->isAdmin) ? "text-danger": ""}}">
                <td id="nom_{{$user->id}}" class="nom">{{$user->name}}</td>
                <td id="email_{{$user->id}}" class="modifEmail">{{$user->email}}</td>
                <td id="saisies_{{$user->id}}" class="text-center saisies">{{count($saisies_groupees[$user->id])}}</td>
                <td id="admin_{{$user->id}}" class="text-center">{{($user->isAdmin) ? "OUI" : "NON"}}</td>

                <td id="moins_{{$user->id}}" class="supprimer cell-delmod curseur" title="Supprimer cet utilisateur">
                  <img src="{{asset(config('chemins.admin'))}}/moins.svg" alt="Supprimer">
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-end">
      <img id="plus" class="curseur" src="{{asset(config('chemins.admin'))}}/plus_rond.svg" alt="Ajouter" title="Ajouter un utilisateur">
    </div>
  </div>

<!-- Tableau des notes -->
  <div id="totum" class="container-fluid">
    <div class="alert alert-danger">
      <h3><i class="fas fa-user-edit"></i> Avis des utilisateurs</h3>
    </div>
    @if($notes->count() > 0)
    <div class="table-responsive contenu">
      <table class="table table-hover">
        <thead class="table-dark">
          <th>Nom</th>
          <th class="text-center">Nombre d'utilisations</th>
          <th class="text-center">Note sur Panse-Bêtes</th>
          <th class="text-center">Commentaire</th>
          <th class="text-center">Note sur l'application</th>
          <th class="text-center">Commentaire</th>
        </thead>
        <tbody id="user">
          @foreach ($notes as $note)
              <tr id="ligne_{{$user->id}}" class="ligne {{($user->isAdmin) ? "text-danger": ""}}">
                <td id="avisnom_{{$user->id}}" class="nom">{{$user->name}}</td>
                <td id="utilisation_{{$user->id}}" class="text-center saisies">{{$note->utilisation}}</td>
                <td id="notefond_{{$user->id}}" class="text-center">{{$note->note_fond}}</td>
                <td id="avisfond_{{$user->id}}" class="">{{$note->avis_fond}}</td>
                <td id="noteforme_{{$user->id}}" class="text-center">{{$note->note_forme}}</td>
                <td id="avisforme_{{$user->id}}" class="">{{$note->avis_forme}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p class="lead ml-3">Il n'y pas encore d'avis.</p>
  @endif
  </div>

@endsection
