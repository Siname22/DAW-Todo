<?php
require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();


$sqlCategoria2 = "SELECT id, nombre FROM categoria ORDER BY id";
$select2 = $conexion->prepare($sqlCategoria2);
$select2->execute([]); // Se añade el parámetro a la consulta preparada.
$rsCategorias = $select2->fetchAll();
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
        <br><br>
        <label for='nombre'>Apellidos</label>
        <input type='text' id='apellidos' name='apellidos' />
        <br><br>
        <label for='nombre'>Telefono</label>
        <input type='number' id='telefono' name='telefono' />
        <br><br>
        <label for='nombre'>Estrella</label>
        <input type='checkbox' id='estrella' name='estrella' value="1"/>
        <br><br>
        <label for='nombre'>Categoría</label>
        <select name='categoriaid'>
            <option selected value = "0" > Selecciona una categoria </option>
            <?php foreach ($rsCategorias as $fila) { ?>
                <option value = <?=$fila['id']?> > <?=$fila['nombre']?> </option>;
            <?php } ?>
        </select>

        <br><br>

        <input type='submit' name='crear' value='Crear persona' />

    </form>

    <a href='PersonasIndex.php'>Volver al listado de personas.</a>

    </body>

    </html>
<?php
