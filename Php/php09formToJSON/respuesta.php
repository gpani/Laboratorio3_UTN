<?php
sleep(3);
if (isset($_POST['form'])) {
        
        $oRegistro = new stdClass();

        $oRegistro->idUsuario = $_POST['form']['idUsuario'];
        $oRegistro->login = $_POST['form']['login'];
        $oRegistro->apellido = $_POST['form']['apellido'];
        $oRegistro->nombres = $_POST['form']['nombres'];
        $oRegistro->fechaNac = $_POST['form']['fechaNac'];       

        echo "<p><strong>Contenido recibido pasado a JSON en el servidor</strong>: <code>" . json_encode($oRegistro) ."</code></p>";
} else {
        echo "<h2>ERROR EN DATOS RECIBIDOS</h2>";
}
?>