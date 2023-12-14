<?php

include_once '../modelo/Usuario.php';
class ControladorUsuario
{
    public static function generarTabla(){
            echo self::formadorTablaHTML(); // Se manda a la vista que pide la tabla usuario
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
            try{
                if($_POST["nombre"]==="" || $_POST["apellido"]==="" || $_POST["sexo"]==="" || $_POST["direccion"]==="" || $_POST["telefono"]===""){
                throw new Exception("No puede haber nada vacio", 1);
                
                }
                $insertarUsuario = new Usuario("", $_POST["nombre"], $_POST["apellido"], $_POST["sexo"], $_POST["direccion"], $_POST["telefono"]);
                $insertarUsuario->crear();
                header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
            }catch(Exception $e){
                echo $e->getMessage();

            }
    }


    //Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
    private static function formadorTablaHTML()
    {
        $crud = new Usuario("", "", "", "", "", ""); //es necesario crear un usuario para usar la funcion obtenerTodos

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
    public static function mostrarVistaActualizarUsuario()
    {
        //Actualizar fila
            try {
                header('Location: http://localhost/ProtectoraAnimales/vista/usuario/actualizarFilaUsuario.php?idUsuario='.$_GET['actualizaFila']);//Se le pasa por parametro el id (es una mala practica)
            } catch (Exception $e) {
                echo $e;
            }
        
    }
    public static function actualizarUsuario(){
            $actualizarUsuario=new Usuario($_POST['idUsuario'], $_POST['nombre'], $_POST['apellido'],$_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
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
        if(isset($_POST['actualizarUsuario'])){

ControladorUsuario::actualizarUsuario();
        }
        if (isset($_GET['borrarFila'])) {
            ControladorUsuario::borrarFila();
        }

?>