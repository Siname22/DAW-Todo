<?php

    session_start();

    if (isset($_REQUEST["oculto"])) { // Si viene FORMULARIO...
        $oculto = $_REQUEST["oculto"]; // ...recogemos el oculto del formulario.
        $_SESSION["oculto"] = $oculto;
    } else { // Si no, damos por hecho que el oculto estará en la sesión...
        $oculto = $_SESSION["oculto"]; // ...así que recogemos su valor.
    }

    $hayIntento = isset($_REQUEST["intento"]);
    if ($hayIntento) {
        $intento = $_REQUEST["intento"];
    }

?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

<h1>ADIVINA EL NÚMERO</h1>

<?php

if ($hayIntento) {
    $cercania = "";
    $asteriscos = 1 + abs($intento - $oculto) / 10;
    for ($i = 1; $i <= $asteriscos; $i++) {
        $cercania = "$cercania*";
    }
    if ($intento < $oculto) {
        echo "<p>El número que buscas es mayor($cercania)</p>";
    } else if ($intento > $oculto) {
        echo "<p>El número que
    buscas es menor ($cercania)</p>";
    } else {
        echo "<p>¡Has adivinado el número!</p>";
    }
}

if (!$hayIntento || $intento != $oculto) {

    ?>

    <form method="get">
        <p>Jugador 2: Adivina el número:</p>
        <input type="text" name="intento"> <input type="submit" value="Intentar">
    </form>

<?php } ?>

<a href="adivinar-inicio.php">Vuelta al inicio para intentar adivinar otro número.</a>

</body>

</html>