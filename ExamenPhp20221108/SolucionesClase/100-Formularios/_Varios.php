<?php
	// (Esta función no se utiliza en este proyecto pero se deja por si se optimizase el flujo de navegación.)
	// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
	function redireccionar(string $url)
	{
		header("Location: $url");
		exit;
	}

	function syso(string $contenido)
	{
		file_put_contents('php://stderr', $contenido . "\n");
	}
?>
