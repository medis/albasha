(function($) {
  
  if ($('a[data-confirm]').length) {

    var bootbox = require('bootbox');

    $(document).ready(function() {
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
    });
  }

})(jQuery);