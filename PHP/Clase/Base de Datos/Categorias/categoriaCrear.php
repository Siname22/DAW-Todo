<?php
//añadir el archivo que se ha creado en categoria nueva y que te escriba por pantalla ok

    require_once "/home/alumno/PhpstormProjects/Raul Mendez Poblete/PHP/Base de Datos/varios.php";

    //CONECTAR BDD
    $conexion = obtenerPdoConexionBD();
    $nombre = $_REQUEST['nombre'];

    $sql = "INSERT INTO categoria (nombre) VALUES (?)";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$nombre]);

    echo "hecho";

?>
