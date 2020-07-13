/* este script es para cargar las familias de articulos en el Select */
$(document).ready(function(){
    $.getJSON('../../../Especiales/articulos.json', function(art) {
        for (key in art) {
            $('#formFliaArticulo').append(new Option(art[key], key));
        }
    });
});
