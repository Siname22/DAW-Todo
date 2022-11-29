<?php
    //El comando request coge el dato que escriba al cliente
    $palabraABuscar = $_REQUEST["palabraABuscar"];

    //crea un texto plano que se muestra en el servidor.
    // Nos puede ayudar a depurar. El punto es para concatenar en php
    echo "hola".$palabraABuscar;
?>
<html>
    <script>
        var datoABuscar = "<?php echo $palabraABuscar ?>";
        location.href = "https://www.google.com/search?q=" + datoABuscar;
    </script>
</html>

