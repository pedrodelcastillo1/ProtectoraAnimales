<?php 

require_once '../core/Crud.php';

class Usuario extends Crud
{
    // Atributos privados 
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    
    // ¿Edad?, no parece que haga falta
    // private $edad;

    private $conexion;

    // Contiene el nombre de la tabla a la que se hará referencia y se guardarán los datos correspondientes. 
    const TABLA = "usuarios";

    // Constructor 
    public function __construct($id="", $nombre="", $apellido="", $sexo="", $direccion="", $telefono="")
    {
        // Invoca al constructor padre enviándole el nombre de la tabla (definido en la constante de la clase)
        parent::__construct(self::TABLA);

        // Guarda en la propiedad conexión el manejador de la conexión que le devuelve la llamada a la función conexión de la clase padre.
        $this -> conexion = parent::conexionBBDD(); 

        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> sexo = $sexo;
        $this -> direccion = $direccion;
        $this -> telefono = $telefono;
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

    public function __toString()
    {
        return "-[USUARIOS]- <br>" . "ID: " . $this -> id . ", Nombre: " . $this -> nombre . ", Apellidos: " . $this -> apellido . ", Sexo: " . $this -> sexo . ", Direccion: " . $this -> direccion . ", Telefono: " . $this -> telefono . ". <br>";
    }
}

?>