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

/* isset se usa en PHP para verificar que una variable existe */
if (isset($_GET['texto'])) {
        echo "<p>Contenido recibido: <code>" . $_GET['texto'] ."</code></p>";

        echo "<p>Encriptado <strong>md5</strong> (128-bits, 16 pares hexadecimales): <code>" . md5($_GET['texto']) . "</code></p>";
        echo "<p>Encriptado <strong>sha1</strong> (160-bits, 20 pares hexadecimales): <code>" . sha1($_GET['texto']) . "</code></p>";
        
        

} else {
        echo "<h2>ERROR EN DATOS RECIBIDOS</h2>";
}



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