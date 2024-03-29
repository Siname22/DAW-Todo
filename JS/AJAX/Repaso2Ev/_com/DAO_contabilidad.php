<?php

require_once "Clases_contabilidad.php";
require_once "Varios_contabilidad.php";

class DAO
{
    private static ?PDO $conexion = null;

    private static function obtenerPdoConexionBD(): PDO
    {
        $servidor = "localhost";
        $identificador = "root";
        $contrasenna = "root";
        $bd = "contabilidad"; // Schema
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES => false, // Modo emulación desactivado para prepared statements "reales"
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Que los errores salgan como excepciones.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // El modo de fetch que queremos por defecto.
        ];

        try {
            $pdo = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
        } catch (Exception $e) {
            error_log("Error al conectar: " . $e->getMessage());
            echo "\n\nError al conectar:\n" . $e->getMessage();
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        }

        return $pdo;
    }

    private static function garantizarConexion()
    {
        if (Self::$conexion == null) {
            Self::$conexion = Self::obtenerPdoConexionBd();
        }
    }

    private static function ejecutarConsulta(string $sql, array $parametros): array
    {
        Self::garantizarConexion();

        $select = Self::$conexion->prepare($sql);
        $select->execute($parametros);
        return $select->fetchAll(); // Se devuelve "el $rs"
    }

    // Devuelve:
    //   - null: si ha habido un error
    //   - int: el id autogenerado para el nuevo registro, si todo bien.
    private static function ejecutarInsert(string $sql, array $parametros): ?int
    {
        Self::garantizarConexion();

        $insert = Self::$conexion->prepare($sql);
        $sqlConExito = $insert->execute($parametros);

        if (!$sqlConExito) return null;
        else return Self::$conexion->lastInsertId();
    }

    // Ejecuta un Update o un Delete.
    // Devuelve:
    //   - null: si ha habido un error
    //   - 0, 1 u otro número positivo: OK (no errores) y estas son las filas afectadas.
    private static function ejecutarUpdel(string $sql, array $parametros): ?int
    {
        Self::garantizarConexion();

        $updel = Self::$conexion->prepare($sql);
        $sqlConExito = $updel->execute($parametros);

        if (!$sqlConExito) return null;
        else return $updel->rowCount();
    }


    /* CONCPETOS */

    private static function conceptoCrearDesdeFila(array $fila): Concepto
    {
        return new Concepto($fila["id"], $fila["nombre"]);
    }

    public static function conceptoObtenerPorId(int $id): ?Concepto
    {
        $rs = Self::ejecutarConsulta(
            "SELECT * FROM CONCEPTOS WHERE id=?",
            [$id]
        );

        if ($rs) {
            $fila = $rs[0];
            $concepto = Self::conceptoCrearDesdeFila($fila);
            return $concepto;
        } else {
            return null;
        }
    }

    public static function conceptoObtenerTodos(): array
    {
        $rs = Self::ejecutarConsulta(
            "SELECT * FROM CONCEPTOS ORDER BY nombre",
            []
        );

        $datos = [];
        foreach ($rs as $fila) {
            $concepto = Self::conceptoCrearDesdeFila($fila);
            array_push($datos, $concepto);
        }

        return $datos;
    }
/*
    public static function categoriaCrear(string $nombre): ?Categoria
    {
        $idAutogenerado = Self::ejecutarInsert(
            "INSERT INTO categoria (nombre) VALUES (?)",
            [$nombre]
        );

        if ($idAutogenerado == null) return null;
        else return Self::categoriaObtenerPorId($idAutogenerado);
    }

    public static function categoriaActualizar(Categoria $categoria): ?Categoria
    {
        $filasAfectadas = Self::ejecutarUpdel(
            "UPDATE categoria SET nombre=? WHERE id=?",
            [$categoria->getNombre(), $categoria->getId()]
        );

        if ($filasAfectadas === null) return null; // Necesario triple igual porque si no considera que 0 sí es igual a null
        else return $categoria;
    }
*/
    public static function categoriaEliminarPorId(int $id): bool
    {
        $filasAfectadas = Self::ejecutarUpdel(
            "DELETE FROM categoria WHERE id=?",
            [$id]
        );

        return ($filasAfectadas == 1);
    }

    public static function categoriaEliminar(Categoria $categoria): bool
    {
        return Self::categoriaEliminarPorId($categoria->getId());
    }



    /* GASTOS */

    private static function gastoCrearDesdeFila(array $fila): Gasto
    {
        return new Gasto((int)$fila["Id"], $fila["Ingreso_gasto"], $fila["Valor"], $fila["Descripcion"], $fila["Fecha"], (int)$fila["Id_concepto"]);
    }

    public static function gastoObtenerPorId(int $id): ?Gasto
    {
        $rs = Self::ejecutarConsulta(
            "SELECT * FROM GASTOS WHERE id=?",
            [$id]
        );

        if ($rs) return Self::gastoCrearDesdeFila($rs[0]);
        else return null;
    }

    public static function gastosObtenerTodos(): array
    {
        $datos = [];

        $rs = Self::ejecutarConsulta(
            "SELECT * FROM GASTOS ORDER BY fecha",
            []
        );

        foreach ($rs as $fila) {
            $gasto = Self::gastoCrearDesdeFila($fila);
            array_push($datos, $gasto);
        }

        return $datos;
    }

   /* public static function consultarTodasPersonasCategorias(): array
    {
        $datos = [];

        $rs = Self::ejecutarConsulta(
            "SELECT  persona.id, persona.nombre, apellidos, telefono, categoria.nombre as categoria, email  FROM persona, categoria WHERE persona.categoriaId=categoria.id ORDER BY nombre, apellidos",
            []
        );

        foreach ($rs as $fila) {
            $persona = Self::personaCrearDesdeFila($fila);
            array_push($datos, $persona);
        }

        return $datos;
    }*/
/*
    public static function personaCrear(string $nombre, string $apellidos, string $telefono, bool $estrella, int $categoriaId): ?Persona
    {
        $idAutogenerado = Self::ejecutarInsert(
            "INSERT INTO persona (nombre, apellidos, telefono, estrella, categoriaId) VALUES (?, ?, ?, ?, ?)",
            [$nombre, $apellidos, $telefono, $estrella ? 1 : 0, $categoriaId]
        );

        if ($idAutogenerado == null) return null;
        else return Self::personaObtenerPorId($idAutogenerado);
    }

    public static function personaActualizar(Persona $persona): ?Persona
    {
        $filasAfectadas = Self::ejecutarUpdel(
            "UPDATE persona SET nombre=?, apellidos=?, telefono=?, estrella=?, categoriaId=? WHERE id=?",
            [$persona->getNombre(), $persona->getApellidos(), $persona->getTelefono(), $persona->isEstrella() ? 1 : 0, $persona->getCategoriaId(), $persona->getId()]
        );

        if ($filasAfectadas === null) return null; // Necesario triple igual porque si no considera que 0 sí es igual a null
        else return $persona;
    } // TODO error del profe

    public static function personaEliminarPorId(int $id): bool
    {
        $filasAfectadas = Self::ejecutarUpdel(
            "DELETE FROM persona WHERE id=?",
            [$id]
        );

        return ($filasAfectadas == 1);
    }

    public static function personaEliminar(Persona $persona): bool
    {
        return Self::personaEliminarPorId($persona->id);
    }
    */
}