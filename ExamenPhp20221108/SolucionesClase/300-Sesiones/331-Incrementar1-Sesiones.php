<?php
    session_start();

    if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])) { // Si NO hay formulario enviado (1ª vez), o sí lo hay y piden resetear.
        $acumulado = 0;
    } else { // Sí hay acumulado y no piden resetear (2ª ó siguientes veces).
        $acumulado = ((int) $_SESSION["acumulado"]) + 1;
    }

    $_SESSION["acumulado"] = $acumulado;
?>



<html>

<h2><?=$acumulado?></h2>

<form method='get'>

    <input type='submit' value='+1' name='suma'>
    <br /><br />

    <input type='submit' value='Resetear' name='reset'>

</form>

</html>