<?php
	require_once "_Varios.php";

	$conexion = obtenerPdoConexionBD();

    $sql = "
               SELECT
                    p.id       AS p_id,
                    p.nombre   AS p_nombre,
                    p.telefono AS p_telefono,
                    c.id       AS c_id,
                    c.nombre   AS c_nombre
                FROM
                   persona AS p INNER JOIN categoria AS c
                   ON p.categoriaId = c.id
                ORDER BY p.nombre
        ";

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $sentencia->fetchAll();
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Listado de Personas</h1>

    <table border='1'>

        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Categoría</th>
            <th></th>
        </tr>

        <?php foreach ($rs as $fila) { ?>
            <tr>
                <td><a href=   'PersonasShow.php?id=<?=$fila["p_id"]?>'><?= $fila["p_nombre"]   ?></a></td>
                <td><a href=   'PersonasShow.php?id=<?=$fila["p_id"]?>'><?= $fila["p_telefono"] ?></a></td>
                <td><a href= 'CategoriasShow.php?id=<?=$fila["c_id"]?>'><?= $fila["c_nombre"]   ?></a></td>
                <td><a href='PersonasDestroy.php?id=<?=$fila["p_id"]?>'>(X)                       </a></td>
            </tr>
        <?php } ?>

    </table>

    <br>

    <a href='PersonasCreate.php'>Crear entrada</a>

    <br />
    <br />

    <a href='CategoriasIndex.php'>Gestionar listado de Categorías</a>

</body>

</html>