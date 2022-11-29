<?php
	require_once "_Varios.php";

	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	$conexionBD = obtenerPdoConexionBD();
	$sql = "DELETE FROM persona WHERE id=?";
    $sentencia = $conexionBD->prepare($sql);
    $sentencia->execute([$id]); // Se añade el parámetro a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Eliminación completada</h1>
    <p>Se ha eliminado correctamente la persona.</p>

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>