<?php

declare(strict_types=1);

session_start();

function entrarSiSesionIniciada()
{
    if (haySesionRAM()) redireccionar("PersonaListado.php");
}

function salirSiSesionFalla()
{
    if (!haySesionRAM()) redireccionar("SesionFormulario.php");
}

function haySesionRAM(): bool
{
    return isset($_SESSION["id"]);
}

function obtenerUsuarioPorContrasenna(string $identificador, string $contrasenna): ?array
{
    $conexion = obtenerPdoConexionBD();
    $sql = "SELECT id, identificador, nombre FROM usuario
            WHERE identificador=? AND BINARY contrasenna=?";
    $select = $conexion->prepare($sql);
    $select->execute([$identificador, $contrasenna]);
    $filasObtenidas = $select->rowCount();

    if ($filasObtenidas == 0) return null;
    else return $select->fetch();
}

function generarSesionRAM(array $usuario)
{
    // Guardar el id es lo único indispensable.
    // El resto son por evitar accesos a la BD a cambio del riesgo
    // de que mis datos en sesión RAM estén obsoletos.
    $_SESSION["id"] = $usuario["id"];
    $_SESSION["identificador"] = $usuario["identificador"];
    $_SESSION["nombre"] = $usuario["nombre"];
}

function cerrarSesion()
{
    // Eliminar todos los datos de la sesión RAM.
    session_destroy();
}