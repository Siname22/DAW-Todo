<?php
    $hastaQueNumero = rand(5, 10);
?>



<html>

<head></head>

<body>

<ul>
    <?php
        for ($i=1; $i<=$hastaQueNumero; $i++) {
            echo "<li>$i</li>";
        }
    ?>
</ul>

<ul>
    <?php
        for ($i=1; $i<=$hastaQueNumero; $i++) {
            echo "<li>";
            echo "$i";
            echo "</li>";
        }
    ?>
</ul>

<ul>
    <?php for ($i=1; $i<=$hastaQueNumero; $i++) { ?>
        <li>
        <?php echo $i; ?>
        </li>
    <?php } ?>
</ul>

<ul>
    <?php for ($i=1; $i<=$hastaQueNumero; $i++) { ?>
        <li>
        <?=$i?>
        </li>
    <?php } ?>
</ul>

</body>

</html>