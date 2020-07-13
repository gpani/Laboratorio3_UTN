<?php

// inicia la conexion a la base de datos
include('../datosConexionBDD.inc');

$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

if (!$connection) {
    $error = error_get_last();
    file_put_contents('errores.log', $error, FILE_APPEND);
    die("Connection failed. Error was: ". $error['message']);
} else {

    /*
    borra un articulo de la tabla por su código de articulo.

    OJO: si hay mas de un articulo con el mismo codigo, los borra todos.
    para solucionar esto habria que configurar la tabla para que la columna
    codArt sea tipo indice y asi no me va a dejar insertar un articulo con
    codigo repetido
    */
    $query = "DELETE FROM productos WHERE codart='" . $_POST['codArt'] . "'";

    $result = pg_query($query);

    if($result) {
        echo "baja OK!";

    } else {
        die ("error query $query");
    }

    pg_close($connection);
}

?>
