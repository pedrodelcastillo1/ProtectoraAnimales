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

    public static function retrocederAPaginaPrincipal()
    {
        header('Location: http://localhost/ProtectoraAnimales'); // Cuando se pulsa el boton de ir hacia atras
    }
   
    public static function introducirUsuario()
    {
        header('Location: http://localhost/ProtectoraAnimales/vista/usuario/introducirUsuario.php'); // Te muestra la vista de introducir usuario
    }
   
    public static function insertarUsuario()
    {
        try 
        {
            if ($_POST["nombre"] === "" || $_POST["apellido"] === "" || $_POST["sexo"] === "" || $_POST["direccion"] === "" || $_POST["telefono"] === "") 
            {
                throw new Exception("No puede haber nada vacío", 1);
            }

            // Crear una instancia de la clase Crud para operar en la tabla de usuarios
            $crudUsuario = new Crud('usuarios');

            // Llamar al método crear de la clase Crud para insertar el usuario
            $crudUsuario -> crear();

            // Redireccionar después de la inserción
            header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
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

            $usuario=$usuario->obtieneDeId($_GET['actualizaFila']);

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

    public static function actualizarUsuario()
    {
        $actualizarUsuario = new Usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);

        $actualizarUsuario -> actualizar();

        header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
    }

    public static function borrarFila()
    {
        //Borrar fila especifica
        $usuario = new Usuario('', "", "", "", "", "");
        
        try 
        {
            $usuario->borrar($_GET['borrarFila']);
            // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
        } 
        
            catch (Exception $e) 
            {
                echo $e;
            }
    }
}

