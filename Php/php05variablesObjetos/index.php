<html>

<body>
<style>
                .center {

                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                }

                table,  td, tr {
                    border: 1px solid darkblue;
                    border-collapse: collapse;
                    background-color: lightgreen ;
                    font-size: 18px;
                    font-family: Courier, "Lucida Console", monospace;
                }

        </style>

        <img class="center" src="../../contenido/unnamed.jpg" width="450" height="98" />

<?php

echo '<h1>Variables de tipo objeto en PHP</h1>';

$oPedido1 = new stdClass();

$oPedido1->codArt = "art001";
$oPedido1->precioUnitario = 15.60;
$oPedido1->descripcion = "memoria SD 8GB";
$oPedido1->stock = 100;

$oPedido2 = new stdClass();

$oPedido2->codArt = "art002";
$oPedido2->precioUnitario = 9.99;
$oPedido2->descripcion = "mouse óptico genius";
$oPedido2->stock = 236;

$arrayPedidos = [];

array_push($arrayPedidos, $oPedido1);
array_push($arrayPedidos, $oPedido2);

echo "<h2><span style=\"color:violet\">\$oPedido1</span>, tipo: " . gettype($oPedido1) . "</h2>";
echo "<table>";
foreach ($oPedido1 as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";


echo "<h2><span style=\"color:violet\">\$oPedido2</span>, tipo: " . gettype($oPedido2) . "</h2>";
echo "<table>";
foreach ($oPedido2 as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";

echo "<h2>Array con los pedidos <span style=\"color:violet\">\$arrayPedidos</span>, count: ". count($arrayPedidos) . "</h2>";

echo "<table>";
foreach($arrayPedidos as $pedido) {
        echo "<tr>";
        foreach ($pedido as $key => $value) {
                echo "<td>$value</td>";
        }
        echo "</tr>";
}
echo "</table>";

echo "<h2>Objeto con dos atributos, el array y su cantidad: <span style=\"color:violet\">\$oPedidos</span></h2>";

$oPedidos = new stdClass();

$oPedidos->pedidos = $arrayPedidos;
$oPedidos->cantidad = count($arrayPedidos);

echo "<table>";
foreach ($oPedidos as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";

echo "<h2>JSON de <span style=\"color:violet\">\$oPedidos</span></h2>";

$jsonPedidos = json_encode($oPedidos);

echo "<code>$jsonPedidos</code>";

echo "<hr>"
?>
        <br/>
        <br/>
        <footer>
                Gessica Paniagua
                <br />

                <a href="mailto:gessi.paniagua@gmail.com">gessi.paniagua@gmail.com</a>

                <br />

                <p>Copyright 2020 by <a target="_blank" href="https://github.com/gpani">@gpani</a></p>
        </footer>


</body>





</html>