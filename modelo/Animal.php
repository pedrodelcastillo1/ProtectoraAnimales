<?php

require_once '../core/Crud.php';

class Animal extends Crud
{
    // Atributos privados
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $genero;
    private $color;
    private $edad;

    private $conexion;

    // Contiene el nombre de la tabla a la que se hará referencia y se guardarán los datos correspondientes. 
    const TABLA = "animal";

    // Constructor 
    public function __construct($id = "", $nombre = "", $especie = "", $raza = "", $genero = "", $color = "", $edad = "")
    {
        // Invoca al constructor padre enviándole el nombre de la tabla (definido en la constante de la clase)
        parent::__construct(self::TABLA);

        // Guarda en la propiedad conexión el manejador de la conexión que le devuelve la llamada a la función conexiónBBDD de la clase padre, CRUD.
        $this -> conexion = parent::conexionBBDD(); 

        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> especie = $especie;
        $this -> raza = $raza;
        $this -> genero = $genero;
        $this -> color = $color;
        $this -> edad = $edad;
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
        return "-[ANIMALITOS]- <br>" . "ID: " . $this -> id . ", Nombre: " . $this -> nombre . ", Especie: " . $this -> especie . ", Raza: " . $this -> raza . ", Género: " . $this -> genero . ", Color: " . $this -> color . ", Edad: " . $this -> edad . ". <br>";
    }

    /* ------------------------------------------------------------------------- Métodos ------------------------------------------------------------------------------------------------ */
    // Método Crear (implementación del método abstracto de la clase padre)
    /*public function crear()
    {
        try
        {   
            // Inserta mediante una consulta preparada en la tabla correspondiente (definida en la constante de la clase )
            $sqlInsert = "INSERT INTO " . self::TABLA . " (id, nombre, especie, raza, genero, color, edad) VALUES (:id, :nombre, :especie, :raza, :genero, :color, :edad)";

            // $this -> conexion, es el manejador de la conexion a la BBDD, lo escribimos asi por la sintaxis de POO
            $insertarPreparado = $this -> conexion -> prepare($sqlInsert);

            $insertarPreparado -> bindParam(":id", $this -> id);
            $insertarPreparado -> bindParam(":nombre", $this -> nombre);
            $insertarPreparado -> bindParam(":especie", $this -> especie);
            $insertarPreparado -> bindParam(":raza", $this -> raza);
            $insertarPreparado -> bindParam(":genero", $this -> genero);
            $insertarPreparado -> bindParam(":color", $this -> color);
            $insertarPreparado -> bindParam(":edad", $this -> edad);

            if ($insertarPreparado -> execute())
            {
                echo strtoupper($this -> especie) . " [". $this -> nombre . "], con [ID] Nº " . $this -> id . " registrado correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema registrando el nuevo usuario.";
                }
        }

            catch (PDOException $e)
            {
                echo "Error. Ha habido un problema registrando el nuevo animal (ID duplicado en la BBDD). <br>";
            }
    }

    // Método actualizar (implementación del método abstracto de la clase padre)
    public function actualizar()
    {
        try
        {
            // Hace una consulta preparada de tipo UPDATE en la tabla.
            // Actualizamos solo el usuario indicado con el ID
            $sqlUpdate = "UPDATE " . self::TABLA . " SET nombre = :nombre, especie = :especie, raza = :raza, genero = :genero, color = :color, edad = :edad WHERE id = :id";

            $actualizarPreparado = $this -> conexion -> prepare($sqlUpdate);

            $actualizarPreparado -> bindParam(":id", $this -> id);
            $actualizarPreparado -> bindParam(":nombre", $this -> nombre);
            $actualizarPreparado -> bindParam(":especie", $this -> especie);
            $actualizarPreparado -> bindParam(":raza", $this -> raza);
            $actualizarPreparado -> bindParam(":genero", $this -> genero);
            $actualizarPreparado -> bindParam(":color", $this -> color);
            $actualizarPreparado -> bindParam(":edad", $this -> edad);

            if ($actualizarPreparado -> execute())
            {
                echo "Datos de " . $this -> nombre . " actualizados correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema actualizando los datos de " . $this -> nombre . ".";
                }
        }

            catch (PDOException $e)
            {
                echo "Conexion fallida. " . $e -> getMessage();
            }
    }*/
}

?>