<?php
	require_once "_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $personaId = (int)$_REQUEST["id"];

    $conexion = obtenerPdoConexionBD();
    $sqlPersona = "SELECT nombre, apellidos, telefono, categoriaId FROM persona WHERE id=?";
    $select = $conexion->prepare($sqlPersona);
    $select->execute([$personaId]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

    // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
    $personaNombre = $fila["nombre"];
    $personaApellidos = $fila["apellidos"];
    $personaTelefono = $fila["telefono"];
    $personaCategoriaId = $fila["categoriaId"];

	// Con lo siguiente se deja preparado un recordset con todas las categorías.
    $sqlCategorias = "SELECT id, nombre FROM categoria ORDER BY nombre";
    $select = $conexion->prepare($sqlCategorias);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rsCategorias = $select->fetchAll();
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Editar persona</h1>

    <form method='get' action='PersonasUpdate.php'>

        <input type='hidden' name='id' value='<?=$personaId?>' />

        <label for='nombre'>Nombre</label>
        <input type='text' id='nombre' name='nombre' value='<?=$personaNombre?>' />

        <br><label for='apellidos'>Apellidos</label>
        <input type='text' id='apellidos' name='apellidos' value='<?=$personaApellidos?>' />

        <br><label for='telefono'>Nombre</label>
        <input type='text' id='telefono' name='telefono' value='<?=$personaTelefono?>' />

        <br><label for='categoriaId'>Categoría</label>
        <select id='categoriaId' name='categoriaId'>
            <?php
                foreach ($rsCategorias as $filaCategoria) {
                    $categoriaId = (int) $filaCategoria["id"];
                    $categoriaNombre = $filaCategoria["nombre"];

                    if ($categoriaId == $personaCategoriaId) $seleccion = "selected";
                    else                                     $seleccion = "";

                    echo "<option value='$categoriaId' $seleccion>$categoriaNombre</option>";

                    // Alternativa (peor):
                    // if ($categoriaId == $personaCategoriaId) echo "<option value='$categoriaId' selected>$categoriaNombre</option>";
                    // else                                     echo "<option value='$categoriaId'         >$categoriaNombre</option>";
                }
            ?>
        </select>

        <br><br>

        <input type='submit' name='actualizar' value='Actualizar cambios' />

    </form>
    
    <br />
    <a href='PersonasDestroy.php?id=<?=$id?>'>Eliminar persona</a>

    <br />

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>