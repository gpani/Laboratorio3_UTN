<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
<?php
/* diferencia respecto al ejercicio de ABM

aca "protejo" la aplicacion, si el usuario no inicio sesion
no puede ver esta pagina y se lo envia al form de login
*/
session_start();
if (!isset($_SESSION['identificadorDeSesion'])) {
    /* si no existe, lo mando al form de login */
    header('location:../formDeLogin.html');
}

// si existe continuo cargando el html
/* el resto del html es igual */
?>
    <script src="../../../Especiales/jquery.js"></script>
    <script src="scriptFamilias.js"></script>
    <script src="script.js"></script>
    <div id="contenedor">
        <div class="encabezado">
            Articulos
            <div class="controles">
                <label class="textoPeq">Orden:</label><br><input readonly value="saldoStock" id="orden">
                <button class="boton" id="cargarDatos">Cargar Datos</button>
                <button class="boton" id="limpiar">Limpiar</button>
                <button class="boton" id="altaDato">Alta</button>
            </div>
        </div>
        <div class="contenedorTabla">
            <table id="tabla">
                <thead>
                    <tr>
                        <th campo-dato="codArt" id="codArt">CodArt</th>
                        <th campo-dato="familia" id="familia">Familia</th>
                        <th campo-dato="um" id="um">UM</th>
                        <th campo-dato="descripcion" id="descripcion">Descripción</th>
                        <th campo-dato="fechaAlta" id="fechaAlta">FechaAlta</th>
                        <th campo-dato="saldoStock" id="saldoStock">SaldoStock</th>
                        <th campo-dato="modificar" id="modificar">Modificar</th>
                        <th campo-dato="baja" id="baja">Baja</th>                        
                    </tr>
                    <tr>
                        <th campo-dato="codArt"><input id="fCodArt"></th>
                        <th campo-dato="familia"><input id="fFamilia"></th>
                        <th campo-dato="um"><input id="fUM"></th>
                        <th campo-dato="descripcion"><input id="fDescripcion"></th>
                        <th campo-dato="fechaAlta"><input id="fFechaAlta"></th>
                        <th campo-dato="saldoStock"></th>
                        <th campo-dato="fmodificar" id="fmodificar"></th>
                        <th campo-dato="fbaja" id="fbaja"></th>
                    </tr>
                </thead>
                <tbody id="cuerpoTabla">

                </tbody>
                <tfoot>
                    <tr>
                        <td>s CodArt</td>
                        <td>s Familia</td>
                        <td>s UM</td>
                        <td>s Descripción</td>
                        <td>s FechaAlta</td>
                        <td>s SaldoStock</td>
                        <td>s Modificar</td>
                        <td>s Baja</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="pie">
            <div id="cantArt" class="cantArt"></div>
            Pie
            <!-- boton para cerrar sesion -->
            <button class="boton" id="cerrarSesion">Cerrar Sesion</button>
        </div>
    </div>
    <div id="ventanaModal">
        <div class="encabezadoModal">Encabezado modal <button class="cerrarModal" id="cerrarModal">X</button></div>
        <div id="contenidoModal">
            <div class="encabezado">
                Formulario para ALTA - Artículos
            </div>
            <form class="cuerpo" id="formCampos">
                <div class="campo">
                    <br>
                    <label>Código de artículo:</label>
                    <br>
                    <input class="longInput" required type="text" id="formCodArt" name="codArt"
                        title="Complete este campo." />
                </div>
                <div class="campo">
                    <br>
                    <label>Familia de artículo:</label>
                    <br>
                    <select class="longInput" name="fliaArticulo" id="formFliaArticulo">
                    </select>
                </div>
                <div class="campo">
                    <br>
                    <label>Descripción:</label>
                    <br>
                    <input class="longInput" required type="text" id="formDescrip" name="descrip"
                        title="Complete este campo." />
                </div>
                <div class="campo">
                    <br>
                    <label>Fecha Alta:</label>
                    <br>
                    <input class="longInput" required type="date" id="formFechaAlta" name="fechaAlta"
                        title="Complete este campo." />
                </div>
                <div class="campo">
                        <br>
                        <label>UM:</label>
                        <br>
                        <input class="longInput" required type="text" id="formUM" name="formUM"
                            title="Complete este campo." />
                </div>
                <div class="campo">
                    <br>
                    <label>Saldo stock:</label>
                    <br>
                    <input class="longInput" required type="number" id="formStock" name="stock" title="Complete este campo."
                        value="0" />
                </div>
                <div class="campo">
                    <br>
                    <button type="button" class="botonForm" id="btnEnviar">Enviar</button>
                </div>
            </form>
            <div class="pie" id="formPie">
                Pie del formulario
            </div>
        </div>
    </div>
    <div id="ventanaModalMensaje">
        <div class="encabezadoModal">Encabezado modal <button class="cerrarModal" id="cerrarModalMensaje">X</button></div>
        <div id="contenidoModalMensaje" class="contenidoModal">

        </div>
    </div>
</body>

</html>