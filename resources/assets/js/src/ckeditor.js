CKEDITOR.disableAutoInline = true;

$(document).ready(function() {
    $("div[contenteditable='true']" ).each(function( index ) {
        var content_id = $(this).attr('id');

        CKEDITOR.inline(content_id, {
            //format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',

            on: {
                blur: function( event ) {
                    var data = event.editor.getData();
                    console.log(data);
                    // Do sth with your data...
                }
            }
        } );

    });
});