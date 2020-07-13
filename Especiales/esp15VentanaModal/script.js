
$(document).ready(function(){
    // uso la funcion attr para setear la clase del elemento y su estilo
    $('#contenedor').attr('class', 'contenedorActivo');
    $('#ventanaModal').attr('class', 'ventanaModalApagada');

    $('#mostrarModal').click(function () {
        $('#contenedor').attr('class', 'contenedorDesactivado');
        $('#ventanaModal').attr('class', 'ventanaModalActivada');
    });

    $('#cerrarModal').click(function(){
        $('#contenedor').attr('class', 'contenedorActivo');
        $('#ventanaModal').attr('class', 'ventanaModalApagada');
    });
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
