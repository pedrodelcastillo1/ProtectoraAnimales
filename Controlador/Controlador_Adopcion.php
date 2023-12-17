<?php

include_once '../Modelo/Adopcion.php';
include_once '../Vista/MontadorTablas.php';

class ControladorAdopcion
{
    // Generador de la tabla correspondiente, que se muestra en la Vista
    public static function generarTabla()
    {
        $tablaGenerar = new TablaObjeto(new Adopcion());
        echo $tablaGenerar -> imprimirTabla();
    }

    // Botón de retroceder, que redigire a la página principal 
    public static function retrocederAPaginaPrincipal()
    {
        header('Location: /ProtectoraAnimales');
    }

    // Redirección a la Vista del formulario para introducir una adopción 
    public static function insertarAdopcion()
    {
        header('Location: /ProtectoraAnimales/Vista/Adopcion/Insertar_Adopcion.php');
    }

    // Crear una nueva adopción
    public static function crearAdopcion()
    {
        try 
        {
            // Si en el formulario hay parámetros vacíos
            if ($_POST["idAnimal"] === "" || $_POST["idUsuario"] === "" || $_POST["fecha"] === "" || $_POST["razon"] === "") 
            {
                throw new Exception("No puede haber nada vacio", 1);
            }

            // Se crea el objeto y se llama a la función correspondiente para crear
            $crearAdopcion = new Adopcion("", $_POST["idAnimal"], $_POST["idUsuario"], $_POST["fecha"], $_POST["razon"]);
            $crearAdopcion -> crear();

            // Al crearse e insertarse el objeto correctamente, se redirije automáticamente a la Vista con todas las tablas 
            header('Location: /ProtectoraAnimales/Vista/Adopcion/Mostrar_Adopcion.php');
        } 

            catch (Exception $e) 
            {
                echo $e -> getMessage();
            }
    }

    // Muestra la vista de las adopciones actualizada
    public static function mostrarVistaActualizarAdopcion()
    {
        try 
        {
            //ActualizarFila contiene el ID de la adopcion a modificar
            $pathFichero = '/ProtectoraAnimales/Vista/Adopcion/Actualizar_Adopcion.php?idUsuario=' . $_GET['actualizaFila']; 
           
            $adopcion = new Adopcion();

            $adopcion = $adopcion -> obtieneDeId($_GET['actualizaFila']);
            
            foreach ($adopcion[0] as $key => $value) 
            {
                $pathFichero .= "&" . $key . "=" . $value;
            }

            header('Location:' . $pathFichero);
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }

    // Crea las adopciones
    public static function actualizarAdopcion()
    {
        $actualizarAdopcion = new Adopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
        
        $actualizarAdopcion -> actualizar();
        
        header('Location: /ProtectoraAnimales/Vista/Adopcion/Mostrar_Adopcion.php');
    }

    // Borra la adopcion de la fila correspondiente
    public static function borrarFila()
    {
        //Borrar fila especifica
        $adopcion = new Adopcion('', "", "", "", "");
        
        try 
        {
            $adopcion -> borrar($_GET['borrarFila']);
            header('Location: /ProtectoraAnimales/Vista/Adopcion/Mostrar_Adopcion.php');
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
    ControladorAdopcion::generarTabla();
}

if (isset($_GET['atras'])) 
{
    ControladorAdopcion::retrocederAPaginaPrincipal();
}

if (isset($_GET['insertarAdopcion'])) 
{
    ControladorAdopcion::insertarAdopcion();
}

if (isset($_POST['botonInsertarPulsado'])) 
{
    ControladorAdopcion::crearAdopcion();
}

if (isset($_GET['actualizaFila'])) 
{
    ControladorAdopcion::mostrarVistaActualizarAdopcion();
}

if (isset($_POST['id'])) 
{
    ControladorAdopcion::actualizarAdopcion();
}

if (isset($_GET['borrarFila']))
{
    ControladorAdopcion::borrarFila();
}