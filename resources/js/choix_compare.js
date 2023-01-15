verifie()

$('.case').on('click', function() {
  verifie()
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
