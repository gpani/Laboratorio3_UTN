<?php
/* este script recibe user y password por metodo POST y verifica que son validos,
si son validos, crea la sesion y manda al usuario a la aplicacion */

/* funcion que devuelve true si el usuario y password son correctos
sino devuelve false */
function autenticacion($usuario, $password)
{
    /* ESTO HAY QUE CAMBIARLO POR UNA CONSULTA A LA BDD QUE
    VERIFIQUE USUARIO Y HASH DEL PASSWORD */
    if ($usuario == "gessi" && $password == "pani"){
        return true;
    } else {
        return false;
    }
}

/* cargo variables recibidas por POST */
$usuario = $_POST['usuario'];
$password = $_POST['password'];

/* verifico si usuario y password son validos */
if (autenticacion($usuario, $password)) {
    /* si la autenticacion es correcta, creo la sesion y mando al 
    usuario a la aplicacion */
    session_start();
    /* cargo dos variables de la sesion*/
    /* identificador (que se usa en los otros scripts) */
    // session_id() devuelve  el identificador de la sesion 
    $_SESSION['identificadorDeSesion'] = session_id();
    /* usuario (prueba, para probar) */
    $_SESSION['usuario'] = $usuario;
    /* mando al usuario a la aplicacion*/
    header('location:./aplicacion/');
} else {
    /* si la autenticacion no es correcta, vuelvo al form de login */
    header('location:./formDeLogin.html');
}

?>