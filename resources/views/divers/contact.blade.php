@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.soustitre', ['soustitre' => "Nous contacter", 'icone' => 'contact'])

@section('contenu')

<div class="container-fluid">
  <div class="row no-gutters">
    <p class="lead">Panse-Bêtes est un outil largement perfectible. Il doit être évolutif,
      se corriger au fil des expériences de terrain. Nous avons donc besoin de vos avis,
      critiques et propositions. N'hésitez pas !</p>
  </div>
  <div class="row justify-content-sm-center no-gutters">
    <div class="card-deck">
      <div class="card">
        <img class="img-100" src="{{asset(config('chemins.images'))}}/contact_avis.svg" alt="sur le fond">
        <div class="card-body">
          <h3 class="card-title">Votre avis</h3>
          <p class="card-text">Il vous est possible de nous dire en quelques clics ce que vous avez pensé de Panse-Bêtes.</p>
          <p class="card-text">Un formulaire assez court vous permettra de nous faire part de votre votre expérience après l'utilisation de cet outil dans un ou plusieurs troupeaux</p>
          <p class="card-text">Pour cela il vous suffit de cliquer sur le bouton ci-dessous.</p>
        </div>
        <div class="card-footer border-light bg-transparent">
          <a href="{{route('notes.create')}}">
            <button class="btn btn-otorange rounded-0"><i class="fas fa-pencil-alt"></i> Remplir le questionnaire</button>
          </a>
        </div>
      </div>

      <div class="card">
        <img class="img-100" src="{{asset(config('chemins.images'))}}/contact_methode.svg" alt="sur le fond">
        <div class="card-body">
          <h3 class="card-title">La méthode</h3>
          <p class="card-text">Mais un formulaire vous semble vraiment trop succinct pour exprimer tout ce que vous avez à dire sur Panse-Bêtes.</p>
          <p class="card-text">Vous souhaiteriez avec des éclaircissements sur le contenu de cet outil: les raisons de la démarches, les différentes étapes proposées, etc.</p>
          <p class="card-text">Ou vous avez des propositions d'amélioration des grilles Panse-Bêtes.<p>
          <p class="card-text"> N'hésitez pas, écrivez-nous en cliquant sur le bouton ci-dessous.</p>
        </div>
        <div class="card-footer border-light bg-transparent">
          <a href="mailto:{{config('mail.contact.address')}}?subject=Quelques réflexions au sujet de la méthode Panse-Bêtes">
            <button class="btn btn-otorange rounded-0"><i class="far fa-envelope"></i> Nous écrire sur le fond</button>
          </a>
        </div>
      </div>

      <div class="card">
        <img class="img-100" src="{{asset(config('chemins.images'))}}/contact_application.svg" alt="sur la forme">
        <div class="card-body">
          <h3 class="card-title ">L'application</h3>
          <p class="card-text">Sur la forme, qu'avez-vous pensé de l'application Panse-Bêtes ?</p>
          <div class="d-flex flex-row align-items-start">
            <p class="card-text">Si vous avez rencontré des difficultés,
              que l'application a planté trop souvent, n'hésitez pas à nous le faire savoir.</p>
              <img style="width:80px" src="{{asset(config('chemins.images'))}}/insulte.svg" alt="scrogneugneu">
          </div>
          <p class="card-text">Si vous avez des idées d'amélioration sur la fonctionnement de l'application, son ergonomie, voire de nouvelles fonctionnalités...</p>
          <p class="card-text">Ecrivez-nous&nbsp!</p>
        </div>
        <div class="card-footer border-light bg-transparent">
          <a href="mailto:{{config('mail.admin.address')}}?subject=Quelques réflexions au sujet de l'application Panse-Bêtes&cc={{config('mail.contact.address')}}">
            <button class="btn btn-otorange rounded-0"><i class="far fa-envelope"></i> Nous écrire sur la forme</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
