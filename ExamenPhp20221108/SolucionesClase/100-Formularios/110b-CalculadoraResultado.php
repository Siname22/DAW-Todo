<?php
    $operando1 = (int) $_REQUEST["operando1"];
    $codigoOperacion = $_REQUEST["codigoOperacion"];
    $operando2 = (int) $_REQUEST["operando2"];

    $errorDivCero = false;
    $errorOperacionNoValida = false;

    if ($codigoOperacion == "sum") {
        $resultado = $operando1+$operando2;
        $caracterOperacion = "+";
    } else if ($codigoOperacion == "res") {
        $resultado = $operando1-$operando2;
        $caracterOperacion = "-";
    } else if ($codigoOperacion == "mul") {
        $resultado = $operando1*$operando2;
        $caracterOperacion = "x";
    } else if ($codigoOperacion == "div") {
        if ($operando2 != 0) {
            $resultado = $operando1/$operando2;
            $caracterOperacion = "/";
        } else {
            $errorDivCero = true;
        }
    } else {
        $errorOperacionNoValida = true;
    }

    // INTERFAZ:
    // $operando1, $operando2
    // $caracterOperacion
    // $resultado
    // $errorDivCero
    // $errorOperacionNoValida
?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Resultado de la operación</title>
</head>

<body>

<?php
    if ($errorDivCero) {
        echo "<p>Se ha solicitado dividir entre 0 y no es posible.</p>";
    } else if ($errorOperacionNoValida) {
        echo "<p>Se ha solicitado realizar una operación no reconocida (no meta la mano donde no debe).</p>";
    } else { // CASO NORMAL
        echo "<p>El resultado de $operando1 $caracterOperacion $operando2 es $resultado.</p>";
    }
?>

</body>

</html>