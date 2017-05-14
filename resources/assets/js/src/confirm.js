var bootbox = require('bootbox');

$(document).ready(function() {
  applyConfirmDialog();
});

function applyConfirmDialog() {
  if ($('a[data-confirm]').length) {
    $('a[data-confirm]').click(function(event) {
      event.preventDefault();
      var link = $(this).attr('href');
      var message = $(this).attr('data-confirm');
      bootbox.confirm(message, function(result){
        if (result) {
          window.location = link;
        }
      });
    });
  }
}
