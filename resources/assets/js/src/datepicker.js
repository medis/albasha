(function($) {
  if ($('#datetimepicker').length) {
    var moment = require('moment');

    $(document).ready(function() {
      $('#datetimepicker').datetimepicker({
        minDate: moment(),
        stepping: 15
      });
    })
  }
})(jQuery);