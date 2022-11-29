<?php
    // Si viene mandato de obtener otro valor y vienen los parámetros, se recuperan.
    if (isset($_GET["siguiente"]) && isset($_GET["penultimo"]) && isset($_GET["ultimo"])) {
        $penultimo = $_GET["penultimo"];
        $ultimo = $_GET["ultimo"];
    } else { // Si no, se les carga el valor por defecto.
        $penultimo = 0;
        $ultimo = 1;
    }

    // Se calcula el nuevo valor.
    $actual = $penultimo + $ultimo;
?>



<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>

<body>

<p>Valor actual de Fibonacci:</p>

<p style='font-size: xx-large'><?=$actual?></p>

<form method='get'>
    <input type='hidden' name='penultimo' value='<?=$ultimo?>'>
    <input type='hidden' name='ultimo' value='<?=$actual?>'>

    <input type='submit' name='siguiente' value='Obtener siguiente valor'>
    <input type='submit' name='reiniciar' value='Reiniciar'>
</form>

</body>

</html>