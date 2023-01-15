<div>
  <p>Bonjour {{config('mail.contact.name')}},</p>
  <p>J'ai le plaisir de t'informer que {{$user->name}} vient de formuler
    un nouvel avis au sujet de Panse-Bêtes.</p>
  <p>Si tu est impatient.e de consulter cet avis au sujet de ce merveilleux outil
    qu'est Panse-Bêtes, alors n'hésite pas à aller voir ta
    <a href="https://acsa-santeanimale.fr/pansebetes/public/login"> page administration</a>.
  </p>
  <p></p>
  <p>Cordialement,</p>
  <p>Panse-Bêtes</p>
  <p></p>
  <img style="width:300px" src="{{asset(config('chemins.images'))}}/otoveil.jpeg" alt="">
</div>
