<?php
require_once "_Varios.php";

$conexionBD = obtenerPdoConexionBD();

// Se recoge el parámetro "id" de la request.
$id = (int)$_REQUEST["id"];

// select
$sqlPersona = "SELECT nombre, apellidos FROM persona  where id = ?";
$select = $conexionBD->prepare($sqlPersona);
$select->execute([$id]); // Se añade el parámetro a la consulta preparada.
$fila = $select->fetch();

// delete
$sql = "DELETE FROM persona WHERE id=?";
$sentencia = $conexionBD->prepare($sql);
$sentencia->execute([$id]); // Se añade el parámetro a la consulta preparada.

//Redireccion
$mensajeAEnviarPersonaIndexEliminacion = "Eliminación completada. Se han eliminado correctamente los datos de "
    .$fila["nombre"].", ".$fila["apellidos"];
$newURL = "PersonasIndex.php?mensaje=".urlencode($mensajeAEnviarPersonaIndexEliminacion);
header("Location: ".$newURL);
?>
