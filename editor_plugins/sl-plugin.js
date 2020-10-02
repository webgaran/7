(function() {
    tinymce.create('tinymce.plugins.sl_theme', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {

            ed.addButton('simple_btn', {
                title : 'Simple Button',
                cmd : 'simple_btn',
                image : url + '/simple_btn.jpg'
            });

            ed.addButton('showrecent', {
                title : 'Add recent posts shortcode',
                cmd : 'showrecent',
                image : url + '/recent.jpg'
            });

            ed.addCommand('simple_btn', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<span class="simple_btn">' + selected_text + '</span>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('showrecent', function() {
                var number = prompt("تعداد مطالب نشان داده شده را وارد کنيد "),
                    shortcode;
                if (number !== null) {
                    number = parseInt(number);
                    if (number > 0 && number <= 20) {
                        shortcode = '[recent-post number="' + number + '"/]';
                        ed.execCommand('mceInsertContent', 0, shortcode);
                    }
                    else {
                        alert("مقدار وارد شده معتبر نمي باشد");
                    }
                }
            });

        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname :'SL THEME Buttons',
                author : 'Kaivan Alimohammadi',
                authorurl :'http://7learn.com/',
                version : "1.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'sl_theme', tinymce.plugins.sl_theme );
})();