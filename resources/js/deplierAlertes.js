$(function() {

  // déplier les alertes
      function deplie(id) {

        var alerte_id = id.split('_')[1];

        $('#origine_'+alerte_id).fadeToggle(); // déplie la liste des alertes

        $.each($('.ouvert'), function() {
              if($(this).attr('class') == "non-affiche ouvert" && $(this).attr('id') !== 'origine_'+alerte_id)
                  {
                      $(this).fadeToggle(100);
                      $(this).toggleClass('ouvert');
                  }
          })

          $('#origine_'+alerte_id).toggleClass('ouvert');
      }
  // Quand on clique sur afficher, ça se déplie
      $('.afficher').on('click', function (){
          var id = $(this).attr('id');
          deplie(id);
      });
  // Pareil quand on clique sur déplie
      $('.deplie').on('click', function() {
          var id = $(this).attr('id');
          deplie(id);
      });

})
