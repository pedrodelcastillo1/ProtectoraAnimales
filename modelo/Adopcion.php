<?php

require_once '../core/Crud.php';

class Adopcion extends Crud
{
    // Atributos privados
    private $id;
    private $idAnimal;
    private $idUsuario;
    private $fecha;
    private $razon;

    private $conexion;

    // Contiene el nombre de la tabla a la que se hará referencia y se guardarán los datos correspondientes. 
    const TABLA = "adopcion";

    // Constructor 
    public function __construct($id, $idAnimal, $idUsuario, $fecha, $razon)
    {
        // Invoca al constructor padre enviándole el nombre de la tabla (definido en la constante de la clase)
        parent::__construct(self::TABLA);

        // Guarda en la propiedad conexión el manejador de la conexión, que devuelve la llamada a la función conexiónBBDD() de la clase padre, CRUD.
        $this -> conexion = parent::conexionBBDD(); 

        $this -> id = $id;
        $this -> idAnimal = $idAnimal;
        $this -> idUsuario = $idUsuario;
        $this -> fecha = $fecha;
        $this -> razon = $razon;
    }

    // Métodos mágicos __get y __set
    // __get
    public function __get($propiedad)
    {
        if (property_exists($this, $propiedad))
        {
            return $this -> $propiedad; 
        }

            else 
            {
                echo "La propiedad " . $propiedad . " no existe en la clase.";
            }
    }

    // __set
    public function __set($propiedad, $valor)
    {
        if (property_exists($this, $propiedad))
        {
            $this -> $propiedad = $valor;
        }

            else 
            {
                echo "La propiedad " . $propiedad . " no existe en la clase.";
            }
    }

    // toString para mostrar los datos, por si hiciera falta en el futuro
    public function __toString()
    {
        return "-[ADOPCIONES]- <br>" . "ID: " . $this -> id . ", ID Usuario: " . $this -> idUsuario . ", Fecha: " . $this -> fecha . ", Razon: " . $this -> razon . ". <br>";
    }

    /* ------------------------------------------------------------------------- Métodos ------------------------------------------------------------------------------------------------ */ 
    // Método Crear (implementación del método abstracto de la clase padre)
    public function crear()
    {
        try
        {
            // Inserta mediante una consulta preparada en la tabla correspondiente (definida en la constante de la clase)
            $sqlInsert = "INSERT INTO " . self::TABLA . " (id, idAnimal, idUsuario, fecha, razon) VALUES (:id, :idAnimal, :idUsuario, :fecha, :razon)";

            // $this -> conexion, es el manejador de la conexion a la BBDD, lo escribimos asi por la sintaxis de POO
            $insertarPreparado = $this -> conexion -> prepare($sqlInsert);

            $insertarPreparado -> bindParam(":id", $this -> id);
            $insertarPreparado -> bindParam(":idAnimal", $this -> idAnimal);
            $insertarPreparado -> bindParam(":idUsuario", $this -> idUsuario);
            $insertarPreparado -> bindParam(":fecha", $this -> fecha);
            $insertarPreparado -> bindParam(":razon", $this -> razon);

            if ($insertarPreparado -> execute())
            {
                echo "La adopción se ha registrado correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema registrando el nuevo usuario.";
                }
        }

            catch (PDOException $e)
            {
                echo "Error. Ha habido un problema registrando la nueva adopción (ID duplicado en la BBDD). <br>";
            }
    }

    // Método actualizar (implementación del método abstracto de la clase padre)
    public function actualizar()
    {
        try
        {
            // Hace una consulta preparada de tipo UPDATE en la tabla.
            // Actualizamos solo el usuario indicado con el ID, con el WHERE 
            $sqlUpdate = "UPDATE " . self::TABLA . " SET idAnimal = :idAnimal, idUsuario = :idUsuario, fecha = :fecha, razon = :razon WHERE id = :id";

            $actualizarPreparado = $this -> conexion -> prepare($sqlUpdate);

            $actualizarPreparado -> bindParam(":id", $this -> id);
            $actualizarPreparado -> bindParam(":idAnimal", $this -> idAnimal);
            $actualizarPreparado -> bindParam(":idUsuario", $this -> idUsuario);
            $actualizarPreparado -> bindParam(":fecha", $this -> fecha);
            $actualizarPreparado -> bindParam(":razon", $this -> razon);

            if ($actualizarPreparado -> execute())
            {
                echo "Datos de la adopcion Nº" . $this -> id . " actualizados correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema actualizando los datos de la adopción Nº" . $this -> id . ".";
                }
        }

            catch (PDOException $e)
            {
                echo "Conexion fallida. " . $e -> getMessage();
            }
    }
}

?>