<?php
    $palabraABuscar = $_REQUEST['palabraABuscar'];
    echo 'Hola '. $palabraABuscar;
?>

<html>
    <script>
        var datoABuscar = "<?php echo $palabraABuscar ?>";
        location.href = "https://www.google.com/search?q=" + datoABuscar;
    </script>
</html>

