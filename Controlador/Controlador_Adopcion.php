<?php

include_once '../modelo/Adopcion.php';
include_once '../vista/tablaDeCadaObjeto.php';
class ControladorAdopcion
{
    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    public static function generarTabla()
    {
        $tablaGenerar=new TablaObjeto(new Adopcion()); // Se manda a la vista que pide la tabla usuario
        echo $tablaGenerar->imprimirTabla();
    }
    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    public static function retrocederAPaginaPrincipal()
    {
        header('Location: http://localhost/ProtectoraAnimales'); // Cuando se pulsa el boton de ir hacia atras
    }
    public static function introducirAdopcion()
    {
        header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/introducirAdopcion.php'); // Te muestra la vista de introducir usuario
    }
    public static function insertarAdopcion()
    {
        //Si no se cumple ninguno de esto significa que estas en la vista introducirUsuario.php
        try {
            if ($_POST["idAnimal"] === "" || $_POST["idUsuario"] === "" || $_POST["fecha"] === "" || $_POST["razon"] === "") {
                throw new Exception("No puede haber nada vacio", 1);
            }
            $insertarAdopcion = new Adopcion("", $_POST["idAnimal"], $_POST["idUsuario"], $_POST["fecha"], $_POST["razon"]);
            $insertarAdopcion->crear();
            header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function mostrarVistaActualizarAdopcion()
    {
        //Actualizar fila
        try {
            $pathFichero = 'http://localhost/ProtectoraAnimales/vista/adopcion/actualizarFilaAdopcion.php?idUsuario=' . $_GET['actualizaFila']; //ActualizarFila contiene el id del usuario a modificar
            $adopcion = new Adopcion();
            $adopcion = $adopcion->obtieneDeId($_GET['actualizaFila']);
            foreach ($adopcion[0] as $key => $value) {
                $pathFichero .= "&" . $key . "=" . $value;
            }
            header('Location:' . $pathFichero);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public static function actualizarAdopcion()
    {
        $actualizarAdopcion = new Adopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
        $actualizarAdopcion->actualizar();
        header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
    }

    public static function borrarFila()
    {
        //Borrar fila especifica
        $adopcion = new Adopcion('', "", "", "", "");
        try {
            $adopcion->borrar($_GET['borrarFila']);
            header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
        } catch (Exception $e) {
            echo $e;
        }
    }
}

if (isset($_GET['reclamoTabla'])) {
    ControladorAdopcion::generarTabla();
}
if (isset($_GET['atras'])) {

    ControladorAdopcion::retrocederAPaginaPrincipal();
}
if (isset($_GET['introducirAdopcion'])) {
    ControladorAdopcion::introducirAdopcion();
}
if (isset($_POST['botonInsertarPulsado'])) {

    ControladorAdopcion::insertarAdopcion();
}
if (isset($_GET['actualizaFila'])) {
    ControladorAdopcion::mostrarVistaActualizarAdopcion();
}
if (isset($_POST['id'])) {

    ControladorAdopcion::actualizarAdopcion();
}
if (isset($_GET['borrarFila'])) {
    ControladorAdopcion::borrarFila();
}
