<?php

include_once '../Modelo/Usuario.php';
include_once '../Vista/MontadorTablas.php';

class ControladorUsuario
{
    // Generador de la tabla correspondiente, que se muestra en la Vista
    public static function generarTabla()
    {
        $tablaGenerar = new TablaObjeto(new Usuario());
        echo $tablaGenerar -> imprimirTabla();
    }

    // Botón de retroceder, que redigire a la página principal
    public static function retrocederAPaginaPrincipal()
    {
        header('Location: /ProtectoraAnimales');
    }
   
    // Redirección a la Vista del formulario para introducir un usuario
    public static function introducirUsuario()
    {
        header('Location: /ProtectoraAnimales/Vista/Usuario/Insertar_Usuario.php'); 
    }
   
    // Crear un nuevo usuario
    public static function insertarUsuario()
    {
        try 
        {
            // Si en el formulario hay parámetros vacíos
            if ($_POST["nombre"] === "" || $_POST["apellido"] === "" || $_POST["sexo"] === "" || $_POST["direccion"] === "" || $_POST["telefono"] === "") 
            {
                throw new Exception("No puede haber nada vacío", 1);
            }

            // Crear una instancia de la clase Crud para operar en la tabla de usuarios
            $crudUsuario = new Crud('usuarios');

            // Llamar al método crear de la clase Crud para insertar el usuario
            $crudUsuario -> crear();

            // Redireccionar después de la inserción
            header('Location: /ProtectoraAnimales/Vista/Usuario/Mostrar_Usuario.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e -> getMessage();
            }
    }

    // Muestra la vista de los animales actualizada
    public static function mostrarVistaActualizarUsuario()
    {
        try 
        {
            //ActualizarFila contiene el ID del animal a modificar
            $pathFichero ='/ProtectoraAnimales/Vista/Usuario/Actualizar_Usuario.php?idUsuario='. $_GET['actualizaFila'];
            
            $usuario = new Usuario();

            $usuario = $usuario -> obtieneDeId($_GET['actualizaFila']);

            foreach ($usuario[0] as $key => $value) 
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

    // Actualiza el usuario correspondiente
    public static function actualizarUsuario()
    {
        $actualizarUsuario = new Usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);

        $actualizarUsuario -> actualizar();

        header('Location: /ProtectoraAnimales/Vista/Usuario/Mostrar_Usuario.php');
    }

    // Borra el animal de la fila correspondiente
    public static function borrarFila()
    {
        //Borrar fila especifica
        $usuario = new Usuario('', "", "", "", "", "");
        
        try 
        {
            $usuario -> borrar($_GET['borrarFila']);
            header('Location: /ProtectoraAnimales/Vista/Usuario/Mostrar_Usuario.php');
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
    ControladorUsuario::generarTabla();
}

if (isset($_GET['atras'])) 
{
    ControladorUsuario::retrocederAPaginaPrincipal();
}

if (isset($_GET['introducirUsuario'])) 
{
    ControladorUsuario::introducirUsuario();
}

if (isset($_POST['botonInsertarPulsado'])) 
{
    ControladorUsuario::insertarUsuario();
}

if (isset($_GET['actualizaFila'])) 
{
    ControladorUsuario::mostrarVistaActualizarUsuario();
}

if (isset($_POST['id'])) 
{
    ControladorUsuario::actualizarUsuario();
}

if (isset($_GET['borrarFila'])) 
{
    ControladorUsuario::borrarFila();
}
