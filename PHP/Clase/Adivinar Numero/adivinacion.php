<?php
    $errosvacio = isset($_REQUEST["errorVacio"]);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adivinar numero</title>
    </head>
    <body>
        <h1> Pon un número Jugador 1: </h1>

        <?php
            if ($errosvacio){
                echo "<p>Pon un numero, por favor</p>";
            }
        ?>
        <form action="adivinacionNumero.php" method="post" name="adivinacion">
            <input type="number" name="numeroOcultoJug1">
            <input type="submit" name="botonEnviarNumero" value="Poner en oculto">
        </form>
    </body>
</html>