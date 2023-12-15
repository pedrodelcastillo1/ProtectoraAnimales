<?php

include_once '../modelo/Adopcion.php';
class ControladorAdopcion
{
    public static function generarTabla()
    {
        echo self::formadorTablaHTML(); // Se manda a la vista que pide la tabla usuario
    }

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


    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    private static function formadorTablaHTML()
    {
        $crud = new Adopcion("", "", "", "", ""); //es necesario crear un usuario para usar la funcion obtenerTodos

        $filas = $crud->obtieneTodos();
        $resultado = "";
        $resultado .= '<table>';
        $resultado .= "<tr>";

        //Impirmiendo el nombre de las columnas
        $resultado .= '<td></td>';
        $resultado .= '<td></td>';
        foreach ($filas[0] as $key => $value) {
            $resultado .= '<td>' . $key . '</td>';
        }

        $resultado .= "<tr>";

        //imprimiendo los valores de cada columna
        foreach ($filas as $cadaFila) {
            echo "<pre>";
            $resultado .= "<tr>";
            $resultado .= '<td><button type="submit" form="formularioBotones" name="borrarFila" value="' . $cadaFila->id . '">borrar Fila</button></td>'; //Se usa el id de la fila para saber que fila se debe borrar
            $resultado .= '<td><button type="submit" form="formularioBotones" name="actualizaFila" value="' . $cadaFila->id . '">actualizar Fila</button></td>'; //Se usa el id de la fila para saber que fila se debe actualizar
            foreach ($cadaFila as $valor) {
                $resultado .= '<td>' . $valor . '</td>';
            }

            $resultado .= "</tr>";
        }

        $resultado .= '</table>';
        echo $resultado;
    }
    public static function mostrarVistaActualizarAdopcion()
    {
        //Actualizar fila
        try {
            $pathFichero='http://localhost/ProtectoraAnimales/vista/adopcion/actualizarFilaAdopcion.php?idUsuario='. $_GET['actualizaFila'];//ActualizarFila contiene el id del usuario a modificar
            $adopcion=new Adopcion();
            $adopcion=$adopcion->obtieneDeId($_GET['actualizaFila']);
            foreach ($adopcion[0] as $key => $value) {
                $pathFichero.="&".$key."=".$value;
            }
            header('Location:'. $pathFichero);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public static function actualizarAdopcion()
    {
        $actualizarAdopcion = new Adopcion($_POST['idAdopcion'],$_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
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
if (isset($_POST['actualizarAdopcion'])) {

    ControladorAdopcion::actualizarAdopcion();
}
if (isset($_GET['borrarFila'])) {
    ControladorAdopcion::borrarFila();
}
