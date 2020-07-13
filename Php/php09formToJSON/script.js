$(document).ready(function(){

    $('#contenedor').attr('class', 'contenedorActivo');
    $('#ventanaModal').attr('class', 'ventanaModalApagada');

    $('#abrirModal').click(function () {
        $('#contenedor').attr('class', 'contenedorDesactivado');
        $('#ventanaModal').attr('class', 'ventanaModalActivada');
        $('#pieModal').empty();
    });

    $('#cerrarModal').click(function(){
        $('#contenedor').attr('class', 'contenedorActivo');
        $('#ventanaModal').attr('class', 'ventanaModalApagada');
    });

    $('#btnEnviar').click(function(){
        
        if(!confirm('¿Seguro desea agregar registro?')) {
            return;
        }

        $('#pieModal').html('<h2>Esperando respuesta...</h2>');
       
        $.ajax({
            type: 'post',
            url: './respuesta.php',
            data: { 
                form: {
                    idUsuario: $('#idUsuario').val(),
                    login: $('#login').val(),
                    apellido: $('#apellido').val(),
                    nombres: $('#nombres').val(),
                    fechaNac: $('#fechaNac').val()
                }
            },
            success: function(respuesta, estado) {
                $('#pieModal').html("<p><strong>Estado: " + estado + "</strong></p>" + respuesta);
            }
        });
    });

});
