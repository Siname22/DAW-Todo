<?php
    $limiteIteracionFibonacci = 0;
    $fibonacciArray = [0, 1];
    $sumaFibonacci = 0;
    if (isset($_REQUEST["limiteIteracionFibonacci"])){
        $limiteIteracionFibonacci=(int) $_REQUEST["limiteIteracionFibonacci"];
    }


    function fibonacci($limiteIteracionFibonacci, $fibonacciArray)
    {

        for ($i = 2; $i <= $limiteIteracionFibonacci; $i++) {
            $fibonacciArray[] = $fibonacciArray[$i - 1] + $fibonacciArray[$i - 2];
        }
        return $fibonacciArray;
    }
    $fibonacciArray = fibonacci($limiteIteracionFibonacci, $fibonacciArray);

    for ($i= 0; $i < $limiteIteracionFibonacci; $i ++) {
        $sumaFibonacci += $fibonacciArray[$i];
    }
?>




<html lang="es">
    <body>
    <?php
    if ($limiteIteracionFibonacci > 0){
        ?>
        <h1> El valor de la posicion del limite de Fibonacci es :<?=$fibonacciArray[$limiteIteracionFibonacci-1]?> y la
            suma de los valore es : <?= $sumaFibonacci?> </h1>
        <?php
    }
    ?>
    <p>Pon las iteraciones que desees ejecutar de Fibonacci:</p>
    <form>
        <label> <input type="number" name="limiteIteracionFibonacci" value="<?=$limiteIteracionFibonacci?>"> </label>
        <label> <input type="submit" name="btnEmpezarFibonacci" value="EMPEZAR FIBONACCI"> </label>
    </form>

    </body>
</html