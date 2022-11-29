<?php
    $errorVacio = isset($_REQUEST["errorVacio"]);
?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

<h1>ADIVINAR EL NÚMERO</h1>

<p>Jugador 1: Introduce un número:</p>

<?php
    if ($errorVacio) {
        echo "<p style='color: red;'>Introduce un número, anda.</p>";
    }
?>

<form action="150b-AdivinarPrincipal.php" method="get">
    <input type="number" name="oculto" />
    <input type="submit" value="Guardar oculto" />
</form>

</body>

</html>
