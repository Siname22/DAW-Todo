<?php
    declare(strict_types=1);
    $primerOperando = rand(0, 10);
    $segundoOperando = rand(0,10);
    $resultado = $primerOperando * $segundoOperando;
    $mensaje = "";
    $racha = "";

    $acierta = isset($_REQUEST["acierta"]);
    if ($acierta){
        $puntuacion = 0;
        $primerOperando = rand(0, 10);
        $segundoOperando = rand(0,10);
        $resultado = $primerOperando * $segundoOperando;
        $puntuacion+=1;
        $racha = $puntuacion;
        $vecesAcertadas = "Tu puntuacion es de: ".$racha;
    } else if (!$acierta){
        $puntuacion = 0;
        $vecesAcertadas = "";
    }


?>
<html>
    <body>
        <!--Sale el valor de la operacion-->
        <h1>Cuanto seria el resultado de esta operacion:</h1>
        <h2><?=$primerOperando?> * <?=$segundoOperando?></h2>
        <form action='resultadoMultiplicar.php?' method='get'>
            <input type="number" hidden name="resultado" value="<?=$resultado?>">
            <input type="number" id='resultadoCliente' name='resultadoCliente'>
            <input type='submit' value="Enviar"/>
        </form>
        <h3><?=$vecesAcertadas?></h3>
    </body>
</html>

