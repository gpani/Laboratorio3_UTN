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
                    background-color: lightcoral ;
                    font-size: 20px;
                    font-family: Courier, "Lucida Console", monospace;
                }

        </style>

        <img class="center" src="../../contenido/unnamed.jpg" width="450" height="98" />

<?php

echo '<h1>Variables del servidor</h1>';

echo "<table>";
echo "<tr><td>SERVER_ADDR</td><td>".$_SERVER['SERVER_ADDR']."</td></tr>";
echo "<tr><td>SERVER_PORT</td><td>".$_SERVER['SERVER_PORT']."</td></tr>";
echo "<tr><td>SERVER_NAME</td><td>".$_SERVER['SERVER_NAME']."</td></tr>";
echo "<tr><td>DOCUMENT_ROOT</td><td>".$_SERVER['DOCUMENT_ROOT']."</td></tr>";

echo "</table>";

echo '<hr>';

echo '<h1>Variables del cliente</h1>';

echo "<table>";
echo "<tr><td>REMOTE_ADDR</td><td>". $_SERVER['REMOTE_ADDR']."</td></tr>";
echo "<tr><td>REMOTE_PORT</td><td>".$_SERVER['REMOTE_PORT']."</td></tr>";
echo "</table>";

echo '<hr>';

echo '<h1>Variables del request</h1>';

echo "<table>";
echo "<tr><td>SCRIPT_NAME</td><td>". $_SERVER['SCRIPT_NAME']."</td></tr>";
echo "<tr><td>REQUEST_METHOD</td><td>".$_SERVER['REQUEST_METHOD']."</td></tr>";
echo "</table>";

echo '<hr>';

echo '<h1>Todas</h1>';

echo "<table>";
foreach ($_SERVER as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";

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