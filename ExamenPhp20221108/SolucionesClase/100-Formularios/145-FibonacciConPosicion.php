<?php
    // Si viene mandato de obtener otro valor, se recuperan todos los parámetros.
    if (!isset($_GET["siguiente"])) {
        $penultimo = 0;
        $ultimo = 1;
        $actual = 0;
        $posicion = 1;
    } else { // Si no, se les carga el valor por defecto.
        $penultimo = $_GET["penultimo"];
        $ultimo = $_GET["ultimo"];
        $actual = $penultimo + $ultimo;
        $posicion = $_GET["posicion"] + 1;
    }
?>



<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>

<body>

<p>Valor de la posición <?= $posicion==1 ? "inicial" : $posicion ?> de la serie de Fibonacci:</p>

<p style='font-size: xx-large'><?=$actual?></p>

<form method='get'>
    <input type='hidden' name='penultimo' value='<?=$ultimo?>'>
    <input type='hidden' name='ultimo' value='<?=$actual?>'>
    <input type='hidden' name='posicion' value='<?=$posicion?>'>

    <input type='submit' name='siguiente' value='Obtener siguiente valor'>
    <input type='submit' name='reiniciar' value='Reiniciar'>
</form>

</body>

</html>