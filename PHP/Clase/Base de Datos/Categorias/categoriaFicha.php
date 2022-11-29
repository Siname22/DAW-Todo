<?php

    require_once "/home/alumno/PhpstormProjects/Raul Mendez Poblete/PHP/Base de Datos/varios.php";

    //CONECTAR BDD
    $conexion = obtenerPdoConexionBD();

    $id = (int)$_REQUEST["id"];

    $sql = "SELECT * FROM categoria WHERE id=?";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$id]);

    $fila = $sentencia->fetch();

?>



<html>
    <body>
    <p> <?= $fila["nombre"]?> </p>
    </body>
</html>