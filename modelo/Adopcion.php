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
    public function __construct($id="", $idAnimal="", $idUsuario="", $fecha="", $razon="")
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
}

?>