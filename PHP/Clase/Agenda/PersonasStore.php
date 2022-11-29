<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();

// Se recogen los datos del formulario de la request, excepto id.
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$telefono = $_REQUEST["telefono"];
$estrella = $_REQUEST["estrella"];
$categoriaId = $_REQUEST["categoriaid"];

$sql = "INSERT INTO persona (nombre, apellidos, telefono, estrella, categoriaid) VALUES (?,?,?,?,?)";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $apellidos, $telefono, $estrella, $categoriaId]); // Se añaden los parámetros a la consulta preparada.

//Redireccion
$mensajeAEnviarPersonaIndex = "Inserción completada. Se ha insertado correctamente la nueva entrada "
    . $nombre ." ".$apellidos;
$newURL = "PersonasIndex.php?mensaje=".urlencode($mensajeAEnviarPersonaIndex);
header("Location: ".$newURL);
?>
