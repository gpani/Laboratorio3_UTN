const MODO_ALTA = 1;
const MODO_MODIF= 2;
var modo;
var data;

/* funcion que se ejecuta al cliquear el boton Modificar
   de un articulo, recibe su codigo por parametro y 
   abre el formulario para modificar */
function modificarArticulo(cod){
    var encontrado = false;
    data.forEach(fila => {
        if(fila['codArt'] == cod){
            modo = MODO_MODIF;
            $("#formCodArt").val(fila['codArt']);
            $("#formFliaArticulo").val(fila['familia']);
            $("#formUM").val(fila['um']);
            $("#formDescrip").val(fila['descripcion']);
            $("#formFechaAlta").val(fila['fechaAlta']);
            $("#formStock").val(fila['saldoStock']);
            $('#contenedor').attr('class', 'contenedorDesactivado');
            $('#ventanaModal').attr('class', 'ventanaModalActivada');
            encontrado = true;
            return;
        }
    });
    if (!encontrado){
        alert("Artículo no encontrado!");
    }
}

/* funcion que abre el modal para mostrar un mensaje */
function mostrarMensaje(mensaje){
    $("#contenidoModalMensaje").html("<p>" + mensaje + "</p>");
    $('#ventanaModalMensaje').attr('class', 'ventanaModalMensajeActivada');
}

/* funcion para dar de baja un articulo, se ejecuta cuando el usuario
hace clic en el boton Baja, recibe su codigo como parametro  */
function bajaArticulo(cod){
    if (!confirm("Va a dar de baja " + cod + ", seguro?")) {
        return;
    }
    /* ejecuta request ajax a baja.php con el codigo de articulo
    a eliminar */
    $.ajax({
        type: 'post',
        url: './baja.php',
        data: {
            codArt: cod
        },
        success: function(data, estado) {
            console.log(estado);
            console.log(data);
            mostrarMensaje(data + " cod. " + cod);
            limpiarTabla();
            cargarTabla();
        }
    });
}

/* funcion que vacia la tabla */
function limpiarTabla(){
    $('#cuerpoTabla').empty();
    $('#cantArt').empty();
}

/* funcion que carga la tabla: hace la consulta a articulosJSON.php
enviando tambien el orden y los filtros por metodo GET
*/
function cargarTabla() {
    var tabla = $('#cuerpoTabla');
    tabla.html('<h3>Esperando respuesta...</h3>');
    $.ajax({
        type: 'get',
        url: './articulosJSON.php',
        data: {
            /* envio tanto el orden como los filtros que quiero aplicar */
            orden: $("#orden").val(), 
            fCodArt: $("#fCodArt").val(),
            fFamilia: $("#fFamilia").val(),
            fUM: $("#fUM").val(),
            fDescripcion: $("#fDescripcion").val(),
            fFechaAlta: $("#fFechaAlta").val()
        },
        /* cuando me llega el JSON creo las filas y celdas */
        success: function(art, estado) {
            console.log(art);
            data = JSON.parse(art)['data'];
            tabla.empty();
            tabla = document.getElementById('cuerpoTabla'); 
            /* recorro los datos recibidos */
            data.forEach(fila => {
                /* armo la fila */
                tr = document.createElement('tr'); 
                for (key in fila) {
                    /* armo cada celda */
                    td = document.createElement('td');
                    td.setAttribute("campo-dato", key);
                    td.innerHTML = fila[key];
                    /* agrego la celda a la fila */
                    tr.appendChild(td);
                }
                /* agrego celdas con botones para modificacion y baja */
                td = document.createElement('td');
                /* cada boton de Modificar llama a la funcion
                   modificarArticulo con el codigo del articulo */
                td.innerHTML = "<button class=\"botonFila\" onclick=\"modificarArticulo('" + fila['codArt'] + "')\">Modificar</button>";
                tr.appendChild(td);
                td = document.createElement('td');
                /* cada boton de Baja llama a la funcion
                   bajaArticulo con el codigo del articulo */
                td.innerHTML = "<button class=\"botonFila\" onclick=\"bajaArticulo('" + fila['codArt'] + "')\">Baja</button>";
                tr.appendChild(td);
                /* Agrega fila a la tabla */
                tabla.appendChild(tr);
            });
            $('#cantArt').html('<p>Cant. registros: ' + data.length + '</p>');
        }
    });
}

