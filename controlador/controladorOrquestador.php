<?php
include '../vista/cabecera.php';//Al prinicpio simpre se añade la cabecera con los botones
include_once '../vista/tablaDeCadaObjeto.php';//Importamos la clase tabla para mostrar la tabla
include_once '../modelo/Usuario.php';
include_once '../controlador/usuarioControlador.php';
$tablaGenerar="";
if (isset($_GET['botonPulsado']) && $_GET['botonPulsado']=== "Usuario") {
    //Lleva a la vista de usuario.php
    // header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');
    $tablaGenerar=new TablaObjeto(new Usuario()); // Se manda a la vista que pide la tabla usuario
// }else if ($_GET['botonPulsado'] === "Animal") {

//     $tablaGenerar=new TablaObjeto(new Animal());
//     header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
// } else if ($_GET['botonPulsado'] === "Adopcion") {
//     $tablaGenerar=new TablaObjeto(new Animal());
//     header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
// }
if (isset($_GET['reclamoTabla'])) {

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

$tablaGenerar->imprimirTabla();
?>