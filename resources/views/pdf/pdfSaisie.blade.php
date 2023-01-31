@extends('layouts.pdf')

@section('contenu')
<br />
<div class="entete">
  <img src="{{asset(config('chemins.images'))}}/otoveil.jpeg" alt="otoveil" class="logo">
  <h1 class="pdf-titre">PANSE-BÊTES</h1>
  </div>
</div>

<div>
    <h1 style="color:darkslategrey">{{$saisie->nom}} - {{$saisie->espece->nom}}</h1>
    <h3 class="pdf-sous-titre">Saisie du {{$saisie->created_at->day}}/{{$saisie->created_at->month}}/{{$saisie->created_at->year}}</h3>
</div>
<!-- Affichage par Categorie -->
@include('pdf.parCategorie')

<div class="page-break"></div>

<!-- Affichage par Theme -->
@include('pdf.parTheme')

@endsection
