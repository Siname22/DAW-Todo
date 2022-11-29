<?php
    require_once "_Varios.php";
    require_once "_Sesion.php";


    $conexion = obtenerPdoConexionBD();

    $identificador = $_REQUEST["identificador"];
    $contrasenna = $_REQUEST["contrasenna"];

    $usuario = obtenerUsuarioPorContrasenna($identificador, $contrasenna);
    if ($usuario) {
        generarSesionRAM($usuario);
        entrarSiSesionIniciada();
    }
    else {
        salirSiSesionFalla();
    }
?>