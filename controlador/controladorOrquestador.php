<?php
include '../vista/cabecera.php';//Al prinicpio simpre se añade la cabecera con los botones
include_once '../vista/tablaDeCadaObjeto.php';//Importamos la clase tabla para mostrar la tabla
include_once '../modelo/Usuario.php';
include_once '../modelo/Animal.php';
include_once '../modelo/Adopcion.php';
$tablaGenerar="";
$importarControlador="";
//header
//Primero revisa si le llega algun parametro botonPulsado, que ocurre cuando se pulsa algun boton del header
if(isset($_GET['botonPulsado']) && !isset($_GET['nombreTabla'])){

    if($_GET['botonPulsado']==="Usuario"){
        //Lleva a la vista de usuario.php
        // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
        $tablaGenerar=new TablaObjeto(new Usuario()); // Se manda a la vista que pide la tabla usuario
        
    }else if ($_GET['botonPulsado'] === "Animal") {
        
        $tablaGenerar=new TablaObjeto(new Animal());
        echo "1";
        // header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
        
    } else if ($_GET['botonPulsado'] === "Adopcion") {
        
        $tablaGenerar=new TablaObjeto(new Adopcion());
        // header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
        
    }
    $tablaGenerar->imprimirTabla();
}

//Cuando se pulsa algun boton de la tabla

if (isset($_GET['nombreTabla'])) { 
    if($_GET['nombreTabla']==="Usuario"){
        $tablaGenerar=new TablaObjeto(new Usuario());
        $importarControlador='usuarioControlador.php';
    }else if($_GET['nombreTabla']==="Adopcion"){
        $tablaGenerar=new TablaObjeto(new Adopcion());
        $importarControlador='adopcionControlador.php';
    }else if($_GET['nombreTabla']==="Animal"){
        $tablaGenerar=new TablaObjeto(new Animal());
        $importarControlador='animalControlador.php';
    }
    include_once $importarControlador;
    $tablaGenerar->imprimirTabla();
}

//Esto se puede meter en el if de arriba
//Corresponde a cuando se actualiza

//Si es de tipo usuario de debe de incluir el controlador usuario
?>