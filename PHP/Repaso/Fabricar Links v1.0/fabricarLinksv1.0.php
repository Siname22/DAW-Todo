
<?php
    $hasta = 2019;
?>

<html>
    <ul>
        <?php
            for ($anno = 1900; $anno<=$hasta ; $anno++){
                echo " <li><a href='https://www.google.com/search?q=$anno&oq=$anno&aqs=chrome.0.0i271j46i67i131i433j0i512l2j
                46i512j0i512l5.4729j0j4&sourceid=chrome&ie=UTF-8'><p>Buscar por el año: ".$anno." en Google</p></a></li>";
            }
        ?>
    </ul>
</html>