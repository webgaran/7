function getSelectedContent(ed, str){
    var selected = ed.selection.getContent({format: 'text'})
    var length = selected.length
    if(length <= 0 ){
        return str;
    }else{
        return selected;
    }
}
(function () {
    tinymce.PluginManager.add('shortcodeSelector', function (ed, url) {
        ed.addButton('shortcodeSelector', {
            text: 'شورتکدها',
            icon: false,
            type: 'menubutton',
            menu: [{
                text: 'عنوان',
                onclick: function () {
                    ed.insertContent('[title]' + getSelectedContent(ed,"عنوان را وارد کنید") + '[/title]' + '<br>');
                }
            },
                {
                    text: 'محتوای مخصوص اعضا',
                    onclick: function () {
                        ed.insertContent('[member]' + getSelectedContent(ed,"محتوا را مشخص کنید") + '[/member]' + '<br>');
                    }
                },
                {
                    text: 'لینک دانلود',
                    onclick: function () {
                        ed.insertContent('[dl]' + getSelectedContent(ed,"محتوا را مشخص کنید") + '[/dl]' + '<br>');
                    }
                },
                {
                    text:'زیر منو',
                    menu:[
                        {
                            text:'زیر منوی اول',
                            onclick:function () {
                                ed.insertContent('[submenu]' + getSelectedContent(ed,"محتوا را مشخص کنید") + '[/submenu]' + '<br>');

                            }
                        }
                    ]
                }
            ]
        });
    });
})();