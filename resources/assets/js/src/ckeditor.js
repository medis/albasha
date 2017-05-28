if (typeof(CKEDITOR) != 'undefined') {
    CKEDITOR.disableAutoInline = true;
}

function checkAccess() {
    axios.get('/auth')
        .then(function(response) {
            $("div[contenteditable='true']" ).each(function( index ) {
                var content_id = $(this).attr('id');

                CKEDITOR.inline(content_id, {

                    on: {
                        blur: function( event ) {
                            var data = event.editor.getData();

                            bootbox.confirm("Would you like to save changes?", function(result){
                                if (result) {
                                    var link = '/page/' + content_id;
                                    axios.post(link, {data: data})
                                    .then(function(response) {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    }
                } );

            });
        })
        .catch(function(error) {});
}

$(document).ready(function() {
    if ($('#homepage_main_text').length) {
        checkAccess();
    }
});
