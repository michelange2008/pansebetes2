@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.soustitre', ['soustitre' => "Mentions légales", 'icone' => 'legal'])

@section('contenu')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.images'))}}/divers/idcard.svg" alt="">
        <h5 class="mt-2">Ce site est édité par...</h5>
      </div>
      <div class="pl-3">
        <p class="lead" style="color:#3600c0"><strong>{{$infos->nom}}</strong>
          <a href="{{$infos->lien}}">
            <i class="fas fa-external-link-square-alt"></i>
          </a>
        </p>
        <p><i class="fas fa-address-book"></i> {{$infos->adresse}} - <i class="fas fa-phone-square"></i> {{$infos->telephone}}</p>
        <p><em>Directrice de la publication:</em><strong><span style="color:#fc7754"> {{$infos->dirPub}}</span></strong></p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.images'))}}/divers/cloud.svg" alt="">
        <h5 class="mt-2">Ce site est hébergé par...</h5>
      </div>
      <div class="pl-3">
        <p class="lead"><strong>{{$infos->nomHeb}}</strong>
          <a href="{{$infos->lienHeb}} title=OVH Mentions légales">
            <i class="fas fa-external-link-square-alt"></i>
          </a>
        </p>
        <p><i class="fas fa-address-book"></i> {{$infos->adresseHeb}}</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.note'))}}/credit.svg" alt="">
        <h5 class="mt-2">License et crédits</h5>
      </div>
      <div class="ml-3">
        <h5>License</h5>
        <div class="d-flex flex-row justify-content-around align-items-center mb-3">
          <img style="height:40px" src="{{asset(config('chemins.images'))}}/divers/by-sa.svg" alt="CC-BY-SA">
          <p class="lead m-0">le site est placé sous licence Creative Commons CC-BY-SA</p>
        </div>
        <p>Le titulaire des droits autorise toute utilisation de l’œuvre originale (y compris à des fins commerciales)
          ainsi que la création d’œuvres dérivées, à condition qu’elles soient distribuées
          sous une licence identique à celle qui régit l’œuvre originale. </p>
        <p>Pour en savoir plus <a href="https://http://creativecommons.fr/" title="site de Creative Commons"> <i class="fas fa-external-link-square-alt"></i></a> </p>
        <h5>Crédits</h5>
        <p class="lead">Icones: NounProject <a href="https://thenounproject.com/" title="site de NounProject"><i class="fas fa-external-link-square-alt"></i></a></p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.images'))}}/divers/cookie.svg" alt="">
        <h5 class="mt-2">Cookies</h5>
      </div>
      <div class="pl-3">
        <p class="lead">Cette application n'utilise ni cookie traceur ni cookie de réseaux sociaux</p>
        <p>Les seuls cookies déposés sur votre ordinateurs sont indispensable au fonctionnement de l'application. Ils ne sont pas intrusifs et ne contiennent pas de données personnelles.</p>
        <p>L'application ne procède à aucune lecture de cookies tiers déposés par d'autres sites sur votre ordinateur.</p>
        <p>Un cookie de mesure d'audience est déposé sauf si vous l'avez refusé (cf. ci-dessous).</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.images'))}}/divers/rgpd.svg" alt="">
        <h5 class="mt-2">Protection des données personnelles (RGPD)</h5>
      </div>
      <div class="pl-3">
        <p class="lead">Panse-Bêtes ne stocke que très peu de données personnelles</p>
        <p class="bg-otorange p-1"><strong>Pour les utilisateurs disposant d'un identifiant ou qui ont demandé un identifiant</strong></p>
        <div class="ml-1">
          <p>Les données dont nous disposons sont : l'<strong>adresse de courriel</strong>, la profession et la région (si ces deux dernières données ont été renseignées).
           Le mot de passe est stocké sous forme cryptée: seul l'utilisateur connaît ce mot de passe.</p>
          <p>l'utilisateur qui ne souhaite plus figurer dans la liste des personnes disposant d'un identifiant devra envoyer un courriel à l'administratrice de Panse-Bêtes <a href="mailto:contact@panse-betes.fr ?subject=Demande de désinscription" title="cliquez pour écrire un mail"><i class="fas fa-envelope"></i></a> </p>
        </div>
        <p class="bg-otorange p-1"><strong>Pour les saisies qui ont été réalisées</strong></p>
        <div class="ml-1">
          <p>A l'exception des administrateurs du site, toutes les données saisies (nom de l'élevages, observations, alertes, etc.) ne sont accessibles qu'à l'utilisateur qui a créé la saisie.</p>
          <p>Si vous souhaitez que ces données ne soit pas potentiellement accessibles aux administrateurs du site, il faut supprimer la saisie une fois le pdf imprimé. Cette suppression entraîne une disparition complète des données.</p>
          <p>Il est possible que, dans un avenir plus ou moins lointain, un traitement statistique anonymisé soit réalisé sur les données saisies. En aucune cas les noms de l'élevage ou les informations de l'utilisateur connecté ne feront partie de ces analyses statistiques.</p>
        </div>
        <div class="border p-2 text-light bg-dark">
          Toutes demandes concernant les données personnelles, leur mode de gestion, la sécurité du stockage ou leur rectification peuvent être adressées à l'administratrice de Panse-Bêtes
          <a href="mailto:contact@panse-betes.fr ?subject=Au sujet des informations personnelles" title="cliquez pour écrire un mail">
            <i class="fas fa-envelope"></i>.
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="alert bg-otobleu d-flex">
        <img class="mr-3 img-40" src="{{asset(config('chemins.note'))}}/count_blanc.svg" alt="">
        <h5 class="mt-2">Suivi de la fréquentation du site</h5>
      </div>
      <div class="pl-3">
        <p class="lead">Nous avons mis en place un outil de suivi de la fréquentation de Panse-Bêtes afin de connaître l'utilisation de cet outil.</p>
        <p>Il s'agit d'un logiciel libre, nommé Matomo <a href="https://matomo.org/" title="site de Matomo"><i class="fas fa-external-link-square-alt"></i></a>, qui n'est pas intrusif, qui anonymise votre adresse IP et respecte la réglementation sur la protection de la vie privée.
          Pour plus d'information, vous pouvez consulter le site de la CNIL <a href="https://www.cnil.fr/fr/solutions-pour-les-cookies-de-mesure-daudience" title="Site de la CNIL"><i class="fas fa-external-link-square-alt"></i></a> </p>
          <p>Il vous est possible de décider de ne pas être suvi. Il vous suffit de décocher la case ci-dessous. Dans ce cas, ce serait sympa de nous dire ce que vous avez pensé de Panse-Bêtes en allant au menu <a href="{{route('contact')}}">"Nous contacter"</a>.</p>
          <iframe
          style="border: 0; width: 100%;"
          src="https://panse-betes.fr/matomo/index.php?module=CoreAdminHome&action=optOut&language=fr&backgroundColor=efeded&fontColor=&fontSize=15px&fontFamily=PT%20Sans">
        </iframe>
      </div>
    </div>
  </div>



@endsection
