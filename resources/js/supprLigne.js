// Fonction d'appel d'une boite de dialogue quand on veut supprimer quelque chose (analyse, personne, etc.)
$(function() {

  $('.suppr').on('click', function(event) {
    event.preventDefault();
    var form_id = "#"+$(this).attr('id');
console.log(form_id);
    $.confirm({
      theme : 'dark',
      type : 'red',
      typeAnimated: 'true',
      title: $(this).attr('titre'), // on récupère le texte de la boite
      content : $(this).attr('texte'), // de dialogue dans les attributs titre et texte (manip pour la multilingue)
      buttons : {
        oui: {
          text : 'oui',
          btnClass : 'btn-red',
          keys : ['enter'],
          action : function() {

            $(form_id).submit();

          },
        },
        non: {
          btnClass : "btn-secondary",
          keys : ['esc']
        }
      }
    })
  });

})
