<?php
    //cojo los metodos de varios
    require_once "/home/alumno/PhpstormProjects/Raul Mendez Poblete/PHP/Base de Datos/varios.php";
    //cojo el metodo obtenerconexionbbdd
    $conexion = obtenerPdoConexionBD();

    //creo la variable con la instruccion que quiero añadir a la bbdd
    $sql = "SELECT * FROM categoria";

    //paso la conexion de la base de datos con el valor de entrada del sql
    $resultado = $conexion->prepare($sql);

    //inicio la ejcucion del metodo , mostrandome todo el documento.
    $resultado->execute([]);

    //Agarra todos los datos
    $resultSet = $resultado->fetchAll();
    //rs es un array escalar con arrays asociativos
    //Recorre la bbdd y lo muestra en la variable rs
    foreach ($resultSet as $mostrarResultadoPantalla){
    echo  $mostrarResultadoPantalla["id"]. ": " .$mostrarResultadoPantalla["nombre"]."<br>";
    }
?>
