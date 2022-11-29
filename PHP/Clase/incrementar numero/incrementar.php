<?php
    $diferencia = 1;
    $acumulado = 0;
    $numero = 1;


    if (isset($_REQUEST['numero'])) {
        $numero =(int) $_REQUEST['numero'];
    }

    if (isset($_REQUEST['acumulado'])) {
        $acumulado =(int) $_REQUEST['acumulado'];
    }

    if (isset($_REQUEST['sumarAcumulado'])) {
        $acumulado += $numero;

    } else if (isset($_REQUEST['restaAcumulado'])) {
        $acumulado -= $numero;
    }

    if (isset($_REQUEST['resetearAcumulado'])) {
        $acumulado = 0;
    }
    if (!isset($_REQUEST['diferencia']) or isset($_REQUEST['resetearDiff'])){
        $diferencia = 1;
    } else {
        $diferencia = (int) $_REQUEST["diferencia"];

        if (!isset($_REQUEST["restaDiff"])){
            $diferencia++;

        } else if ( isset( $_REQUEST ['sumaDiff'])){
            $diferencia--;
        }
    }

/*
    if (empty($_REQUEST)){
        $numero =0;



    if (isset($_REQUEST["resetear"] )){
        $numero = 0;
    }

 *     if (empty($_REQUEST) || isset($_REQUEST["resetear"])){

        $numero =0;
    }  else if (isset($_REQUEST["incrementar"])){

        $numero =(int) $_REQUEST["numero"] + 1;
    } else{

        echo "Error";
        exit;
    }

 */
?>

<html lang="es">
    <body>
    <h1>LLevamos: <?=$acumulado?> </h1>
        <form method="get">

            <label> <input type="number" name="numero" value="<?=$numero?>">                    </label>
            <label> <input  type="hidden" name="acumulado" value="<?=$acumulado?>">             </label>

            <label> <input type="submit" name="sumarAcumulado" value="SUMA ACUMULADO">          </label>
            <label> <input type="submit" name="restaAcumulado" value="RESTA ACUMULADO">         </label>

            <br> <br>

            <label> <input type="submit" name="resetearAcumulado" value="Resetear Acumulado">   </label>
            <label> <input type="submit" name="resetearDiff" value="Resetear Diferencia">       </label>
            <label> <input type="submit" name="resetearDiff" value="Resetear Numero">           </label>

            <br> <br>

            <label> <input type="submit" name="sumarDiff" value="SUMA DIFERENCIA">              </label>
            <label> <input type="hidden" name="diferencia" value="<?=$diferencia?>" readonly>   </label>
            <label> <input type="submit" name="restaDiff" value="RESTA DIFERENCIA">             </label>

            <br> <br>


        </form>
    </body>
</html>