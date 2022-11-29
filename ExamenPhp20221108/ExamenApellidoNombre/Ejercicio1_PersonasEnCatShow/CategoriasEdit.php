<?php
	require_once "_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $id = (int)$_REQUEST["id"];

    $conexion = obtenerPdoConexionBD();
    $sqlCategoria = "SELECT * FROM categoria WHERE id=?";
    $select = $conexion->prepare($sqlCategoria);
    $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

     // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
    $nombre = $fila["nombre"];
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Editar categoría</h1>

    <form method='get' action='CategoriasUpdate.php'>

        <input type='hidden' name='id' value='<?=$id?>' />

        <label for='nombre'>Nombre</label>
        <input type='text' id='nombre' name='nombre' value='<?=$nombre?>' />

        <br><br>

        <input type='submit' name='actualizar' value='Actualizar cambios' />

    </form>

    <br />
    <a href='CategoriasDestroy.php?id=<?=$id?>'>Eliminar categoría</a>

    <br />

    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>