@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.soustitre', ['soustitre' => "Le CASDAR OTOVEIL en quelques mots…", 'icone' => 'speak'])

@section('contenu')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="ziehharmonika">
        <h3>La production d'outils de conseil adaptés à l'agriculture biologique</h3>
        <div>
          <p>
            Le projet CASDAR OTOVEIL est en lien avec le programme Ambition Bio 2017 qui soutient la recherche et le développement pour l’AB et la production d’outils de conseil adaptés à la bio.
          </p><p>
            En effet, OTOVEIL vise à renforcer la détection précoce des ruptures d’équilibre sanitaire des troupeaux de ruminants.
          </p><p>
            Cela dans le but de limiter le recours aux intrants de synthèse (dont les traitements antibiotiques et certains antiparasitaires) et de renforcer les pratiques sanitaires d’élevage plus respectueuses du bien-être animal et de l’environnement, dans une approche de santé intégrée.
          </p>
        </div>
        <h3>Objectiver la notion d'équilibre sanitaire</h3>
        <div>
          <p>
            L’équilibre de santé d’un troupeau est un concept évoqué dans les fermes biologiques. Il s’agit d’un état global de bonne santé du troupeau, avec peu d’animaux malades et recevant peu d’intrants médicamenteux.
          </p><p>
            Cependant, ce concept n’est pas formalisé; flou, il induit diverses interprétations subjectives.
          </p>
          <p>
            Les travaux conduits dans ce CASDAR avaient donc pour finalité d’objectiver, par des méthodes statistiques adaptées, la notion d’équilibre sanitaire à partir de données enregistrées sur des troupeaux menés en agriculture biologique.
          </p>
        </div>
        <h3>Des méthodes pour la prévention et la surveillance</h3>
        <div>
          <p>
            Le projet avait pour but de produite des méthodes pour la prévention et la surveillance des troupeaux, adaptées à l’AB et transposables en élevage conventionnel..
          </p><p>
            C’est ce que nous présentons sous la forme de 5 livrets, un pour chaque type de production: bovins lait, bovins viande, ovins lait, ovins viande et caprins.
          </p>
        </div>
      </div>

    </div>
  </div>

  <div class="d-flex justify-content-end" style="border:none;padding:0">
    <a href="{{URL::route('accueil')}}" class="btn btn-otobleu text-light rounded-0">retour</a>
  </div>
</div>

@endsection

@push('js')
  <script src="{{url('js')}}/ziehharmonika.js"></script>
  <script src="{{url('js')}}/accordeon.js"></script>
@endpush
