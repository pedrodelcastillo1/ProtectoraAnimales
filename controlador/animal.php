<?php

include_once '../modelo/Animal.php';

class ControladorAnimal
{
    public static function generarTabla()
    {
        echo self::formadorTablaHTML(); // Se manda a la vista que pide la tabla usuario
    }

    public static function retrocederAPaginaPrincipal()
    {
        header('Location: http://localhost/ProtectoraAnimales'); // Cuando se pulsa el boton de ir hacia atras
    }
   
    public static function introducirAnimal()
    {
        header('Location: http://localhost/ProtectoraAnimales/vista/animal/introducirAnimal.php'); // Te muestra la vista de introducir usuario
    }
   
    public static function insertarAnimal()
    {
        try 
        {
            if ($_POST["nombre"] === "" || $_POST["especie"] === "" || $_POST["raza"] === "" || $_POST["genero"] === "" || $_POST["color"] === "" || $_POST["edad"] === "") 
            {
                throw new Exception("No puede haber nada vacío", 1);
            }

            // Crear una instancia de la clase Crud para operar en la tabla de usuarios
            $crudAnimal = new Crud('animal');

            // Llamar al método crear de la clase Crud para insertar el usuario
            $crudAnimal -> crear();

            // Redireccionar después de la inserción
            header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e -> getMessage();
            }
    }

    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    private static function formadorTablaHTML()
    {
        $crud = new Animal("", "", "", "", "", "", "");

        $filas = $crud -> obtieneTodos();
        $resultado = "";
        $resultado .= '<table>';
        $resultado .= "<tr>";

        //Impirmiendo el nombre de las columnas
        $resultado .= '<td></td>';
        $resultado .= '<td></td>';

        foreach ($filas[0] as $key => $value) 
        {
            $resultado .= '<td>' . $key . '</td>';
        }

        $resultado .= "<tr>";

        //imprimiendo los valores de cada columna
        foreach ($filas as $cadaFila) 
        {
            echo "<pre>";

            $resultado .= "<tr>";
            
            $resultado .= '<td><button type="submit" form="formularioBotones" name="borrarFila" value="' . $cadaFila->id . '">borrar Fila</button></td>'; //Se usa el id de la fila para saber que fila se debe borrar
            
            $resultado .= '<td><button type="submit" form="formularioBotones" name="actualizaFila" value="' . $cadaFila->id . '">actualizar Fila</button></td>'; //Se usa el id de la fila para saber que fila se debe actualizar

            foreach ($cadaFila as $valor) 
            {
                $resultado .= '<td>' . $valor . '</td>';
            }

            $resultado .= "</tr>";
        }

        $resultado .= '</table>';

        echo $resultado;
    }

    public static function mostrarVistaActualizarAnimal()
    {
        //Actualizar fila
        try 
        {
            $pathFichero='http://localhost/ProtectoraAnimales/vista/animal/actualizarFilaAnimal.php?idAnimal='. $_GET['actualizaFila'];//ActualizarFila contiene el id del usuario a modificar
            $animal = new Animal();

            $animal = $animal -> obtieneDeId($_GET['actualizaFila']);

            foreach ($animal[0] as $key => $value) 
            {
                $pathFichero.="&".$key."=".$value;
            }

            header('Location:'. $pathFichero);
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }

    public static function actualizarAnimal()
    {
        $actualizarAnimal = new Animal($_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);

        $actualizarAnimal -> actualizar();

        header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
    }

    public static function borrarFila()
    {
        //Borrar fila especifica
        $animal = new Animal('', "", "", "", "", "", "");
        
        try 
        {
            $animal -> borrar($_GET['borrarFila']);
            header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }
}

if (isset($_GET['reclamoTabla'])) 
{
    ControladorAnimal::generarTabla();
}

if (isset($_GET['atras'])) 
{
    ControladorAnimal::retrocederAPaginaPrincipal();
}

if (isset($_GET['introducirAnimal'])) 
{
    ControladorAnimal::introducirAnimal();
}

if (isset($_POST['botonInsertarPulsado'])) 
{
    ControladorAnimal::insertarAnimal();
}

if (isset($_GET['actualizaFila'])) 
{
    ControladorAnimal::mostrarVistaActualizarAnimal();
}

if (isset($_POST['actualizarAnimal'])) 
{
    ControladorAnimal::actualizarAnimal();
}

if (isset($_GET['borrarFila'])) 
{
    ControladorAnimal::borrarFila();
}