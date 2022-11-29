<?php
    $decada = 0;
    if (isset($_REQUEST["decada"])){
        $decada = $_REQUEST["decada"];
    }
?>

<html>
    <body>
        <ul>
            <?php
            for ($anno = $decada; $anno<$decada+10 ; $anno++){
                echo " <li><a href='https://www.google.com/search?q=".$anno
                    ."'><p>Buscar por el año: ".$anno."</p></a></li>";
                echo " <li><a href='https://es.wikipedia.org/wiki/".$anno
                    ."'><p>Buscar por Wikipedia: ".$anno."</p></a></li>";
                echo " <li><a href='https://www.google.es/maps/search/".$anno
                    ."'><p>Buscar por Google Maps: ".$anno."</p></a></li>";
                echo " <li><a href='https://www.google.com/search?q=".$anno
                    ."&tbm=isch&ved=".$anno."&sclient=img'><p>Buscar por Google Imagenes: ".$anno."</p></a></li>";
            }
            ?>
        </ul>
    </body>
</html>