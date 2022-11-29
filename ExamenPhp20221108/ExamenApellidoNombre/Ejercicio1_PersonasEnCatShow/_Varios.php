<?php
	declare(strict_types=1);

	function obtenerPdoConexionBD(): PDO
	{
		$servidor = "localhost";
		$bd = "agenda";
		$identificador = "root";
		$contrasenna = "";
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];

        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
        } catch (Exception $e) {
            loguearError("Error al conectar: " . $e->getMessage());
            exit("Error al conectar");
        }

		return $conexion;
	}

	// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
	function redireccionar(string $url)
	{
		header("Location: $url");
		exit;
	}

	function loguearError(string $contenido)
	{
		// El error se vuelca a /opt/lampp/logs/php_error.log (o el equivalente según instalación).
		file_put_contents('php://stderr', $contenido . "\n");
	}
?>
