<?php
	require_once "_Varios.php";

	// Se recogen los datos del formulario de la request, Y NO VIENE id (no tiene que venir).
	$nombre = $_REQUEST["nombre"];
	$apellidos = $_REQUEST["apellidos"];
	$telefono = $_REQUEST["telefono"];
    $categoriaId = (int)$_REQUEST["categoriaId"];

	$conexion = obtenerPdoConexionBD();
    $sql = "INSERT INTO persona (nombre, apellidos, telefono, categoriaId) VALUES (?, ?, ?, ?)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$nombre, $apellidos, $telefono, $categoriaId]); // Se añaden los parámetros a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

    <h1>Inserción completada</h1>
    <p>Se ha insertado correctamente la nueva entrada de <?=$nombre?>.</p>

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>