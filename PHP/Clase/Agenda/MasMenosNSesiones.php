<?php
session_start();
if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["resetear"])) { // Si NO hay formulario enviado (1ª vez), o piden resetear.

    $acumulado = 0;
    $diferencia = 1;

} else { // Sí hay formulario enviado (2ª ó siguientes veces) y no piden resetear.

    $acumulado = (int) $_SESSION["acumulado"];
    $diferencia = (int) $_REQUEST["diferencia"];

    if (isset($_REQUEST["restar"])) {
        $acumulado = $acumulado - $diferencia;
    } else if (isset($_REQUEST["sumar"])) {
        $acumulado = $acumulado + $diferencia;
    } else {
        // ERROR
    }
    $_SESSION["acumulado"] = $acumulado;
    $_SESSION["diferencia"] = $acumulado;
}

?>

<html>

<h1><?=$acumulado?></h1>
<h1><?=$diferencia?></h1>

<form method='get'>

    <input type='submit' value=' - ' name='restar'>
    <input type='number' name='diferencia' value='<?=$diferencia?>'>
    <input type='submit' value=' + ' name='sumar'>

    <br /><br />

    <input type='submit' value='Resetear' name='resetear'>

    <br /><br />

</form>
<!-- Como acumulado y diferencia se guardan en cookie este metodo no funciona-->
<a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>

</html>