<?php

include_once '../modelo/Usuario.php';
include_once '../vista/tablaDeCadaObjeto.php';
class ControladorUsuario
{
    public static function generarTabla()
    {

        self::formadorTablaHTML(); // Se manda a la vista que pide la tabla usuario
        
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
        //Si no se cumple ninguno de esto significa que estas en la vista introducirUsuario.php
        try {
            if ($_POST["nombre"] === "" || $_POST["apellido"] === "" || $_POST["sexo"] === "" || $_POST["direccion"] === "" || $_POST["telefono"] === "") {
                throw new Exception("No puede haber nada vacio", 1);
            }
            $insertarUsuario = new Usuario("", $_POST["nombre"], $_POST["apellido"], $_POST["sexo"], $_POST["direccion"], $_POST["telefono"]);
            $insertarUsuario->crear();
            header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    private static function formadorTablaHTML()
    {
        $tablaGenerar=new TablaObjeto(new Usuario());
        echo $tablaGenerar->imprimirTabla();
    }
    public static function mostrarVistaActualizarUsuario()
    {
        //Actualizar fila
        try {
            $pathFichero='http://localhost/ProtectoraAnimales/vista/usuario/actualizarFilaUsuario.php?idUsuario='. $_GET['actualizaFila'];//ActualizarFila contiene el id del usuario a modificar
            $usuario=new Usuario();
            $usuario=$usuario->obtieneDeId($_GET['actualizaFila']);
            foreach ($usuario[0] as $key => $value) {
                $pathFichero.="&".$key."=".$value;
            }
            header('Location:'. $pathFichero);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public static function actualizarUsuario()
    {
        $actualizarUsuario = new Usuario($_POST['idUsuario'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
        $actualizarUsuario->actualizar();
        header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
    }

    public static function borrarFila()
    {
        //Borrar fila especifica
        $usuario = new Usuario('', "", "", "", "", "");
        try {
            $usuario->borrar($_GET['borrarFila']);
            header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
        } catch (Exception $e) {
            echo $e;
        }
    }
}


if (isset($_GET['reclamoTabla'])) {

    ControladorUsuario::generarTabla();
}
if (isset($_GET['atras'])) {

    ControladorUsuario::retrocederAPaginaPrincipal();
}
if (isset($_GET['introducirUsuario'])) {
    ControladorUsuario::introducirUsuario();
}
if (isset($_POST['botonInsertarPulsado'])) {

    ControladorUsuario::insertarUsuario();
}
if (isset($_GET['actualizaFila'])) {
    ControladorUsuario::mostrarVistaActualizarUsuario();
}
if (isset($_POST['actualizarUsuario'])) {

    ControladorUsuario::actualizarUsuario();
}
if (isset($_GET['borrarFila'])) {
    ControladorUsuario::borrarFila();
}
