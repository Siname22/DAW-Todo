<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Formulario</title>
</head>

<body>

<h1>Calculadora</h1>

<form action='110b-CalculadoraResultado.php'>
    <input type='number' name='operando1'>

    <select name='codigoOperacion'>
        <option value='sum'>Suma</option>
        <option value='res'>Resta</option>
        <option value='mul'>Multiplicación</option>
        <option value='div'>Division</option>
    </select>

    <input type='number' name='operando2'>

    <input type='submit' value='Enviar'>
</form>

</body>

</html>