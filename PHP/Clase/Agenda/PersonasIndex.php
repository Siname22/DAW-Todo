<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();

// Los campos que incluyo en el SELECT son los que luego podré leer
// con $fila["campo"].
$sql = "SELECT p.id, p.nombre, apellidos, telefono, estrella, categoriaid, c.nombre nombrecategoria 
        FROM persona AS p INNER JOIN categoria AS c ON p.categoriaId = c.id ORDER BY p.nombre";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
$rs = $sentencia->fetchAll();

//Recojo el parametro que quiero mandar cuando edita elimino o actualiza una fila.
$mensajeRecibido = "";
if (isset( $_REQUEST["mensaje"])){
    $mensajeRecibido = $_REQUEST["mensaje"];
}
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Listado de Personas</h1>
<h2> <?=$mensajeRecibido?></h2>

<table border='1'>

    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Estrella</th>
        <th>Categoria</th>

        <th></th>
    </tr>

    <?php foreach ($rs as $fila) { ?>
        <tr>
            <td><a href='PersonasShow.php?id=<?=$fila["id"]?>'><?=$fila["nombre"]?></a></td>
            <td><a href='PersonasShow.php?id=<?=$fila["id"]?>'><?=$fila["apellidos"]?></a></td>
            <td><a href='PersonasShow.php?id=<?=$fila["id"]?>'><?=$fila["telefono"]?></a></td>
            <td align="center"><a href='PersonasUpdateEstrella.php?id=<?=$fila["id"]?>&estrella=<?=$fila["estrella"]?>'>
                    <img src='<?=$fila["estrella"] == 1 ? "llena.png" : "vacia.png"?>' style='width: 16px'></a></td>
            <td><?=$fila["nombrecategoria"]?></a></td>
            <td><a href='PersonasDestroy.php?id=<?=$fila["id"]?>'>(X)              </a></td>

        </tr>
    <?php } ?>

</table>

<br>

<a href='PersonasCreate.php'>Crear entrada</a>

<br>
<br>

<a href='PersonasIndex.php'>Gestionar listado de Personas</a>

</body>

</html>