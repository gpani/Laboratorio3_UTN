<?php

include('../../datosConexionBDD.inc');

$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

if (!$connection) {
    $error = error_get_last();
    file_put_contents('errores.log', $error, FILE_APPEND);
    die("Connection failed. Error was: ". $error['message']);
} else {
    /* script de modificacion, se utiliza la consulta UPDATE

        recibe el articulo por metodo POST y modifica la fila de la tabla
        que coincida por codigo de articulo
    */
    $query = "UPDATE productos SET familia='" . $_POST['familia'] . "', um='" . $_POST['um'] . 
     "', descripcion='" . $_POST['descrip'] . "',fechaalta='" . $_POST['fechaAlta'] . "', saldostock=" . $_POST['saldoStock'] . 
     " WHERE codart='" . $_POST['codArt'] . "'";

    $result = pg_query($query);

    if($result) {
        echo "modif OK!";

    } else {
        die ("error query $query");
    }

    pg_close($connection);
}

?>
