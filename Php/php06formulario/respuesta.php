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
                    background-color: lightpink ;
                    font-size: 18px;
                    font-family: Courier, "Lucida Console", monospace;
                }

        </style>

        <img class="center" src="../../contenido/unnamed.jpg" width="450" height="98" />

<?php

echo '<h1>Respuesta del formulario:</h1>';

echo "<h2>Contenido de la variable <span style=\"color:violet\">\$_GET</span>:</h2>";

echo "<table>";
foreach ($_GET as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";

echo "<hr>";

echo '<button onclick="window.close();">Cerrar</button>';

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