$(document).ready(function() {
    var PAGENAME = {
        main_page: {
            // Hier sind die die einzelnen Bereiche der Seiten, zB für die main page
            _init: function () {
                alert("main_page loaded");
            }
        },
        a_widget: {
            _init: function () {
                alert("a_widget loaded");
            }
        },
        _start: function () {
            // Aufrufen der _init Funktion der bestimmten Seite
            this[PAGE_TYPE]._init();

            // Durch Widgets gehen und deren _init Funktion ausführen
            $('[data-widget]').each(function(values){
                PAGENAME[$(this).data('widget')]._init();
            });
        }
    };

    // Seite starten
    PAGENAME._start();
});