/* todo esto se ejecuta cuando se termina de cargar la pagina */
$(document).ready(function(){
    /* oculta modal */
    $('#contenedor').attr('class', 'contenedorActivo');
    $('#ventanaModal').attr('class', 'ventanaModalApagada');
    $('#ventanaModalMensaje').attr('class', 'ventanaModalMensajeApagada');

    /* ver modal para alta */
    $('#altaDato').click(function () {
        modo = MODO_ALTA;
        $('#contenedor').attr('class', 'contenedorDesactivado');
        $('#ventanaModal').attr('class', 'ventanaModalActivada');
        $('#btnEnviar').prop('disabled',true);
    });

    /* cerrar modal de formulario */
    $('#cerrarModal').click(function(){
        $('#contenedor').attr('class', 'contenedorActivo');
        $('#ventanaModal').attr('class', 'ventanaModalApagada');
    });
    
    /* cerrar modal de mensaje */
    $('#cerrarModalMensaje').click(function(){
        $('#ventanaModalMensaje').attr('class', 'ventanaModalMensajeApagada');
    });

    $('#contenedor').attr('class', 'contenedorActivo');

    /* cargar datos */
    $("#cargarDatos").click(function () {
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por codigo de articulo */
    $('#codArt').click(function () {
        $("#orden").val('codArt');
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por familia */
    $('#familia').click(function () {
        $("#orden").val('familia');
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por unidad */
    $('#um').click(function () {
        $("#orden").val('um');
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por descripcion */
    $('#descripcion').click(function () {
        $("#orden").val('descripcion');
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por fecha de alta */
    $('#fechaAlta').click(function () {
        $("#orden").val('fechaAlta');
        limpiarTabla();
        cargarTabla();
    });

    /* cargar datos con orden por descripcion */
    $('#saldoStock').click(function () {
        $("#orden").val('saldoStock');
        limpiarTabla();
        cargarTabla();
    });

    $("#limpiar").click(limpiarTabla);

    /* funcion para validar el form de alta/modificacion */
    function formValido(){
        if( $("#formCodArt").val() == "" ||
            $("#formFliaArticulo").val() == "" ||
            $("#formDescrip").val() == "" || 
            $("#formUM").val() == "" || 
            $("#formStock").val() <= 0 || 
            !$("#formFechaAlta").val() ) {
            $("#btnEnviar").prop('disabled', true);
        } else {
            $("#btnEnviar").prop('disabled', false);
        }
    }

    /* para limpiar el form */
    function limpiarForm(){
        $("#formCodArt").val('');
        $("#formFliaArticulo").val('');
        $("#formUM").val('');
        $("#formDescrip").val('');
        $("#formFechaAlta").val('');
        $("#formStock").val(0);
        $("#formPie").html('Pie del formulario');
    }

    /* cada vez que se modifica un campo del form, se lo valida */
    $("#formCodArt").keyup(formValido);
    $("#formFliaArticulo").keyup(formValido);
    $("#formDescrip").keyup(formValido);
    $("#formStock").change(formValido);
    $("#formFechaAlta").change(formValido);
    $("#formUM").change(formValido);

    /* enviar formulario para alta o modificacion según correspnda */
    $("#btnEnviar").click(function(){
        if (!confirm("Seguro?")) {
            return;
        }
        $.ajax({
            type: 'post',
            /* si es para dar de ALTA, uso alta.php, si es para MODIFICAR
            uso modif.php */
            url: modo == MODO_ALTA ? './alta.php' : './modif.php',
            data: {
                codArt:    $("#formCodArt").val(), 
                familia:   $("#formFliaArticulo").val(),
                um:        $("#formUM").val(),
                descrip:   $("#formDescrip").val(),
                fechaAlta: $("#formFechaAlta").val(),
                saldoStock:$("#formStock").val()
            },
            /* muestro el modal de mensaje con el resultado */
            success: function(data, estado) {
                console.log(estado);
                console.log(data);
                mostrarMensaje(data + " cod. " + $("#formCodArt").val());
                limpiarForm();
                $("#formPie").html("<p>Estado: " + estado + ". " + data + "</p>");
                limpiarTabla();
                cargarTabla();
            }
        });
    });

    /* cerrar sesion*/
    $('#cerrarSesion').click(function() {
        /* manda al usuario al php que borra los datos de sesion */
        location.href="../destruirSesion.php";
    });
});
