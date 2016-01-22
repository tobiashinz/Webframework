$(document).ready(function () {
    var PAGENAME = {
        main_page: {
            // this is a page on the site
            _init: function () {
                alert('main_page loaded');
            }
        },
        a_widget: {
            _init: function () {
                // alert('a_widget loaded');
            }
        },
        _start: function () {
            // call init() of page
            this[PAGE_TYPE]._init();

            // loop through widgets and call its _init()
            $('[data-widget]').each(function (values) {
                PAGENAME[$(this).data('widget')]._init();
            });
        }
    };

    // Here we go, sart site
    PAGENAME._start();
});
