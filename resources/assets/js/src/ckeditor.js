axios.post('/api/auth')
    .then(function(response) {
        console.log('authenticated');
    })
    .catch(function(error) {
        console.log('not auth');
    });

CKEDITOR.disableAutoInline = true;

$(document).ready(function() {
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
});