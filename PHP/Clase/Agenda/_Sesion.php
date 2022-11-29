<?php
declare(strict_types=1);

session_start();

    function entrarSiSesionIniciada() {
        if (haySesionRAM()) redireccionar("Personas.php");
    }

    function salirSiSesionFalla() {
        if (!haySesionRAM()) redireccionar("Formulario.php?error");
    }

    function haySesionRAM(): bool {
        return isset($_SESSION["id"]);
    }

    function obtenerUsuarioPorContrasenna(string $identificador, string $contrasenna): ?array {
        require_once "_Varios.php";

        $conexion = obtenerPdoConexionBD();
        $sql = "SELECT id, identificador, nombre FROM usuario
        WHERE identificador=? AND BINARY contrasenna=?";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute([$identificador,$contrasenna]);
        $fila = $sentencia->fetch();

        $afectadas = $sentencia->rowCount();

        if ($afectadas == 0) return null;
        else return $fila;
    }

    function generarSesionRAM(array $usuario) {
        $_SESSION["id"] = $usuario["id"];
        $_SESSION["identificador"] = $usuario["identificador"];
        $_SESSION["contrasenna"] = $usuario["contrasenna"];
    }

    function cerrarSesion() {
    // Destruir sesión RAM (implica borrar cookie de PHP "PHPSESSID").
        session_destroy();
    }
?>