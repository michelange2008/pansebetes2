{{-- s'appelle avec le raccourci @enregistreAnnule(['nomBouton' => $nomBouton]) --}}

@include('fragments.boutonEnregistrer', ['nomBouton' => $nomBouton ?? 'boutons.save'])

@include('fragments.boutonAnnule', ['route' => $route ?? url()->previous()])
