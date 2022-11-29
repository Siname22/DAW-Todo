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
                    ."'><p>Buscar por el año:".$anno."</p></a></li>";
            }
            ?>
        </ul>
    </body>
</html>