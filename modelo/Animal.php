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
}

?>