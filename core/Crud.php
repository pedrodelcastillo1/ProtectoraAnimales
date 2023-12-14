<?php

require_once 'Conexion.php';

abstract class Crud extends Conexion
{
    // Atributos privados - Tabla (Nombre de la tabla a operar) y Conexion (Manejador de la conexion a la BBDD)
    private $tabla; 
    private $conexion;
    
    // Constructor 
    public function __construct($tabla)
    {
        $this -> tabla = $tabla;

        // Asigna a la propiedad conexion el manejador devuelto por la llamada a la función conexionBBDD() en la clase padre, Conexion
        $this -> conexion = parent::conexionBBDD(); 
    }

    /* Métodos */ 
    public function obtieneTodos()
    {
        try 
        {
            // Hace una consulta preparada en la que devuelve todos los registros de la tabla que está asignada a la propiedad tabla
            $sqlConsulta = "SELECT * FROM " . $this -> tabla;
            $tablaResultado = $this -> conexion -> prepare($sqlConsulta);

            $tablaResultado -> execute();

            // Se guardan como un objeto
            $datosTabla = $tablaResultado -> fetchAll(PDO::FETCH_OBJ);

            return $datosTabla;
        }

            catch (PDOException $e)
            {
                echo "Error. No se han podido obtener los datos correctamente." . $e -> getMessage();
            }
    }

    public function obtieneDeId($id)
    {
        try 
        {
            // Devuelve el resultado de una consulta preparada de la tabla que figura en la propiedad tabla que coincida con el id que le ha llegado como parámetro.
            $sqlConsultaID = "SELECT * FROM " . $this -> tabla . " WHERE id = :id";
            $tablaResultado = $this -> conexion -> prepare($sqlConsultaID);

            $tablaResultado -> bindParam(":id", $id);

            $tablaResultado -> execute();

            // Se guardan los registros como un objeto
            $datosTabla = $tablaResultado -> fetchAll(PDO::FETCH_OBJ);

            // Si el fetch no devuelve datos, significa que no hay registros en la BBDD
            if (!$datosTabla)
            {
                echo "No hay registros con el ID ingresado.";
            }

            return $datosTabla;
        }

            catch (PDOException $e)
            {
                echo "Error. No se han podido obtener los datos correctamente." . $e -> getMessage();
            }
    }

    public function borrar($id)
    {
        try 
        {
            // Devuelve el resultado de una consulta preparada de la tabla, si el ID pasado por parámetro figura en la tabla a la que se hace referencia
            $sqlConsultaBorrado = "SELECT * FROM " . $this -> tabla . " WHERE id = :id";
            $tablaResultado = $this -> conexion -> prepare($sqlConsultaBorrado);

            $tablaResultado -> bindParam(":id", $id);

            $tablaResultado -> execute();

            $datosTabla = $tablaResultado -> fetch(PDO::FETCH_OBJ);

            if (!$datosTabla) 
            {
                echo "El ID introducido no existe en la tabla " . $this -> tabla;
            } 

                else 
                {
                    $sqlBorrado = "DELETE FROM " . $this -> tabla . " WHERE id = :id";
                    $registroBorrado = $this -> conexion -> prepare($sqlBorrado);
                    $registroBorrado -> bindParam(":id", $id);
                    $registroBorrado -> execute();

                    echo "Registro borrado correctamente.";
                    echo "<br>";
                }
        }

            catch (PDOException $e)
            {
                echo "Error. No se han podido obtener los datos correctamente." . $e -> getMessage();
            }
    }

    // Métodos abstractos a implementar en las clases hijas y/o automatizarlas aquí en la clase padre
    abstract function crear();
    abstract function actualizar();

}

?>