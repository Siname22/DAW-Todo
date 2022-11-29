<?php

    $hayCookie = isset($_COOKIE["acumulado"]);
    $quierenSumar = isset($_REQUEST["suma"]);
    $quierenRestar = isset($_REQUEST["resta"]);
    $quierenResetear = isset($_REQUEST["reset"]);
    $quierenOperar = $quierenSumar || $quierenRestar;

    if (!$hayCookie || $quierenResetear) {
        $acumulado = 0; // Valor por defecto.
    } else {
        $acumulado = $_COOKIE["acumulado"];
    }

    if (!$quierenOperar || $quierenResetear) { // NO quieren operar.
        $diferencia = 1; // Por defecto, para cuando no haya formulario enviado.
    } else { // Sí quieren operar.
        $diferencia = $_REQUEST["diferencia"];

        if ($quierenSumar) {
            $acumulado = $acumulado + $diferencia;
        } else { // Quieren restar
            $acumulado = $acumulado - $diferencia;
        }
    }

    setcookie('acumulado', $acumulado, time() + 1*60*60);

?>



<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
</head>

<body>

<h1><?=$acumulado?></h1>

<form method='get'>
    <input type='number' name='diferencia' value='<?=$diferencia?>'>
    <input type='submit' name='suma' value='Sumar'>
    <input type='submit' name='resta' value='Restar'>
    <input type='submit' name='reset' value='Resetear una versión'>
</form>

<a href='<?=$_SERVER["PHP_SELF"]?>?reset'>Resetear otra versión</a>

</body>

</html>