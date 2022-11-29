<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();
// Se recogen los datos del formulario de la request, excepto id.
$id = (int)$_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$telefono = $_REQUEST["telefono"];
$estrella = 0;
if (isset( $_REQUEST["estrella"])){
    $estrella = $_REQUEST["estrella"];
}
$categoriaid=$_REQUEST["categoriaid"];

// Quieren MODIFICAR una persona existente y es un UPDATE.
$sql = "UPDATE Persona SET nombre=?, apellidos=?, telefono=?, estrella=? , categoriaid=? WHERE id=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $apellidos, $telefono, $estrella, $categoriaid, $id]); // Se añaden los parámetros a la consulta preparada.

//Redireccion
$mensajeAEnviarPersonaIndexUpdate = "Actualización completada. Se han guardado correctamente los nuevos datos de "
    .$nombre.", ".$apellidos;
$newURL = "PersonasIndex.php?mensaje=".urlencode($mensajeAEnviarPersonaIndexUpdate);
header("Location: ".$newURL);

?>