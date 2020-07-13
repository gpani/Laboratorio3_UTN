
// cuando la pagina termina de cargar (ready) ejecuto el siguente codigo 
$(document).ready(function(){
    // leo el archivo json y mediante una funcion, recorro sus elementos y creo las opciones 
    // que va en el selector de familia de articulos  
    $.getJSON('../articulos.json', function(art) {
        for (key in art) {
            $('#fliaArticulo').append(new Option(art[key], key));
        }    
    });

    // al hacer clic en el boton enviar envio el formulario
    $('#btnEnviar').click(function(){
        $('#formCampos').attr('action', './respuesta.html').submit();
    });
});
