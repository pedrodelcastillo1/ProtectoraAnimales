<?php
include_once '../modelo/Adopcion.php';

if (isset($_GET['reclamoTabla']))
{
    echo formadorTablaHTML(); // Se manda a la vista que pide la tabla usuario
}

else if (isset($_GET['atras']))
{
    header('Location: http://localhost/ProtectoraAnimales'); // Cuando se pulsa el boton de ir hacia atras
}

else if (isset($_GET['introducirAdopcion']))
{
    header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/introducirAdopcion.php'); // Te muestra la vista de introducir usuario
}

//Si no se cumple ninguno de esto significa que estas en la vista introducirUsuario.php
if (isset($_POST['botonInsertarPulsado']))
{
    $insertarAdopcion = new Adopcion("",$_POST["idAnimal"],$_POST["idUusario"],$_POST["fecha"],$_POST["razon"]);
    $insertarAdopcion -> crear();
    header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/introducirAdopcion.php');
}


//Creador de tabla html para todas las clases (Adopcion,Animal,Usuario)
function formadorTablaHTML()
{
    $crud = new Adopcion("", "", "", "", "", "", "");

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
?>