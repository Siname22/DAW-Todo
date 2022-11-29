<?php
    if (!isset($_COOKIE["acumulado"]) || isset($_REQUEST["resetear"])) { // Si NO hay formulario enviado (1ª vez), o piden resetear.
        $acumulado = 0;
        $diferencia = 1;
    } else { // Sí hay cookies (2ª ó siguientes veces) y no pedían resetear.
        $acumulado = (int)$_COOKIE["acumulado"];                         //RECOGE EL VALOR ANTERIOR DE ACUMULADO
        if (isset($_REQUEST["diferencia"])) { // Hay formulario enviado.
            $diferencia = (int)$_REQUEST["diferencia"];                        // "ACTUALIZO" AL VALOR ACTUAL DE DIFERENCIA
            if (isset($_REQUEST["restar"])) {
                $acumulado = $acumulado - $diferencia; // Sobreescribimos la diferencia que teníamos guardada con la diferencia que ha escrito el humano.
            } else if (isset($_REQUEST["sumar"])) {
                $acumulado = $acumulado + $diferencia;
            } else {
                // ERROR
            }
        } else { // Hay cookies pero no hay formulario enviado (quieren "continuar donde lo habían dejado).
            $diferencia = (int)$_COOKIE["diferencia"];
        }
    }
    setcookie( "acumulado",  $acumulado, time()+60);
    setcookie("diferencia", $diferencia, time()+60);
?>



<html>
<h1><?=$acumulado?></h1>
<form method='get'>
    <input type='submit' value=' - ' name='restar'>
    <input type='number' name='diferencia' value='<?=$diferencia?>'>
    <input type='submit' value=' + ' name='sumar'>
    <br /><br />
    <input type='submit' value='Resetear' name='resetear'>
    <br /><br />
</form>
<a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
</html>