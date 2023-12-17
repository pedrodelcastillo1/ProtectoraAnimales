<?php

require_once 'Conexion.php';

class Crud extends Conexion
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

    // Recoge toda la información de la tabla a la que hace referencia
    private function obtenerColumnasTabla()
    {
        $consulta = "DESCRIBE " . $this -> tabla;
        $resultado = $this -> conexion -> query($consulta);
        $columnas = $resultado -> fetchAll(PDO::FETCH_COLUMN);
        return $columnas;
    }

    // Métodos crear y actualizar
    public function crear()
    {
        try 
        {
            // Validar que hay datos en el formulario
            if (empty($_POST)) 
            {
                throw new Exception("No hay datos para insertar", 1);
            }

            // Obtener las columnas válidas de la tabla
            $columnasValidas = $this -> obtenerColumnasTabla();

            // Filtrar las claves del array $_POST para incluir solo las columnas válidas
            $columnasPost = array_intersect(array_keys($_POST), $columnasValidas);

            // Excluir el campo 'botonInsertarPulsado' si está presente
            $columnasPost = array_diff($columnasPost, ['botonInsertarPulsado']);

            // Construir la consulta SQL
            $sqlInsert = "INSERT INTO " . $this -> tabla . " (";
            $sqlValues = "VALUES (";

            foreach ($columnasPost as $columna) 
            {
                $sqlInsert .= "$columna, ";
                $sqlValues .= ":$columna, ";
            }

            $sqlInsert = rtrim($sqlInsert, ", ") . ") ";
            $sqlValues = rtrim($sqlValues, ", ") . ")";
            
            $sqlFinal = $sqlInsert . $sqlValues;

            // Preparar la consulta
            $insertarDatos = $this -> conexion -> prepare($sqlFinal);

            // Asignar valores a los parámetros desde $_POST
            foreach ($columnasPost as $columna) 
            {
                $insertarDatos -> bindParam(":$columna", $_POST[$columna]);
            }

            // Ejecutar la inserción
            $insertarDatos -> execute();
        } 
            
            catch (PDOException $e) 
            {
                echo "Error al crear el registro: Violación de Integridad, no existen los datos en la Base de Datos";
            }
    }

    public function actualizar()
    {
        try 
        {
            $columnasUpdate = $_POST;

            // Validar que hay datos en el formulario
            if (empty($_POST)) 
            {
                throw new Exception("No hay datos para actualizar", 1);
            }

            // Obtener las columnas válidas de la tabla
            $columnasValidas = $this -> obtenerColumnasTabla();

            // Excluir el campo 'botonInsertarPulsado' si está presente
            array_pop($columnasUpdate);

            // Construir la consulta SQL de actualización
            $sqlUpdate = "UPDATE " . $this -> tabla . " SET ";

            foreach ($columnasUpdate as $key => $columna)
            {
                $sqlUpdate .= "$key = '$columna', ";
            }

            $sqlUpdate = rtrim($sqlUpdate, ", ") . " ";
            $sqlWhere = "WHERE id = " . $_POST['id']; // Cambia 'id' por la columna que actúa como identificador único

            $sqlFinal = $sqlUpdate . $sqlWhere;

            // Preparar la consulta
            $actualizarDatos = $this -> conexion -> prepare($sqlFinal);
           
            // Ejecutar la actualización
            $actualizarDatos -> execute();
        } 

            catch (Exception $e) 
            {
                echo "Error al actualizar el registro: No existen los datos introducidos en la BBDD.";
                exit();
            }
    }
}

?>