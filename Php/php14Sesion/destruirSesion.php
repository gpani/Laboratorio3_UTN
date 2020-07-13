<?php
session_start();
/* para destruir la sesion, primero verifico que la sesion exista */
if (isset($_SESSION['identificadorDeSesion'])) {
    /* si la sesion existe, la destruyo */
    session_destroy();
    /* y mando al usuario al form de login */
    header('location:./formDeLogin.html');
} else {
    /* si la sesion no existe, aviso del error */
    die("No hay una sesion abierta!");
}
?>