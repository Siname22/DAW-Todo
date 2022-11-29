<?php
    require_once "/home/alumno/PhpstormProjects/Raul Mendez Poblete/PHP/Base de Datos/varios.php";

    //conectar base de datos
    $conexion = obtenerPdoConexionBD();

    $sql = "SELECT id,nombre FROM categoria ORDER BY nombre";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([]);

    $rs = $sentencia->fetchAll();
?>
<html>
    <style>

        table th,tr,td{
            border: 1px solid #1ccfd5;
            border-collapse: collapse
        }
        th{
            color: #88176a;
        }
    </style>
    <body>
        <table>
            <tr>

                <th>NOMBRE</th>
                <th>Eliminar</th>
            </tr>
            <tr>
                <?php
                    foreach ($rs as $fila) {
                ?>


                <td><a href='categoriaFicha.php?id=<?=$fila["id"]?>'> <?=$fila["nombre"]?> </a></td>
                <td><a href='eliminarCategoria.php?id=<?=$fila["id"]?>'> X </a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <a href='categoriaNueva.php'>Crear</a>
    </body>
</html>


