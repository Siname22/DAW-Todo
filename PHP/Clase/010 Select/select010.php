<?pvarios.phphp
    $ciudades = [
        17 => "Donosti",
        8 => "Getafe",
        4 => "Toledo",
        71 => "Granada",
        52 => "Lugo",
        47 => "Zaragoza"
    ];
?>

<html>
    <body>
        <h1> Select de Ciudades</h1>
        <form>
            <select name = "ciudades">
                <?php
                    foreach ( $ciudades as $id => $ciudad){
                        echo"<option value = $id>$ciudad</option>";
                    }
                ?>
            </select>
        </form>
    </body>
</html>