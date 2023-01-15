@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="alert bg-otobleu">
          <h3><i class="fas fa-user-edit"></i> Donnez-nous votre avis sur Panse-Bêtes</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 ml-3 p-3">
        <p>Panse-Bêtes est le résultat d'un travail collectif qui s'est déroulé sur les trois années du projet Otoveil.
          Mais c'est un outil encore perfectible.</p>
        <p>Sur le fond, il y a sûrement des aspects de la santé des troupeaux qui ont été insuffisamment abordés
        ou pour lesquels les indicateurs recherchés peuvent être améliorés ou modifiés.</p>
        <p>Sur la forme, le site Panse-Bêtes peut gagner en clarté, en ergonomie et en compréhension.</p>
        <p>Mais toutes ces améliorations ne peuvent être permises que par l'utilisation en conditions réelles de cet outil.</p>
        <p>Pour cette raison, vos avis et critiques nous sont indispensables.</p>
        <h5 class="color-otobleu">Alors merci de bien vouloir remplir ce petit questionnaire</h5>
      </div>
    </div>
    {{ Form::open(['route' => 'notes.store']) }}

    <div class="form-row">
      <div class="col-md-1"></div>
      <div class="col-md-6 border p-3 mr-1">
        <p class='lead'>
          <img class="img-25 pb-1" src="{{asset(config('chemins.note'))}}/troupeau.svg" alt="">
          Sur quels type de production avez-vous utilisé Panse-Bêtes?
        </p>
        @foreach ($especes as $espece)
        <div class="custom-control custom-switch">
          <input id="espece_{{$espece->id}}" class="custom-control-input" type="checkbox" name="espece_{{$espece->id}}" value="{{$espece->id}}">
          <label for="espece_{{$espece->id}}" class="custom-control-label">{{ $espece->nom }}</label>
        </div>
        @endforeach
      </div>
      <div class="col-md-4 border p-3">
        <p class='lead'>
          <img class="img-25 pb-1" src="{{asset(config('chemins.note'))}}/count.svg" alt="">
          Combien de fois avez-vous utilisé Panse-Bêtes?
        </p>
        <div class="custom-control custom-radio">
          <input id="une" type="radio" name="utilisation" value="0" class="custom-control-input">
          <label for="une" class="custom-control-label">Une fois</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="quelques" type="radio" name="utilisation" value="1" class="custom-control-input">
          <label for="quelques" class="custom-control-label">Quelques fois</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="souvent" type="radio" name="utilisation" value="2" class="custom-control-input">
          <label for="souvent" class="custom-control-label">Souvent</label>
        </div>
      </div>
    </div>
    <div class="form-row mt-3">
      <div class="col-md-1"></div>
      <div class="col-md-10 border border-bottom-0 p-2">
        <p class='lead'>
          <img class="img-25 pb-1" src="{{asset(config('chemins.note'))}}/cerveau.svg" alt="">
          Les grilles Panse-Bêtes sont-elles pertinentes et utiles ?
        </p>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-1"></div>
      <div class="col-md-3 border border-right-0 border-top-0">
        <label for="customRange1">Quelle note donnez vous ?</label>
        @for ($i=0; $i < 5; $i++)
          <div class="custom-control custom-radio">
            <input id="fond_{{$i}}" type="radio" name="note_fond" value="{{$i}}" class="custom-control-input">
            <label for="fond_{{$i}}" class="custom-control-label">{{$i}}</label>
          </div>
        @endfor
        <small class="form-text text-muted">(0 = null, 4 = génial)</small>
      </div>
      <div class="col-md-7 border border-left-0 border-top-0 pb-2 pr-2">
        <label for="avis_fond">Vous pouvez détailler votre appréciation et proposer des améliorations:</label>
        <textarea id="avis_fond" rows="6" style="width:100%" name="avis_fond" value="avis_fond"></textarea>
      </div>
    </div>
    <div class="form-row mt-3">
      <div class="col-md-1"></div>
      <div class="col-md-10 border border-bottom-0 p-2">
        <p class='lead'>
          <img class="img-25 pb-1" src="{{asset(config('chemins.note'))}}/application.svg" alt="">
          l'application Panse-Bêtes est-elle pratique et adaptée ?
        </p>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-1"></div>
      <div class="col-md-3 border border-right-0 border-top-0">
        <label for="customRange1">Quelle note donnez vous ?</label>
        @for ($i=0; $i < 5; $i++)
          <div class="custom-control custom-radio">
            <input id="forme_{{$i}}" type="radio" name="note_forme" value="{{$i}}" class="custom-control-input">
            <label for="forme_{{$i}}" class="custom-control-label">{{$i}}</label>
          </div>
        @endfor
        <small class="form-text text-muted">(0 = null, 4 = génial)</small>
      </div>
      <div class="col-md-7 border border-left-0 border-top-0 pb-2 pr-2">
        <label for="avis_fond">Vous pouvez détailler votre appréciation et proposer des améliorations:</label>
        <textarea id="avis_fond" rows="6" style="width:100%" name="avis_forme" value="avis_forme"></textarea>
      </div>
    </div>
    <div class="form-row mt-3">
      <div class="col-md-1"></div>
      <div class="col-md-10 d-flex justify-content-end">
        <button class="btn btn-otorange rounded-0" type="submit" name="button"><i class="fas fa-share-square"></i> Valider</button>
        <a href="{{route('accueil')}}">
          <button class="btn btn-otobleu rounded-0 ml-2" type="button" name="button"><i class="fas fa-undo-alt"></i> Annuler</button>
        </a>
      </div>
    </div>
      {{ Form::close() }}


      </div>

@endsection
