<html><body>

<?php
// test_consulta_bdd.php:
//  en este archivo hago una serie de consultas en la base de datos posgres pare reiniciar las tablas 
//  en heroku no hay phpMyAdmin entonces lo tengo que hacer con un script

// incluyo los datos de conexion
include('./datosConexionBDD.inc');

//me conecto a la base de datos 
$connection = pg_connect ("host=$servername port=$port dbname=$dbname user=$username password=$password");

//chequeo que me conecte bien
if (!$connection) {
    $error = error_get_last();
    echo "Connection failed. Error was: ". $error['message']. "\n";
    file_put_contents('errores.log', $error);
} else {
    echo "Connection succesful. <br>";
    // si la tabla existe la borro, sirve para reiniciar la base de datos posgres
    $query = "DROP TABLE IF EXISTS productos";
    //ejecuta la consulta
    $result = pg_query($query);

    // imprime el resultado de la consulta
    echo "DROP TABLE query: $result <br>";

    //creo la tabla de vuelta con nombre productos y le defino las columnas
    $query = "CREATE TABLE productos (codArt TEXT, familia TEXT, um TEXT, descripcion TEXT, fechaAlta TEXT, saldoStock INTEGER)";

    //ejecuta la consulta
    $result = pg_query($query);

    //imprime el resultado de la consulta
    echo "CREATE TABLE query: $result  <br>";

    // si el resultado da falso hubo un error sino continua
    if (!$result){
        $error = error_get_last();
        echo "Error CREATE was: ". $error['message']. "\n";
        file_put_contents('errores.log', $error);
    }
    // agrego los datos a la tabla leyendolos desde un json
    echo "<br><h1>Agregando...</h1><br>";

    // leo el contenido del archivo como un string
    $string = file_get_contents('../Especiales/productos.json');

    // aca lo convierto a json
    $data = json_decode($string, true);
    
    echo $data['datos'];
    
    // recorro los datos y los inserto en la tabla con INSERT
    foreach ($data['datos'] as $row) {
        $query = "INSERT INTO productos VALUES ('$row[codArt]','$row[familia]','$row[um]','$row[descripcion]','$row[fechaAlta]', $row[saldoStock])";
        $result = pg_query($query);
        echo "add row: $result <br>";
    }
    
    // le pido el contenido a la tabla para ver como quedo
    $query = "SELECT * FROM productos";
    $result = pg_query($query);

    echo "select: $result";

    echo "<h1> Contenido de la tabla </h1>";
    
    // imprimo las filas de la tabla
    if($result) {
        while ($row= pg_fetch_assoc($result)) {
            print_r($row);
            echo "<br>";
        }
    }
}
?>

</body></html>
