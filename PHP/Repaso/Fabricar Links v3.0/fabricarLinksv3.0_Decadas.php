<?php
$annoInicial = 2000;
$annoFinal = 2029;
?>

<html>
    <body>
        <ul>
            <?php
            for ($decada = $annoInicial; $decada<$annoFinal ; $decada+=10){
                echo " <li><a href='fabricarLinksv2.0-Annos.php?decada=".$decada
                    ."'><p>Buscar por la decada:".$decada."</p></a></li>";
            }
            ?>
        </ul>
    </body>
</html>