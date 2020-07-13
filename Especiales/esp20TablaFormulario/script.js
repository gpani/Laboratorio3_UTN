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


    // funcion que carga datos en la tabla
    $("#cargarDatos").click(function () {
        // leo el json con los productos y recorro el vector creando filas para la tabla 
        $.getJSON('../productos.json', function(datos) {
            var tabla = document.getElementById('cuerpoTabla');
            // cargo el vector con los articulos
            art = datos['datos'];
            // recorro el vector 
            art.forEach(fila => {
                // creo un elemento fila tr 
                tr = document.createElement('tr');
                
                // luego para cada campo del articulo creo una celda y la  agrego a la fila 
                for (key in fila) {
                    // creo celda td 
                    td = document.createElement('td');
                    // le asigno el atributo campo dato 
                    td.setAttribute("campo-dato", key);
                    // le asigno el contenido al elemento celda 
                    td.innerHTML = fila[key];
                    // agrego la celda td a la fila tr
                    tr.appendChild(td);
                }
                // una vez que tengo la fila tr creada la agrego a la tabla
                tabla.appendChild(tr);
            });
        });
    });

    // para limpiar tabla
    $("#limpiar").click(function (){
        var nodo = document.getElementById("cuerpoTabla");

        while (nodo.firstChild) {
            nodo.removeChild(nodo.lastChild);
        }
    })
});
