<?php
    session_start();

    $haySesion = isset($_SESSION["acumulado"]);
    $quierenSumar = isset($_REQUEST["sumar"]);
    $quierenRestar = isset($_REQUEST["restar"]);
    $quierenRealizarOperacion = $quierenSumar || $quierenRestar;
    $quierenResetear = isset($_REQUEST["resetear"]);

    if (!$haySesion || $quierenResetear) {
        $acumulado = 0; // Valor por defecto.
    } else {
        $acumulado = $_SESSION["acumulado"];
    }

    if (!$quierenRealizarOperacion || $quierenResetear) { // NO hay formulario enviado.
        $diferencia = 1; // Por defecto, para cuando no haya formulario enviado.
    } else { // Quieren realizar una operación (HAY formulario enviado).
        $diferencia = $_REQUEST["diferencia"];
    }

    if ($quierenSumar) {
        $acumulado = $acumulado + $diferencia;
    } else if ($quierenRestar) {
        $acumulado = $acumulado - $diferencia;
    }

    $_SESSION["acumulado"] = $acumulado;
?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

<h1><?=$acumulado?></h1>

<form method='get'>
    <input type='number' name='diferencia' value='<?=$diferencia?>'>
    <input type='submit' name='sumar' value='Sumar'>
    <input type='submit' name='restar' value='Restar'>
    <input type='submit' name='resetear' value='Resetear (una forma)'>
</form>

<a href='<?=$_SERVER["PHP_SELF"]?>?resetear'>Resetear (otra forma)</a>

</body>

</html>