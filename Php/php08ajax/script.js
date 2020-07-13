$(document).ready(function(){

    $('#encriptar').click(function(){
   
        $('#resultados').empty();
        $('#resultados').addClass("estiloRecibiendo");
        $('#resultados').html("<h2>Esperando respuesta...</h2>");
        $('#estado').empty();
        $('#estado').append("<h4>Estado del requerimiento:</h4>");
        
        $.ajax({
            type: 'post',
            url: './respuesta.php',
            data: { texto: $('#texto').val() },
            success: function(respuesta, estado) {
                $('#resultados').removeClass("estiloRecibiendo");
                $('#resultados').html("<h2>Resultado: </h2>"+ respuesta);
                $('#estado').append("<h4>"+estado+"</h4>");
            }
        });
    });


});