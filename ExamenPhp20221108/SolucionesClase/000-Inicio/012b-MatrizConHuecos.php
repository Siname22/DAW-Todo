<?php

    const ALTO = 4;
    const ANCHO = 6;

    $matriz[0][3] = 17;
    $matriz[2][4] =  0;
    $matriz[3][3] =  2;
    $matriz[1][3] =  8;
    $matriz[4][2] = 12;
    $matriz[5][3] = 20;

    echo "<table>";
    for ($fil=0; $fil<ALTO; $fil++) {
        echo "<tr>";
        for ($col=0; $col<ANCHO; $col++) {
            if (isset($matriz[$fil][$col])) {
                $valor = $matriz[$fil][$col];
            } else {
                $valor = "--";
            }

            echo "<td>" . $valor . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

?>



<style>
    table, tr, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }
</style>

