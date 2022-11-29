<?php
/*
Una vez enviado el formulario, otro script PHP recogerá la información y generará una página con un
párrafo cuyo texto se presente en el color indicado.
Para ello, la página incluirá un CSS incrustado al principio y el párrafo tendrá un id asociado.
El CSS incrustado asociará un color u otro a dicho id en función de lo recibido por parámetro
(que será un color válido en CSS): "color: red;"...
*/
    $color = "black";
    if (isset($_REQUEST["colores"])){
        $color = $_REQUEST["colores"];
    }
?>
<html>
    <style>
        .colorEnviado{
            color: <?=$color?>;
        }
    </style>
    <body>
    <p class="colorEnviado">ESTE TEXTO TIENE EL COLOR ENVIADO : [<?=$color?>]</p>
    </body>
</html>
