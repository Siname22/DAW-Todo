<?php
require_once "_Varios.php";
$categoriaId = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlActualizacion = "UPDATE persona SET categoriaid=?";
$select = $conexion->prepare($sqlActualizacion);
$select->execute([$categoriaId]); // Se añade el parámetro a la consulta preparada.
$fila = $select->fetchAll();
?>
<html>
    <body>
        <h1>Se ha actualizado todas las personas</h1>
        <a href="CategoriasIndex.php"> Volver al listado de categorias</a>
    </body>
</html>