<?php
	require_once "_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $personaId = (int)$_REQUEST["id"];

    $conexion = obtenerPdoConexionBD();
    $sqlPersona = "
       SELECT
            p.nombre    AS p_nombre,
            p.apellidos AS p_apellidos,
            p.telefono  AS p_telefono,
            c.nombre    AS c_nombre
        FROM
           persona AS p INNER JOIN categoria AS c
           ON p.categoriaId = c.id
        WHERE p.id = ?
        ";
    $select = $conexion->prepare($sqlPersona);
    $select->execute([$personaId]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

    // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
    $personaNombre = $fila["p_nombre"];
    $personaApellidos = $fila["p_apellidos"];
    $personaTelefono = $fila["p_telefono"];
    $categoriaNombre = $fila["c_nombre"];
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Ver persona</h1>

    <p>Nombre: <?=$personaNombre?></p>
    <p>Apellidos: <?=$personaApellidos?></p>
    <p>Teléfono: <?=$personaTelefono?></p>
    <p>Categoría: <?=$categoriaNombre?></p>

    <br />

    <a href='PersonasEdit.php?id=<?=$personaId?>'>Editar persona</a>
    <br />
    <a href='PersonasDestroy.php?id=<?=$personaId?>'>Eliminar persona</a>
    <br />

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>