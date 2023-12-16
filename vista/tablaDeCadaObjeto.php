<?php
class TablaObjeto{
    private $crud;
    function __construct($objeto){
        $this->crud = $objeto; //es necesario crear un usuario para usar la funcion obtenerTodos
    }

    function imprimirTabla(){

        $filas = $this->crud->obtieneTodos();
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
}
?>