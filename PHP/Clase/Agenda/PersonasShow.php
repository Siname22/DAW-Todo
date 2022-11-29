<?php
require_once "_Varios.php";

// Se recoge el parámetro "id" de la request.
$personaId = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlPersona = "SELECT p.id, p.nombre, apellidos, telefono, estrella, categoriaid, c.nombre nombrecategoria FROM persona AS p INNER JOIN categoria AS c ON p.categoriaId = c.id  WHERE p.id=?";
$select = $conexion->prepare($sqlPersona);
$select->execute([$personaId]); // Se añade el parámetro a la consulta preparada.
$fila = $select->fetch();

// Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
$personaNombre = $fila["nombre"];
$personaApellidos = $fila["apellidos"];
$personaEstrella = $fila["estrella"];
$personaTelefono = $fila["telefono"];
$personaCategoriaId = $fila["categoriaid"];
$personaCategoriaNombre = $fila["nombrecategoria"];
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Ver persona</h1>

<p>Nombre: <?=$personaNombre?></p>
<p>Apellidos: <?=$personaApellidos?></p>
<p>Telefono: <?=$personaTelefono?></p>
<p>Estrella:
    <a href='PersonasUpdateEstrella.php?show=1&id=<?=$fila["id"]?>&estrella=<?=$fila["estrella"]?>'>
        <img src='<?=$personaEstrella == 1 ? "llena.png" : "vacia.png"?>' style= "width: 16px "/>
    </a>
</p>
<p>Categoria Id: <?=$personaCategoriaId?></p>
<p>Categoria Nombre: <?=$personaCategoriaNombre?></p>

<br />

<a href='PersonasEdit.php?id=<?=$personaId?>'>Editar persona</a>
<br>
<a href='PersonasIndex.php'>Volver al listado de personas.</a>

</body>

</html>