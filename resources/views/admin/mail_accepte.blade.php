<div>
  <p>Bonjour {{$nouveau_user->name}},</p>

  <p>Nous avons le plaisir de vous confirmer votre inscription sur la liste des
    utilisateurs de Panse-Bêtes.
  </p>

  <p>Dès maintenant, vous pouvez vous connnecter à
    <a href="https://acsa-santeanimale.fr/pansebetes/public/login">Panse-Bêtes</a>
    en utilisant comme identifiant le mail <strong>{{$nouveau_user->email}}</strong>
    et le mot de passe que vous aviez donné lors de votre inscription.</p>

  <p>Nous vous souhaitons une bonne utilisation de l'application Panse-Bêtes.</p>

  <p>Cordialement,</p>

  <p>L'administratrice de Panse-Bêtes</p>

  <p></p>

  <img style="width:500px" src="{{asset(config('chemins.images'))}}/itab_otoveil_long.jpeg" alt="">

</div>
