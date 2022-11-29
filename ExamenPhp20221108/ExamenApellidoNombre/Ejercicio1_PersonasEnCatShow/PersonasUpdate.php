<?php
	require_once "_Varios.php";

	// Se recogen los datos del formulario de la request.
    $id = (int)$_REQUEST["id"];
	$nombre = $_REQUEST["nombre"];
	$apellidos = $_REQUEST["apellidos"];
	$telefono = $_REQUEST["telefono"];
    $categoriaId = (int)$_REQUEST["categoriaId"];

	$conexion = obtenerPdoConexionBD();
    // Quieren actualizar, así que es un UPDATE.
    $sql = "UPDATE persona SET nombre=?, apellidos=?, telefono=?, categoriaId=? WHERE id=?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$nombre, $apellidos, $telefono, $categoriaId, $id]); // Se añaden los parámetros a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Actualización completada</h1>
    <p>Se han guardado correctamente los nuevos datos de <?=$nombre?>.</p>

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>