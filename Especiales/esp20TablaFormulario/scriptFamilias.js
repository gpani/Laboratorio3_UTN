
$(document).ready(function(){
    // cargo las familias desde un json 
    $.getJSON('../articulos.json', function(art) {
        for (key in art) {
            $('#fliaArticulo').append(new Option(art[key], key));
        }
    });
    // para mandar el formlario
    $('#btnEnviar').click(function(){
        $('#formCampos').attr('action', './respuesta.html').submit();
    });

});
