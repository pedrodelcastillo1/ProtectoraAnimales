<?php

include_once '../modelo/Animal.php';
include_once '../vista/tablaDeCadaObjeto.php';

class ControladorAnimal
{
    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    public static function generarTabla()
    {
        $tablaGenerar=new TablaObjeto(new Animal()); // Se manda a la vista que pide la tabla usuario
        echo $tablaGenerar->imprimirTabla();
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

        echo $actualizarAnimal;

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

if (isset($_POST['id'])) 
{
    ControladorAnimal::actualizarAnimal();
}

if (isset($_GET['borrarFila'])) 
{
    ControladorAnimal::borrarFila();
}