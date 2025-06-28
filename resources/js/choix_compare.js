verifie();
compte();
couleur();

$('.case').on('click', function() {
  verifie();
  compte();
  couleur();
})
// Fonction qui compte le nombre de cases cochées et qui active le bouton submit
// de la page compare.index si il y a au moins deux cases cochées, et le désactive
// dans le cas contraire
function verifie() {
  var check = [];
  $(":checked").each(function() {
    check.push($(this).val());
  });
  if(check.length > 1) {
    $("#btn_compare").prop('disabled', false);

  } else {
    $("#btn_compare").prop('disabled', true);

  }
}
// fonction qui compte de le nombre de cases cochées pour la comparaison des
// saisies
function compte() {
  var checkboxes = $('input:checkbox:checked').length;
  $('#nb').text(checkboxes);
}

function couleur() {
  if ($('#nb').text() < 2) {
    $("#nb_label").addClass('text-danger').removeClass('text-success')
  } else {
    $("#nb_label").addClass('text-success').removeClass('text-danger')
  }
}
