<html>

<body>
<style>
                .center {

                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                }

                table, th, td {
                    border: 1px solid darkblue;
                }

                tbody, tr {
                    background-color: lightgreen;
                    border: 1px solid darkblue;
                }
        </style>

        <img class="center" src="../../contenido/unnamed.jpg" width="450" height="98" />

<h1><strong>Prueba de la función include()</strong></h1>
<hr>

<?php

echo '<h2>Intento acceder a las variables antes de hacer include()</h2>';

echo "<h3>Variable <span style=\"color:violet\">\$lenguajesPC[0]</span>: $lenguajesPC[0]</h3>";

echo "<h3>Variable <span style=\"color:violet\">\$lenguajesWeb[1]</span>: $lenguajesWeb[1]</h3>";

echo "<p> Cantidad de elementos: " . count($lenguajesPC) . "</p>";

echo "<p><strong><span style=\"color:red\">Se observan warnings que aparecen al no estar definidas las variables.</span> El script continúa ejecutándose.</strong></p>";

echo '<h2>Llamo a include(\'./ejemplo2.inc\')</h2>';

include('./ejemplo2.inc');

echo "<h3>Variable <span style=\"color:violet\">\$lenguajesPC[0]</span>: " . $lenguajesPC[0] . "</h3>";

echo "<h3>Variable <span style=\"color:violet\">\$lenguajesWeb[1]</span>: $lenguajesWeb[1]</h3>";

echo "<p> Cantidad de elementos en lenguajesPC: " . count($lenguajesPC) . "</p>";
echo "<p> Cantidad de elementos en lenguajesWeb: " . count($lenguajesWeb) . "</p>";

echo "<h3>Contenido de los arrays:</h3>";
echo "<table><tr>";
foreach ($lenguajesPC as $len) {
    echo "<td>$len</td>";
}
echo "</tr><tr>";
foreach ($lenguajesWeb as $len) {
    echo "<td>$len</td>";
}
echo "</tr></table>";
echo '<hr>';

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