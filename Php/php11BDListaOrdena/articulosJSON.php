<?php

include('../datosConexionBDD.inc');

$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

if (!$connection) {
    $error = error_get_last();
    file_put_contents('errores.log', $error, FILE_APPEND);
    die("Connection failed. Error was: ". $error['message']);
} else {

    $orden = $_GET['orden'];

    sleep(2);

    $query = "SELECT * FROM productos ORDER BY $orden";
    $result = pg_query($query);

    if($result) {
        $articulos = [];

        while ($row= pg_fetch_assoc($result)) {
            $oArt = new StdClass();
            $oArt->codArt = $row['codart'];
            $oArt->familia = $row['familia'];
            $oArt->um = $row['um'];
            $oArt->descripcion = $row['descripcion'];
            $oArt->fechaAlta = $row['fechaalta'];
            $oArt->saldoStock = $row['saldostock'];
            array_push($articulos, $oArt);
        }
        
        $obj = new StdClass();
        $obj->data = $articulos;

        echo json_encode($obj);

    } else {
        die ("error query $query");
    }

    pg_close($connection);
}

?>
