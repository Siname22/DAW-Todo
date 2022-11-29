<?php
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>

<body>

    <h1>Nueva categoría</h1>

    <form method='get' action='CategoriasStore.php'>

        <label for='nombre'>Nombre</label>
        <input type='text' id='nombre' name='nombre' />

        <br><br>

        <input type='submit' name='crear' value='Crear categoría' />

    </form>

    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

</body>

</html>
