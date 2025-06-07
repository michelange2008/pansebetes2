// fonction pour afficher l'accordeon
$(document).ready(function() {
    $('.ziehharmonika').ziehharmonika({
      collapsible: true,
      prefix: ''
    });
    $('.ziehharmonika h3:eq(0)').ziehharmonika('open', true);
  });
