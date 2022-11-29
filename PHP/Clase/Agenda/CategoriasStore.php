<?php
	require_once "_Varios.php";

	$conexion = obtenerPdoConexionBD();

	// Se recogen los datos del formulario de la request, excepto id.
	$nombre = $_REQUEST["nombre"];

    $sql = "INSERT INTO categoria (nombre) VALUES (?)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$nombre]); // Se añaden los parámetros a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Inserción completada</h1>
    <p>Se ha insertado correctamente la nueva entrada de <?=$nombre?>.</p>

    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>