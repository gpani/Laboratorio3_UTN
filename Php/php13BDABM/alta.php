<?php
/* 
este archivo recibe por metodo POST los datos de un articulo para dar de alta
en la tabla productos
*/

// datos de conexion para conectarse a la base de datos 
include('../datosConexionBDD.inc');

// conecta la BDD
$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

// si hay error, termina
if (!$connection) {
    $error = error_get_last();
    file_put_contents('errores.log', $error, FILE_APPEND);
    die("Connection failed. Error was: ". $error['message']);
} else {

    // leo los datos del articulo que llego por metodo POST
    $values = "'" . $_POST['codArt'] . "','" .  $_POST['familia'] . "','" .  $_POST['um'] . "','" .
        $_POST['descrip'] . "','" . $_POST['fechaAlta'] . "'," . $_POST['saldoStock'];

    // genero la consulta para insertar el articulo en la tabla
    $query = "INSERT INTO productos (codart,familia,um,descripcion,fechaalta,saldostock) VALUES ($values)";

    // ejecuto la consulta
    $result = pg_query($query);

    // aviso como salio la consulta
    if($result) {
        echo "alta OK!";
    } else {
        die ("error query $query");
    }
    
    pg_close($connection);
}

?>
