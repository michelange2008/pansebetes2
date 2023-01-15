$(function() {
  // Alerte + ajax pour afficher les questions cochées
    $('.affiche-origine').on('click', function(){

      var url_actuelle = window.location.href.match(/^.*\//);

      var url = url_actuelle.toString().replace('saisie', 'api');
      url = url + 'originesSalerte/' + $(this).attr('salerte_id');
      console.log(url);

      $.alert({
        closeIcon: true,
        columnClass: 'large',
        theme: 'dark',
        animation : 'none',
        content: function () {
            var self = this;
            return $.ajax({
                url: url,
                dataType: 'json',
                method: 'get'
            }).done(function (response) {
              var ligne = new Array();
              var i = 0
              $.each(response, function(key, val){

                ligne[i] = '<p>'+val+'</p>';
                i++;
              })
                self.setContentPrepend('<div class="bg-success">')
                self.setContent(ligne);
                self.setContentAppend('</div>')
                self.setTitle("");
            }).fail(function(response){
                self.setTitle('Désolé');
                self.setContent('Il y a eu un problème');
            });
        },
      });
    });


})
