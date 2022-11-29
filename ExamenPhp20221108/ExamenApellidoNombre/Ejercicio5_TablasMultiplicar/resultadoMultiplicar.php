<?php
    $resultadoCliente = (int) $_REQUEST["resultadoCliente"];
    $resultado = (int) $_REQUEST["resultado"];
    $mensaje = "";
    $acierta = false;
    if ($resultado == $resultadoCliente){
        $mensaje = "Has acertado";
        $acierta = true;
    } else {
        $mensaje = "Te has equivocado, la respuesta es: ".$resultado;
    }
?>
<html>
    <h1><?=$mensaje?></h1>
    <a href="tablaMultiplicar.php?acierta=<?=$acierta?>">Volver a la tabla de multiplicar</a>
</html>
