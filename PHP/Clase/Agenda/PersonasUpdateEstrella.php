<?php
require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

// Se recogen los datos del formulario de la request, excepto id.
$id = (int)$_REQUEST["id"];
$estrella = (int)$_REQUEST["estrella"];

// Cambio el valor de la  estrella
if ($estrella == "1")
    $estrella = "0";
else
    $estrella = "1";

// Se modifica la estrella solamente
$sql = "UPDATE Persona SET estrella=? WHERE id=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$estrella, $id]); // Se añaden los parámetros a la consulta preparada.

//Redireccion
$newURL = "PersonasIndex.php";
// Se comprueba si viene desde PersonasShow
if(isset($_REQUEST["show"])) {
    $newURL = "PersonasShow.php?id=".$id;
}

header("Location: ".$newURL);
?>