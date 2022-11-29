<?php
require_once "_Varios.php";

// Se recoge el parámetro "id" de la request.
$id = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlCategoria = "SELECT id, nombre, apellidos, telefono, estrella, categoriaid FROM persona  where id = ?";
$select = $conexion->prepare($sqlCategoria);
$select->execute([$id]); // Se añade el parámetro a la consulta preparada.
$fila = $select->fetch();

// Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
$nombre = $fila["nombre"];
$apellidos = $fila["apellidos"];
$telefono = $fila["telefono"];
$estrella = $fila["estrella"];
$categoriaId = $fila["categoriaid"];

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

<h1>Editar persona</h1>

<form method='get' action='PersonasUpdate.php'>

    <input type='hidden' name='id' value='<?=$id?>' />

    <label for='nombre'>Nombre</label>
    <input type='text' id='nombre' name='nombre' value='<?=$nombre?>' />
    <br><br>
    <label for='nombre'>Apellidos</label>
    <input type='text' id='apellidos' name='apellidos' value='<?=$apellidos?>' />
    <br><br>
    <label for='nombre'>Telefono</label>
    <input type='text' id='telefono' name='telefono' value='<?=$telefono?>' />
    <br><br>
    <label for='nombre'>Estrella</label>
    <input type='checkbox' id='estrella' name='estrella' value="1" <?=$estrella=='1'? 'checked':''?> />
    <br><br>
    <label for='nombre'>Categoría</label>
    <select name='categoriaid'>
        <option selected value = "0" > Selecciona una categoria </option>
        <?php foreach ($rsCategorias as $fila) { ?>
            <option <?=$fila['id'] == $categoriaId ? "selected" : "" ?> value = <?=$fila['id']?> > <?=$fila['nombre']?> </option>;
        <?php } ?>
    </select>

    <br><br>

    <input type='submit' name='actualizar' value='Actualizar cambios' />

</form>

<br />

<a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>