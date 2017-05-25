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
      var is_delete = $(this).hasClass('delete');
      bootbox.confirm(message, function(result){
        if (result) {
          if (is_delete) {
            axios.delete(link)
              .then(function(response) {
                location.reload();
              });
          }
          else {
            window.location = link;
          }
        }
      });
    });
  }
}
