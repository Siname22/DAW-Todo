<?php
	require_once "_Varios.php";

    $conexion = obtenerPdoConexionBD();

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

    <h1>Nueva persona</h1>

    <form method='get' action='PersonasStore.php'>

        <label for='nombre'>Nombre</label>
        <input type='text' id='nombre' name='nombre' />

        <br><label for='apellidos'>Apellidos</label>
        <input type='text' id='apellidos' name='apellidos' />

        <br><label for='telefono'>Telefono</label>
        <input type='text' id='telefono' name='telefono' />

        <br><label for='categoriaId'>Categoría</label>
        <select id='categoriaId' name='categoriaId'>
            <option value='-1' selected disabled>(Selecciona...)</option>
            <?php
                foreach ($rsCategorias as $filaCategoria) {
                    $categoriaId = (int) $filaCategoria["id"];
                    $categoriaNombre = $filaCategoria["nombre"];

                    echo "<option value='$categoriaId'>$categoriaNombre</option>";
                }
            ?>
        </select>

        <br><br>

        <input type='submit' name='crear' value='Crear persona' />

    </form>
    
    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>