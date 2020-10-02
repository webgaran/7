jQuery(document).ready(function ($) {
    var custom_uploader;
    $(document).on('click', '.select-uploader', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $target = $this.data('target');
        var $target_type = $this.data('target-type');
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب تصویر',
            button: {
                text: 'انتخاب تصویر'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            attachment = custom_uploader.state().get('selection').first().toJSON();

            switch(true){

                case $target_type === 'image' :
                    $('#' + $target).attr('src',attachment.url);
                    $('#' + $target+'_input').val(attachment.url);
                    break;
                case $target_type === 'textbox':
                    $('#' + $target).val(attachment.url);
                    break;


            }
        });
        //Open the uploader dialog
        custom_uploader.open();
    });

});