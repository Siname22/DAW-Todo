<?php
    $numeroOcultoJug1 = null;
    $numeroJugador2 = null;
    $intentos = 0;
    $numMaxIntentos = 10;
    $respuesta = "";
    $newURL= "adivinacion.php?errorVacio";


    if ($_REQUEST["numeroOcultoJug1"] === ""){
        header("Location: ".$newURL);
        exit;
    }



    if (isset($_REQUEST["numeroOcultoJug1"])){
        $numeroOcultoJug1=(int) $_REQUEST["numeroOcultoJug1"];
    }
    if (isset($_REQUEST["intentos"])){
        $intentos = (int) $_REQUEST["intentos"];
    }

    if (isset($_REQUEST["numeroJugador2"])){
        $numeroJugador2=(int) $_REQUEST["numeroJugador2"];
    }

    if ($intentos >= $numMaxIntentos) {
        $respuesta = "Has superado el numero de intentos.";
        exit($respuesta = "PERDISTE, NO INSISTAS MAS");
    }

    if ( !isset($_REQUEST["botonEnviarNumero"])){

        if ($numeroOcultoJug1 > $numeroJugador2){
            $respuesta = "Has fallado, el numero que has elegido es mas pequeño.  Vuelve a intentarlo.
            Te faltan " .($numMaxIntentos - $intentos)."intentos";
            $intentos++;
            if ($intentos === $numMaxIntentos){
                $respuesta = "Has superado el numero de intentos.";
            }
        } elseif ($numeroOcultoJug1 < $numeroJugador2){
            $respuesta = "Has fallado, el numero que has elegido es mas grande. Vuelve a intertarlo. 
            Te faltan " .($numMaxIntentos - $intentos). " intentos";
            $intentos++;

        } else if ($numeroJugador2 === $numeroOcultoJug1){
            $respuesta = "Has ganado!!! Lo has hecho en: ".$intentos. " intentos";
        }


    }
?>

<html lang="es">
    <body>
        <h1> Adivina el número Jugador2</h1>
        <h2> <?=$respuesta?> </h2>
        <form>
            <label> <input type="number" name="numeroJugador2" value="<?=$numeroJugador2?>"> </label>
            <label> <input type="submit" name="btnVerificar" value="COMPROBAR">  </label>
            <label> <input type="hidden" name="numeroOcultoJug1" value="<?=$numeroOcultoJug1?>"> </label>
            <label> <input type="hidden" name="intentos" value="<?=$intentos?>"> </label>
        </form>

    </body>
</html>

