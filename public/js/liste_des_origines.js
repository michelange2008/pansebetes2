$(function() {
  $('.dd').nestable(

  );

  $("#bascule").on('click', function() {
    $('#titreCat').fadeToggle(0);
    $('#titrePol').fadeToggle(0);
    $('#parCategorie').fadeToggle(0);
    $('#parPole').fadeToggle(0);
    $('#aideBascule').fadeToggle(0);
    $('#aideDragDrop').fadeToggle(0);
  })
})
