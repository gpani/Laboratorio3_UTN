<?php
sleep(3);
if (isset($_POST['texto'])) {
        echo "<p>Contenido recibido: <code>" . $_POST['texto'] ."</code></p>";
        echo "<p>Encriptado <strong>md5</strong> (128-bits, 16 pares hexadecimales):</p><p><code>" . md5($_POST['texto']) . "</code></p>";
        echo "<p>Encriptado <strong>sha1</strong> (160-bits, 20 pares hexadecimales):</p><p><code>" . sha1($_POST['texto']) . "</code></p>";
} else {
        echo "<h2>ERROR EN DATOS RECIBIDOS</h2>";
}
?>