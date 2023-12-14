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
    public function __construct($id, $nombre, $apellido, $sexo, $direccion, $telefono)
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

    /* ------------------------------------------------------------------------- Métodos ------------------------------------------------------------------------------------------------ */ 
    // Método Crear (implementación del método abstracto de la clase padre)
    public function crear()
    {
        try
        {
            // Inserta mediante una consulta preparada en la tabla correspondiente (definida en la constante de la clase)
            $sqlInsert = "INSERT INTO " . self::TABLA . " (nombre, apellido, sexo, direccion, telefono) VALUES (:nombre, :apellido, :sexo, :direccion, :telefono)";

            // $this -> conexion, es el manejador de la conexion a la BBDD, lo escribimos asi por la sintaxis de POO
            $insertarPreparado = $this -> conexion -> prepare($sqlInsert);

            $insertarPreparado -> bindParam(":nombre", $this -> nombre);
            $insertarPreparado -> bindParam(":apellido", $this -> apellido);
            $insertarPreparado -> bindParam(":sexo", $this -> sexo);
            $insertarPreparado -> bindParam(":direccion", $this -> direccion);
            $insertarPreparado -> bindParam(":telefono", $this -> telefono);

            if ($insertarPreparado -> execute())
            {
                echo "Usuario [". $this -> nombre . " " . $this -> apellido . "], con [ID] Nº " . $this -> id . " registrado correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema registrando el nuevo usuario.";
                }
        }

            catch (PDOException $e)//Cuidado esto no tiene porque ser por la id mejor usar el $e
            {
                echo $e;
                // echo "Error. Ha habido un problema registrando el nuevo usuario (ID duplicado en la BBDD). <br>";
            }
    }

    // Método actualizar (implementación del método abstracto de la clase padre)
    public function actualizar()
    {
        try
        {
            // Hace una consulta preparada de tipo UPDATE en la tabla.
            // Actualizamos solo el usuario indicado con el ID
            $sqlUpdate = "UPDATE " . self::TABLA . " SET nombre = :nombre, apellido = :apellido, sexo = :sexo, direccion = :direccion, telefono = :telefono WHERE id = :id";

            $actualizarPreparado = $this -> conexion -> prepare($sqlUpdate);

            $actualizarPreparado -> bindParam(":id", $this -> id);
            $actualizarPreparado -> bindParam(":nombre", $this -> nombre);
            $actualizarPreparado -> bindParam(":apellido", $this -> apellido);
            $actualizarPreparado -> bindParam(":sexo", $this -> sexo);
            $actualizarPreparado -> bindParam(":direccion", $this -> direccion);
            $actualizarPreparado -> bindParam(":telefono", $this -> telefono);

            if ($actualizarPreparado -> execute())
            {
                echo "Usuario actualizado correctamente. <br>";
            }

                else 
                {
                    echo "Error. Ha habido un problema actualizando el usuario.";
                }
        }

            catch (PDOException $e)
            {
                echo "Conexion fallida. " . $e -> getMessage();
            }
    }
}


?>