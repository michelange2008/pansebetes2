// import './bootstrap';
//
// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();

// require('@fontawesome/fontawesome-free/js/all.js');
require('./deplierAlertes.js')
require('./afficherOrigines.js')
require('./supprLigne')
require('./choix_compare.js')
// require( './bootstrap-table.min.js');
// require( './bootstrap-table-accent-neutralise.min.js');
// require( './bootstrap-table-fr-FR.min.js');

$(function() {

  $('#table').bootstrapTable({
    locale: 'fr-FR'
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // $.validate({
  //   validateHiddenInputs: true
  // });


  // $(function () {
  //   $('[data-toggle="tooltip"]').tooltip()
  // })

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
      console.log("coucou");
      var espece_id = $(this).attr('id').split('_')[1];
      var route = $(this).attr('route');
      console.log(route);
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


// MENU AIDE
  $('#aide-rond').fadeIn().draggable({
    containment: '#aide',
    cursor: 'move',
    snap: '#aide'
  });

  $('.close').on('click', function() {
    $('.aide-contenu').fadeOut();
  })

  $('.aide-bouton').on('focusout', function() {
    $('.aide-contenu').fadeOut();
  })

  $('.aide-bouton').on('click', function() {
    $('.aide-contenu').fadeToggle();
  })
  $('.aide-bouton').on('blur', function() {
    $('.aide-contenu').fadeToggle();
  })
  $('#affiche-texte-d-1').on('click', function() {
    $('#texte-d-1').fadeToggle(0);
    $('#texte-d-2').fadeToggle(0);
  })
  $('#affiche-texte-d-2').on('click', function() {
    $('#texte-d-2').fadeToggle(0);
    $('#texte-d-1').fadeToggle(0);
  })
  $('#affiche-texte-s-1').on('click', function() {
    $('#texte-s-1').fadeToggle(0);
    $('#texte-s-2').fadeToggle(0);
  })
  $('#affiche-texte-s-2').on('click', function() {
    console.log('coucou');
    $('#texte-s-2').fadeToggle(0);
    $('#texte-s-1').fadeToggle(0);
  })
// MENU ROND
  $('.bouton-rond').on('click', function() {
    $('.menu-item').fadeToggle();
    $('.aide-contenu').fadeOut();
  });
  $('.menu-item').on('click', function() {
    $('.menu-item').fadeToggle();
    var espece_id = $(this).attr('id').split('_')[1];
    var route = $(this).attr('route');
    nouvelleSaisie(route, $(this).attr('name'), espece_id);
  })

})
