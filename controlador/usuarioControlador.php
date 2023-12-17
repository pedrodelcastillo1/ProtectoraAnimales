<?php

include_once '../modelo/Usuario.php';
include_once '../vista/tablaDeCadaObjeto.php';
class ControladorUsuario
{
    
    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    public static function generarTabla()
    {
        $tablaGenerar=new TablaObjeto(new Usuario()); // Se manda a la vista que pide la tabla usuario
        echo $tablaGenerar->imprimirTabla();
        
    }

   
    public static function introducirUsuario()
    {
        include '../vista/usuario/introducirUsuario.php';
        $interfazIntroducirUsuario=new IntroducirVistaUsuario();
        $interfazIntroducirUsuario->imprimirIntroducir();
        // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/introducirUsuario.php'); // Te muestra la vista de introducir usuario
    }
   
    public static function insertarUsuario()
    {
        try 
        {
            if ($_GET["nombre"] === "" || $_GET["apellido"] === "" || $_GET["sexo"] === "" || $_GET["direccion"] === "" || $_GET["telefono"] === "") 
            {
                throw new Exception("No puede haber nada vacío", 1);
            }

            // Crear una instancia de la clase Crud para operar en la tabla de usuarios
            $crudUsuario = new Crud('usuarios');

            // Llamar al método crear de la clase Crud para insertar el usuario
            $crudUsuario -> crear();

            // Redireccionar después de la inserción
            // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e -> getMessage();
            }
    }



    public static function mostrarVistaActualizarUsuario()
    {
        //Actualizar fila
        try 
        {
            $pathFichero='http://localhost/ProtectoraAnimales/vista/usuario/actualizarFilaUsuario.php?idUsuario='. $_GET['actualizaFila'];//ActualizarFila contiene el id del usuario a modificar
            $usuario=new Usuario();

            $usuario=$usuario->obtieneDeId($_GET['actualizaFila'])[0];//devuelve el objeto de tipo stdClass 

            include_once '../vista/usuario/actualizarFilaUsuario.php';
            $formularioActualizar=new ActualizarVistaUsuario($usuario);
            $formularioActualizar->imprimirActualizar();
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }

    public static function actualizarUsuario()
    {
        $interfazActualizarUsuario = new Usuario($_GET['id'], $_GET['nombre'], $_GET['apellido'], $_GET['sexo'], $_GET['direccion'], $_GET['telefono']);
        $interfazActualizarUsuario -> actualizar();
        // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
    }

    public static function borrarFila()
    {
        //Borrar fila especifica
        $usuario = new Usuario('', "", "", "", "", "");
        
        try 
        {
            $usuario->borrar($_GET['borrarFila']);
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }
}
if (isset($_GET['reclamoTabla'])) {

    ControladorUsuario::generarTabla();
}

if (isset($_GET['botonIntroducirPulsado'])) 
{
    ControladorUsuario::introducirUsuario();
}

if (isset($_GET['botonInsertarPulsado'])) 
{
    ControladorUsuario::insertarUsuario();
}

if (isset($_GET['actualizaFila'])) 
{
    ControladorUsuario::mostrarVistaActualizarUsuario();
}

if (isset($_GET['id'])) 
{
    ControladorUsuario::actualizarUsuario();
}

if (isset($_GET['borrarFila'])) 
{
    ControladorUsuario::borrarFila();
}
