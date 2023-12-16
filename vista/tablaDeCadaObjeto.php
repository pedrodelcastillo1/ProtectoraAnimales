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
        foreach ($filas[0] as $key => $value) 
        {
            $resultado .= '<td>' . strtoupper($key) . '</td>';
        }

        $resultado .= "<td></td>";
        $resultado .= "<td></td>";
        $resultado .= "<tr>";

        //imprimiendo los valores de cada columna
        foreach ($filas as $cadaFila) 
        {
            $resultado .= "<tr>";

            foreach ($cadaFila as $valor) 
            {
                $resultado .= '<td>' . $valor . '</td>';
            }
       
            $resultado .= '<td><button class = "botones-form1" type="submit" form="formularioBotones" name="actualizaFila" value="' . $cadaFila->id . '">Actualizar</button></td>'; //Se usa el id de la fila para saber que fila se debe actualizar
            $resultado .= '<td><button class = "botones-form1" type="submit" form="formularioBotones" name="borrarFila" value="' . $cadaFila->id . '">Borrar</button></td>'; //Se usa el id de la fila para saber que fila se debe borrar
            
            $resultado .= "</tr>";
        }

        $resultado .= '</table>';
        return $resultado;
    }
}
?>