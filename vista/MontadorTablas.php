<?php
class TablaObjeto
{
    private $crud;

    function __construct($objeto)
    {
        // Creamos una instancia, para poder usar la función "obtieneTodos()"
        $this -> crud = $objeto;
    }

    function imprimirTabla()
    {
        $filas = $this -> crud -> obtieneTodos();
        
        // Si no hay datos en la tabla
        if (empty($filas))
        {
            return "<p>No hay datos para mostrar en la tabla.</p>";
        }
            // Se monta la tabla y se muestra
            else 
            {
                $resultado = "";
                $resultado .= '<table>';
                $resultado .= "<tr>";

                foreach ($filas[0] as $key => $value) 
                {
                    $resultado .= '<td>' . strtoupper($key) . '</td>';
                }

                $resultado .= "<td></td>";
                $resultado .= "<td></td>";

                $resultado .= "<tr>";

                foreach ($filas as $cadaFila) 
                {
                    $resultado .= "<tr>";

                    foreach ($cadaFila as $valor) 
                    {
                        $resultado .= '<td>' . $valor . '</td>';
                    }
            
                    $resultado .= '<td><button class = "botones-form1" type="submit" form="formularioBotones" name="actualizaFila" value="' . $cadaFila -> id . '">Actualizar</button></td>'; //Se usa el id de la fila para saber que fila se debe actualizar
                    $resultado .= '<td><button class = "botones-form1" type="submit" form="formularioBotones" name="borrarFila" value="' . $cadaFila -> id . '">Borrar</button></td>'; //Se usa el id de la fila para saber que fila se debe borrar
                    
                    $resultado .= "</tr>";
                }

                $resultado .= '</table>';

                return $resultado;
            }
    }
}
?>