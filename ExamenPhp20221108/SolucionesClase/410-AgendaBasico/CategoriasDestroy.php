<?php
	require_once "_Varios.php";

	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	$conexionBD = obtenerPdoConexionBD();
	$sql = "DELETE FROM categoria WHERE id=?";
    $sentencia = $conexionBD->prepare($sql);
    $sentencia->execute([$id]); // Se añade el parámetro a la consulta preparada.
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

	<h1>Eliminación completada</h1>
	<p>Se ha eliminado correctamente la categoría.</p>

    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>