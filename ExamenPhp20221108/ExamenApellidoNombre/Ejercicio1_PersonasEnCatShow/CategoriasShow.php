<?php
	require_once "_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $categoriaId = (int)$_REQUEST["id"];

    $conexion = obtenerPdoConexionBD();
    $sqlCategoria = "SELECT * FROM categoria WHERE id=?";
    $select = $conexion->prepare($sqlCategoria);
    $select->execute([$categoriaId]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

    $categoriaNombre = $fila["nombre"];


    //Creo otra conexion con el id de la categoria para que me muestre el nombre de las personas que estan en esa
    // categoria
    $sqlPersonaNombre = "SELECT nombre FROM persona WHERE categoriaId=?";
    $selectPersonaNombre = $conexion->prepare($sqlPersonaNombre);
    $selectPersonaNombre->execute([$categoriaId]); // Se añade el parámetro a la consulta preparada.
    $filaPersonaNombre = $selectPersonaNombre->fetch();

     // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.

    $nombrePersonaCategoria= $filaPersonaNombre["nombre"];


?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Ver categoría</h1>

    <p>Nombre: <?=$categoriaNombre?></p>

    <br />
    <ul>
        <li>
            <p>Personas que hay en esta categoria:</p>
        </li>
        <li>
            <p><?=$nombrePersonaCategoria?></p>
        </li>
        <li>
            <p><?=$nombrePersonaCategoria?></p>
        </li>
        <li>
            <p><?=$nombrePersonaCategoria?></p>
        </li>
        <li>
            <p><?=$nombrePersonaCategoria?></p>
        </li>
    </ul>


    <a href='CategoriasEdit.php?id=<?=$categoriaId?>'>Editar categoría</a>
    <br />
    <a href='CategoriasDestroy.php?id=<?=$categoriaId?>'>Eliminar categoría</a>
    <br />
    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>