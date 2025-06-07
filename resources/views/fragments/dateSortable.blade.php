<!-- _FRAGMENT POUR AFFICHER UNE DATE FORMATTEE DANS UN TABLEAU
EN FOURNISSANT JUSTE LA VARIABLE date -->

{{(null !== $date ? (new Carbon\Carbon($date))->format('Y/m/d') : "") }}
