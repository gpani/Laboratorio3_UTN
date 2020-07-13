<?php

include('../datosConexionBDD.inc');

$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

if (!$connection) {
    $error = error_get_last();
    file_put_contents('errores.log', $error, FILE_APPEND);
    die("Connection failed. Error was: ". $error['message']);
} else {
    /* este script devuelve la tabla de articulos mediante una consulta SELECT
       a la tabla productos de la BDD

       en este caso los datos llegan por metodo GET
    */
    $orden = $_GET['orden'];

    /* consulta SELECT para obtener datos de la tabla productos */
    $query = "SELECT * FROM productos ";

    $subquery = " where ";
    /* uso LIKE para los filtros*/
    if ($_GET['fCodArt'] != '') {
        $subquery = $subquery . "LOWER(codart) LIKE LOWER('%" . $_GET['fCodArt'] . "%') and ";
    }
    if ($_GET['fFamilia'] != '') {
        $subquery = $subquery . "LOWER(familia) LIKE LOWER('%" . $_GET['fFamilia'] . "%') and ";
    }
    if ($_GET['fUM'] != '') {
        $subquery = $subquery . "LOWER(um) LIKE LOWER('%" . $_GET['fUM'] . "%') and ";
    }
    if ($_GET['fDescripcion'] != '') {
        $subquery = $subquery . "LOWER(descripcion) LIKE LOWER('%" . $_GET['fDescripcion'] . "%') and ";
    }
    if ($_GET['fFechaAlta'] != '') {
        $subquery = $subquery . "LOWER(fechaalta) LIKE LOWER('%" . $_GET['fFechaAlta'] . "%') and ";
    }
    
    if ($subquery != " where "){
        $subquery = substr($subquery, 0, -4);
    } else {
        $subquery = "";
    }

    /* uso ORDER BY para el orden */
    /* la consulta queda de tipo
    SELECT * FROM productos WHERE _filtros_ ORDER BY orden 
    */
    $query = $query . $subquery . " ORDER BY $orden";
    
    /* ejecuto la consulta */
    $result = pg_query($query);

    if($result) {
        $articulos = [];
        /* con un while voy leyendo las filas que me devuelve la BDD
        y las cargo en un vector articulos que despues voy a convertir en 
        JSON */
        while ($row= pg_fetch_assoc($result)) {
            /* creo un objeto php y le cargo los datos */
            $oArt = new StdClass();
            $oArt->codArt = $row['codart'];
            $oArt->familia = $row['familia'];
            $oArt->um = $row['um'];
            $oArt->descripcion = $row['descripcion'];
            $oArt->fechaAlta = $row['fechaalta'];
            $oArt->saldoStock = $row['saldostock'];
            /* agrego el objeto al vector */
            array_push($articulos, $oArt);
        }
        
        /* creo el objeto con el vector */
        $obj = new StdClass();
        $obj->data = $articulos;

        /* y lo devuelvo en formato JSON */
        echo json_encode($obj);

    } else {
        die ("error query $query");
    }

    /* opcional: cierra conexion a la BDD 
     (no es obligatorio porque la conexion se cierra al terminar el script)*/
    pg_close($connection);
}

?>
