
jQuery(document).ready(function($) {
  $('.popup-div-trigger').click(function() {
    $('#popup-div').show();
  });
  $('#popup-div').click(function(e) {
    if (e.target.id == "popup-div") {
      $(this).hide();
    }
  });
});
