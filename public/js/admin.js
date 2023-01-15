$(function() {
  // Modification d'un utilisateur
  $('.ligne').on('click', '.modifier', function() {
    var id = $(this).attr('id').split("_")[1];
    var nom = $('#nom_'+id).text();
    var email = $('#email_'+id).text();
    $.confirm({
      columnClass : 'large',
      type : 'green',
      title : "Modification d'utilisateur",
      content : '' +
        '<form action="" class="formName">' +
        '<div class = "form-group">' +
        '<label>Nom</label>' +
        '<input type="text" class = "nom form-control" value="'+nom+'" required />' +
        '</div><div class="form-group">' +
        '<label>Adresse mail</label>' +
        '<input type="text" class = "email form-control" value="'+email+'" required />' +
        '</div></form>',
        buttons : {
          formSubmit: {
            text : 'enregistrer',
            btnClass : 'btn-green',
            action : function(data) {
              var nom = this.$content.find('.nom').val();
              var email = this.$content.find('.email').val();
              if(verifChampsModif(nom, email) && verifEmail(email)) {
                modifie(id, nom, email);
              }
              else {
                return false;
              }
            }
          },
          cancel :  {
            text : "annuler",
            btnClass : 'btn-red',
            action : function() {

            }
          }
        }
      })
    })
  // Ajout d'un utilisateur valide
  $('#plus').on('click', function() {
    $.confirm({
      columnClass : 'large',
      type : 'green',
      title : 'Nouvel utilisateur',
      content : '' +
        '<form action="" class="formName">' +
        '<div class = "form-group">' +
        '<label>Nom</label>' +
        '<input type="text" placeholder="nom" class = "nom form-control" required />' +
        '</div><div class="form-group">' +
        '<label>Adresse mail</label>' +
        '<input type="text" placeholder="adresse mail" class = "email form-control" required />' +
        '</div><div class="form-group">' +
        '<label>Mot de passe (6 car. mini)</label>' +
        '<input type="password" placeholder="mot de passe" class = "mdp1 form-control" required />' +
        '</div><div class="form-group">' +
        '<label>Retapez le mot de passe (6 car. mini)</label>' +
        '<input type="password" placeholder="retapez le mot de passe" class = "mdp2 form-control" required />' +
        '</div></form>'+
        '<div class="form-group">'+
            '<select id="profession" class="custom-select" name="profession">'+
              '<option selected>Profession ?</option>'+
              '<option value="Eleveur">Eleveur</option>'+
              '<option value="Technicien">Technicien</option>'+
              '<option value="Animateur">Animateur</option>'+
              '<option value="Vétérinaire">Vétérinaire</option>'+
              '<option value="Enseignant">Enseignant</option>'+
              '<option value="Etudiant">Etudiant</option>'+
              '<option value="Autre">Autre</option>'+
            '</select>'+
          '</div><div class="form-group">'+
            '<select id="region" class="custom-select" name="region">'+
              '<option selected>Région ?</option>'+
              '<option value= "Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>'+
              '<option value= "Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>'+
              '<option value= "Bretagne">Bretagne</option>'+
              '<option value= "Centre-Val_de_Loire">Centre-Val de Loire</option>'+
              '<option value= "Corse">Corse</option>'+
              '<option value= "Grand_Est">Grand Est</option>'+
              '<option value= "Guadeloupe">Guadeloupe</option>'+
              '<option value= "Guyane">Guyane</option>'+
              '<option value= "Hauts-de-France">Hauts-de-France</option>'+
              '<option value= "Île-de-France">Île-de-France</option>'+
              '<option value= "La_Réunion">La Réunion</option>'+
              '<option value= "Martinique">Martinique</option>'+
              '<option value= "Mayotte">Mayotte</option>'+
              '<option value= "Normandie">Normandie</option>'+
              '<option value= "Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>'+
              '<option value= "Occitanie">Occitanie</option>'+
              '<option value= "Pays_de_la_Loire">Pays de la Loire</option>'+
              '<option value= "Provence-Alpes-Côte_d_Azur">Provence-Alpes-Côte d Azur</option>'+
              '<option value= "Hors_de_France">Hors de France</option>'+
            '</select>'+
        '</div>',
      buttons : {
        formSubmit: {
          text : 'enregistrer',
          btnClass : 'btn-green',
          action : function(data) {
            var nom = this.$content.find('.nom').val();
            var email = this.$content.find('.email').val();
            var mot_de_passe = this.$content.find('.mdp1').val();
            var retapez_votre_mot_de_passe = this.$content.find('.mdp2').val();
            var profession = this.$content.find('#profession option:selected').text();
            profession = (profession == "Profession ?" ? "non précisé" : profession); // si pas de saisie valeur 'non précisé'
            var region = this.$content.find('#region option:selected').text();
            region = (region == "Région ?" ? "non précisé" : region);// idem

            var captcha = "agriculture biologique"
            var valide = 1;
            if(verifChampsRemplis(nom, email, mot_de_passe, retapez_votre_mot_de_passe) && verifEmail(email) && verifMdpEgal(mot_de_passe, retapez_votre_mot_de_passe) && verifTailleMdp(mot_de_passe)) {
              envoi(nom, email, mot_de_passe, retapez_votre_mot_de_passe, valide, captcha, profession, region);
            }
            else {
              return false;
            }
          }
        },
        cancel :  {
          text : "annuler",
          btnClass : 'btn-red',
          action : function() {

          }
        }
      }
    })
  })

// suppression d'un utilisateur valide
  $('tr').on('click', '.supprimer', function() {
    var id = $(this).attr('id').split("_")[1];
    var ligne_id = '#ligne_'+id;
    var nom = $('#nom_'+id).html();
    var nombre_saisies = $('#saisies_'+id).html()
    //cas ou l'utilisateur a une saisie
    if(nombre_saisies > 0) {
      $.confirm({
        columnClass : 'large',
        type : 'red',
        theme : 'dark',
        title : "Suppression de "+nom+" !",
        content : '<p>Cet utilisateur.trice a effectué '+nombre_saisies+' saisie(s). </p>'+
          "<p>Si vous le supprimez <strong>toutes ses saisies seront aussi supprimées</strong>. " +
          "Mais vous pouvez choisir de transférer ses saisies à un autre utilisateur.trice</p>",
        buttons : {
          supprimer : {
            btnClass : 'btn-red',
            action: function() {
              supprimer(ligne_id, 'utilisateur/destroy/', id);
            },

          },
          transferer : {
            btnClass: 'btn-green',
            action: function() {
              transferer(id);
            }
          },
          annuler : {
            action: function() {
              console.log('annule');
            },
            btnClass: 'btn-dark'
          }
        }
      })

    }
    // cas ou l'utilisateur n'a pas de saisie
    else {

      $.confirm({
        columnClass : 'large',
        type : 'red',
        theme : 'dark',
        title : "Suppression de "+nom+" !",
        content : 'Etes-vous sûr de vouloir supprimer '+nom,
        buttons : {
          supprimer : function() {
            supprimer(ligne_id, 'utilisateur/destroy/', id);
          },
          annuler : function() {
          }
        }
      })
    }
  })

  function verifChampsRemplis(nom, email, mdp1, mdp2) {
    if(!nom || !email || !mdp1 || !mdp2) {
      alerte('Il faut remplir tous les champs');
      return false;
    }
    return true;
  }

  function verifChampsModif(nom, email) {
    if(!nom || !email) {
      alerte('Il faut remplir tous les champs');
      return false;
    }
    return true;  }

  function verifMdpEgal(mdp1, mdp2) {
    if(mdp1 !== mdp2) {
      alerte('les mots de passe ne concordent pas');
      return false;
    }
    return true;
  }

  function verifEmail(email) {
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

    if(!reg.test(email)) {
     alerte("l'adresse email n'est pas conforme")
     return false;
    }
    return true;
  }

  function verifTailleMdp(mdp) {
    if(mdp.length < 6) {
      alerte("Le mot de passe est trop court")
      return false;
    }
    return true;
  }

  function alerte(texte) {
    $.alert({
      type : 'red',
      theme : 'dark',
      title : 'Attention !',
      content : texte
    });
  }

  function envoi(nom, email, mot_de_passe, retapez_votre_mot_de_passe, valide, captcha, profession, region) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      url: 'utilisateur',
      data: {
        'nom' : nom,
        'email' : email,
        'mot_de_passe' : mot_de_passe,
        'retapez_votre_mot_de_passe' : retapez_votre_mot_de_passe,
        'valide': valide,
        'captcha': captcha,
        'profession': profession,
        'region': region
      },
      dataType: 'JSON',
      success: function (data) {
        creeLigne(data.id, data.nom, data.email);
        },
      error: function (e) {
            console.log(e.responseText);
        }
    });
  }

  function modifie(id, nom, email) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'PUT',
      url: 'utilisateur/'+id,
      data: {
        'nom' : nom,
        'email' : email,
      },
      dataType: 'JSON',
      success: function (data) {
        modifieLigne(id, nom, email);
        },
      error: function (e) {
            console.log(e.responseText);
        }
    });
  };


  function supprimer(ligne_id, url, id) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'DELETE',
      url: url+id,

      success: function (data) {
        $(ligne_id).remove();
        },
      error: function (e) {
            console.log(e.responseText);
        }
    });
  };

  function creeLigne(id, nom, email) {
    $('tbody#user').append('<tr><td id="nom_'+id+'" class="nom">'+nom+'</td>' +
              '<td id="email_'+id+'" class="modifEmail curseur">'+email+'</td>' +
              '<td id="saisies_'+id+'" class="text-center saisies">0</td>' +
              '<td id="admin_'+id+'" class="text-center">NON</td>' +
              '<td id="modifier_'+id+'" class="modifier cell-delmod">' +
                '<img src="'+document.location.origin+'/core/public/img/admin/modifie_gris.svg" alt="Modifier" title="Pour modifier ce nouvel utilisateur, il faut rafraichir la page (touche F5)">' +
              '</td>' +
              '<td id="moins_'+id+'" class="supprimer cell-delmod" title="Pour supprimer ce nouvel utilisateur, il faut rafraichir la page (touche F5)">' +
                '<img src="'+document.location.origin+'/core/public/img/admin/moins_gris.svg" alt="Supprimer" >' +
              '</td></tr>');
  }

  function modifieLigne(id, nom, email) {
    $('#nom_'+id).html(nom);
    $('#email_'+id).html(email);
  }

  function transferer(id) {
    $.confirm({
      columnClass: 'large',
      theme : 'dark',
      type : 'green',
      buttons : {
        annuler : function(){}
      },
      content : function() {
        var self = this;
        return $.ajax({
          url: 'api/tousSauf/'+id,
          dataType: 'json',
          method: 'get'
        }).done(function(response){
          self.setTitle("Cliquer sur l'utilisateur choisi:")

          $.each(JSON.parse(response), function(key, val) {
            self.setContentAppend(
              '<div id="'+val.id+'" user="'+id+'" class="nom curseur">'+val.name+'</div>');
          })

        }).fail(function(){
          self.setContent('Y eu une couille dans le pâté')
        })
      },
      onContentReady: function () {
          // when content is fetched & rendered in DOM
          $('.nom').on('click', function() {
              var ancien_user = $(this).attr('user');
              var nouveau_user = $(this).attr('id');
              $.ajax({
                url: 'api/changeSaisieUser/'+ancien_user+'/'+nouveau_user,
                dataType: 'json',
                method: 'get'
              }).done(function(response){
                supprimer(ancien_user);
                $.alert({
                  columnClass: 'large',
                  theme: 'supervan',
                  type: 'green',
                  title: "C'est fait",
                  content: "déplacement des saisies & suppression d'un utilisateur",
                  buttons: {
                    Fermer: {
                      btnClass: 'btn-green',
                      action: function() {
                        location.reload();
                      }
                    }
                  }
                })
              })
          })
        }
    });
  }

// Supprimer directement les inscriptions à qui on ne répond pas
  $('.ligne_nonvalide').on('click', '.destroy', function(){
    var nonvalide_id = $(this).attr('id').split('_')[1];
    var nom = $('#nomNonValide_'+nonvalide_id).html();
    var ligne_id = '#ligneNonValide_'+nonvalide_id;
    var url = 'utilisateur/destroy/';
    $.confirm({
      columnClass : 'large',
      type : 'red',
      theme : 'dark',
      title : "Suppression de "+nom+" !",
      content : 'Etes-vous sûr de vouloir supprimer définitivement '+nom,
      buttons : {
        supprimer : function() {
          supprimer(ligne_id, url, nonvalide_id);
        },
        annuler : function() {
        }
      }
    })
  });

// Valide un utilisateur qui s'est inscrit et que l'on garde
  $('.ligne_nonvalide').on('click', '.garder', function() {
    var inscription_id = $(this).attr('id').split('_')[1];

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: 'administration/valide/'+inscription_id,
      dataType: 'JSON',
      success: function (data) {
          creeLigne(data.id, data.nom, data.email);
          $('#ligneNonValide_'+data.id).remove();
      },
      error: function (e) {
            console.log(e.responseText);
      }
    });
  });

})
