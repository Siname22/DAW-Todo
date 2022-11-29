<html>
    <head>
        <title>Formulario en php</title>
    </head>
    <body>
    <-- Llamo al archivo procesar que lo hace es coger el dato del cliente-->
        <form action="procesar.php" method="post">
            <p>Pon cualquier palabra que quieras buscar:</p>
            <input type="search" name="palabraABuscar">
            <input type="submit" value="Buscar">
        </form>
    </body>
</html>