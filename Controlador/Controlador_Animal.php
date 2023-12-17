<?php

include_once '../Modelo/Animal.php';
include_once '../Vista/MontadorTablas.php';

class ControladorAnimal
{
    // Generador de la tabla correspondiente, que se muestra en la Vista
    public static function generarTabla()
    {
        $tablaGenerar = new TablaObjeto(new Animal());
        echo $tablaGenerar -> imprimirTabla();
    }

    // Botón de retroceder, que redigire a la página principal
    public static function retrocederAPaginaPrincipal()
    {
        header('Location: /ProtectoraAnimales');
    }
   
    // Redirección a la Vista del formulario para introducir un animal
    public static function insertarAnimal()
    {
        header('Location: /ProtectoraAnimales/Vista/Animal/Insertar_Animal.php');
    }
   
    // Crear un nuevo animal
    public static function crearAnimal()
    {
        try 
        {
            // Si en el formulario hay parámetros vacíos
            if ($_POST["nombre"] === "" || $_POST["especie"] === "" || $_POST["raza"] === "" || $_POST["genero"] === "" || $_POST["color"] === "" || $_POST["edad"] === "") 
            {
                throw new Exception("No puede haber nada vacío", 1);
            }

            // Crear una instancia de la clase Crud para operar en la tabla de animales
            $crudAnimal = new Crud('animal');

            // Llamar al método crear de la clase Crud para insertar el animal
            $crudAnimal -> crear();

            // Redireccionar después de la inserción
            header('Location: /ProtectoraAnimales/Vista/Animal/Mostrar_Animal.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e -> getMessage();
            }
    }

    // Muestra la vista de los animales actualizada
    public static function mostrarVistaActualizarAnimal()
    {
        try 
        {
            //ActualizarFila contiene el ID del animal a modificar
            $pathFichero='/ProtectoraAnimales/Vista/Animal/Actualizar_Animal.php?idAnimal='. $_GET['actualizaFila'];
            
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

    // Actualiza el animal correspondiente
    public static function actualizarAnimal()
    {
        $actualizarAnimal = new Animal($_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);

        $actualizarAnimal -> actualizar();

        header('Location: /ProtectoraAnimales/Vista/Animal/Mostrar_Animal.php');
    }

    // Borra el animal de la fila correspondiente
    public static function borrarFila()
    {
        //Borrar fila especifica
        $animal = new Animal('', "", "", "", "", "", "");
        
        try 
        {
            $animal -> borrar($_GET['borrarFila']);
            header('Location: /ProtectoraAnimales/Vista/Animal/Mostrar_Animal.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }
}

// Llamadas correspondientes a los botones pulsados / requeridos en el momento
if (isset($_GET['reclamoTabla'])) 
{
    ControladorAnimal::generarTabla();
}

if (isset($_GET['atras'])) 
{
    ControladorAnimal::retrocederAPaginaPrincipal();
}

if (isset($_GET['insertarAnimal'])) 
{
    ControladorAnimal::insertarAnimal();
}

if (isset($_POST['botonInsertarPulsado'])) 
{
    ControladorAnimal::crearAnimal();
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