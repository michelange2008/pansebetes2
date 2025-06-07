$(function () {
// déplier les origines
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
// Alerte + ajax pour afficher les questions cochées
  $('.affiche-origine').on('click', function(){
    var alerte_id = $(this).attr('id').split('_')[2];
    var route = $('#route_'+alerte_id).attr('action');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.confirm({
      columnClass: 'large',
      theme: 'dark',
      buttons: {
        fermer: function(){
        },
      },
      content: function () {
          var self = this;
          return $.ajax({
              url: route,
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
              self.setTitle("Questions cochées");
          }).fail(function(response){
              self.setTitle('Désolé');
              self.setContent('Il y a eu un problème');
          });
      },
    });
  });

// suppression d'une saisie
  $('.supprime').on('click', function(e){
    var id = '#' + $(this).attr('id');
    console.log(id);
    e.preventDefault();
    $.confirm({
        title: "Suppression",
        content: "Etes-vous sûr.e.s de vouloir supprimer définitivement cette saisie ?",
        type: 'red',
        columnClass: 'medium',
        theme: 'dark',
        buttons: {
            supprimer:{
              btnClass: 'btn-red',
              keys : ['enter'],
              action: function () {
                window.location.href = $(id).attr('href');
              }
            },
            annuler: {
              keys : ['esc'],
              action:function () {
              },
            }
        }
    });
  });
// Nom pour une nouvelle saisie
  $('.nouvelle-saisie-item').on('click', function(e) {
    var espece_id = $(this).attr('id').split('_')[1];
    var route = $(this).attr('route');
    nouvelleSaisie(route, $(this).attr('name'), espece_id);
  });


  function nouvelleSaisie(route, nom, espece_id) {
    $.confirm ({
      columnClass: 'large',
      title: 'Nouvelle saisie',
      content: '' +
      '<form action="" class="formName">' +
      '<div class="form-group">' +
      '<label>Si l\'élevage n\'appartient pas à la personne connectée, saisir son nom, sinon cliquez simplement sur Ok</label>' +
      '<input type="text" placeholder='+nom+' class="name form-control" required />' +
      '</div>' +
      '</form>',
      buttons: {
        formSubmit: {
        text: 'Ok',
        btnClass: 'btn-blue',
        action: function () {
            var name = this.$content.find('.name').val();
            if(!name){
                var name = nom;
            }
            window.location.href = route+'/saisie/nouvelle/'+name+'/'+espece_id;
        }
      },
      annuler: function () {
        //close
      },
    },
    onContentReady: function () {
        // bind to events
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
        });
      }
    })
  };
// Espèces non finies
  $('.choix').on('click', function(e){

    var espece_nom = $(this).attr('id');

    $.alert({
      columnClass: 'large',
      theme: "dark",
      title: "Désolé !",
      content: "Le travail pour les <strong>"+espece_nom+"</strong> est encore en cours",
      buttons : {
        fermer : {
          text: "fermer",
          keys : ['enter', 'esc'],
          btnClass : 'btn-red',

        }
      },
    });

  });

// Bascule voir le mot de passe
$('.oeil').on('click', function() {
  $(this).toggleClass('oeil-ouvert');
  $(this).toggleClass('oeil-ferme');
  var type = $('#password').attr('type');
  if(type === 'password') {
    console.log(type);
    $('#password').attr('type', "text");
  }
  else {
    $('#password').attr('type', "password");
  }
});
