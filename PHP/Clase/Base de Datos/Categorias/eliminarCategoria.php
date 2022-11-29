<?php

    //crear php CATEGORIA ficha recoger el id y pedir a la bdd ese id cn eso tienes el nombre de la categoria y ya lo escupes en la pagina

    require_once "/home/alumno/PhpstormProjects/Raul Mendez Poblete/PHP/Base de Datos/varios.php";

    //CONECTAR BDD
    $conexion = obtenerPdoConexionBD();

    $id= (int)$_REQUEST["id"];

    $sql = "DELETE  FROM categoria WHERE id=?";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$id]);

    //$rs = $sentencia->fetchAll();

?>