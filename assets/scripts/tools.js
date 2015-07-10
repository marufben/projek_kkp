'use strict';
    
 var flipkey = function() {

    //Aplicar flip
    $(window).ready(function () {
        $('.magazine').turn({
            display: 'double',
            acceleration: true,
            gradients: !$.isTouch,
            elevation: 50,
            when: {
                turned: function (e, page) { }
            }
        });
    });

    //Evento Presionar tecla

    $(window).bind('keydown', function (e) {
        if (e.keyCode == 37 )
            $('.magazine').turn('previous');
        else if (e.keyCode == 39)
            $('.magazine').turn('next');
    });

}


var previous = function() {

    $('.magazine').turn('previous');

}

var next = function() {

    $('.magazine').turn('next');

}

// Renderizar Pag
var renderPage = function(num, hoja) {
    pdfDoc.getPage(num).then(function (page) {
        var viewport = page.getViewport(scale);
        hoja.height = viewport.height;
        hoja.width = viewport.width;
        var renderContext = {
            canvasContext: hoja.getContext('2d'),
            viewport: viewport
        };
        page.render(renderContext);
    });
}

// Pasar parametro por Url 
var getUrlVars = function() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

//Cargando pag
var demoDisplay = function() {
    document.getElementById("carga").style.display = "none";

}

   



