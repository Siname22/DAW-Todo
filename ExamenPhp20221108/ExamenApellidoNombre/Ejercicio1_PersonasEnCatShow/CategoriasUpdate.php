<?php
	require_once "_Varios.php";

	// Se recogen los datos del formulario de la request.
    $id = (int)$_REQUEST["id"];
	$nombre = $_REQUEST["nombre"];

	$conexion = obtenerPdoConexionBD();
    // Quieren MODIFICAR una categoría existente y es un UPDATE.
    $sql = "UPDATE categoria SET nombre=? WHERE id=?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$nombre, $id]); // Se añaden los parámetros a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Actualización completada</h1>
    <p>Se han guardado correctamente los nuevos datos de <?=$nombre?>.</p>

    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>