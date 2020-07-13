<?php
session_start(); /*uso session_start para trabajar con una sesion */

/* verifica si el usuario inicio sesion */
if (isset($_SESSION['identificadorDeSesion'])) {
    /* si existe el identificador de sesion, es porque el usuario
    inicio sesion, lo mando a la aplicacion */
    header('location:./aplicacion/');
} else {
    /* si no existe el identificador, lo mando al form de login */
    header('location:./formDeLogin.html');
}
?>
