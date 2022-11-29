<?php
if (!isset($_COOKIE["acumulado"]) || isset($_REQUEST["reset"])) { // Si NO hay formulario enviado (1ª vez), o sí lo hay y piden resetear.
    $acumulado = 0;
} else { // Sí hay formulario enviado pero no piden resetear (2ª ó siguientes veces).
    $acumulado = ((int) $_COOKIE["acumulado"]) + 1;
}
setcookie("acumulado",$acumulado,time()+24*60*60);
// INTERFAZ:
// $acumulado
?>



<html>

<form method='get'>

    <input type='number' name='acumulado' value='<?=$acumulado?>'>

    <input type='submit' value='+1' name='suma'>

    <br /><br />

    <input type='submit' value='Resetear' name='reset'>

    <br /><br />
    <!-- Como acumulado se guarda en una cookie este metodo no funciona-->
    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
    <br/><span>(Esta parece la mejor)</span>

</form>

</html>