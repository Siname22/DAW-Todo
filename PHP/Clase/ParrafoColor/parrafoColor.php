<?php
/*Realizar una página con un select que permita seleccionar un color.
Este select tomará sus valores de un array asociativo declarado arriba en forma de literal.
Ver mindmap PHP.mm o internet para ver la sintaxis de un array asociativo en forma literal.

Los key (que serán los value de las opciones) representarán un color válido en CSS, ('red', '#9900bb'...),
mientras que los valores del array (que será el contenido de cada etiqueta option) consistirán en la denominación
de dicho color en castellano "normal".

El select tendrá su name y estará en un Form con su action (y método GET).
El formulario tendrá un submit.
*/

    $colores = [
        "#ff1900" => "Rojo",
        "#f0ba0a" => "Azul",
        "#g949599" => "Gris",
        "#f0ba0a" => "Amarillo"
    ];
?>

<html>
    <body>
        <form method="get" action="parrafoColorDestino.php">
            <select name="colores">
                <?php
                foreach ( $colores  as $id => $color){
                    echo"<option value = $id>$color </option>";
                }
                ?>
            </select>
            <input type="submit" value="ENVIAR"/>
        </form>
    </body>
</html>