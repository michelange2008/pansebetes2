<div>
  <p>Bonjour {{env('MAIL_FROM_NAME')}},</p>
  
  <p>J'ai le plaisir de t'informer qu'une nouvelle personne souhaiterait voir
    sa demande d'identifiant validée.</p>
  <p>Il s'agit de</p>

  <ul>
    <li>Nom: {{$nouveau_user->name}}</li>
    <li>Profession: {{$nouveau_user->profession->nom}}</li>
    <li>Région: {{$nouveau_user->region->nom}}</li>
  </ul>

  <p>
    Il/Elle est sûrement très impatient.e de pouvoir utiliser ce merveilleux outil
    qu'est Panse-Bêtes, alors n'hésite pas à aller valider son inscription dans ta
    <a href="https://acsa-santeanimale.fr/pansebetes/public/login"> page administration</a>.
  </p>

  <p></p>

  <p>Cordialement,</p>

  <p>Panse-Bêtes</p>

  <p></p>

  <img style="width:300px" src="{{asset(config('chemins.images'))}}/otoveil.jpeg" alt="">

</div>
