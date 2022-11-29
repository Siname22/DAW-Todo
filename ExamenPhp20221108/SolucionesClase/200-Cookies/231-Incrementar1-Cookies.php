<?php
    $acumulado = 0; // Apostamos a que se da una de estas dos situaciones: o bien acabamos de llegar o piden reiniciar;

    // Si ya viene un acumulado *Y* NO nos piden reiniciar, hay que recoger y utilizar el valor que viene.
    if (isset($_COOKIE["acumulado"]) && !isset($_REQUEST["reiniciar"])) {
        $acumulado = $_COOKIE["acumulado"];

        if (isset($_REQUEST["sumar"])) {
            $acumulado++;
        }
    }

    // Establecemos la cookie con el valor que haya quedado:
    setcookie("acumulado", $acumulado, time() + 60 * 60);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<p><?=$acumulado?></p>

<a href='231-Incrementar1-Cookies.php?sumar'>Click aquí para sumar</a>

<form method="get">
    <input type="submit" name="sumar" value="+1">
    <input type="submit" name="reiniciar" value="Reiniciar"> <!-- Una manera de reiniciar -->
</form>

<a href='<?=$_SERVER["PHP_SELF"]?>?reiniciar'>Reiniciar</a> <!-- Otra manera de reiniciar -->

</body>
</html>