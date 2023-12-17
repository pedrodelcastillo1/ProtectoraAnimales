<?php
    class ActualizarVistaUsuario{

    private $valoresInput;

    public function __construct($valoresInput){
        $this->valoresInput=$valoresInput;
    }
    
    public function imprimirActualizar(){
        echo ' <form action="http://localhost/ProtectoraAnimales/controlador/controladorOrquestador.php" method="GET">
            <label for="">nombre</label>
            <input type="text" name="nombre" value="'.$this->valoresInput->nombre.'">
            <label for="">apellido</label>
            <input type="text" name="apellido" value="'.$this->valoresInput->apellido.'">
            <label for="">sexo</label>
            <input type="text" name="sexo" value="'.$this->valoresInput->sexo.'">
            <label for="">direccion</label>
            <input type="text" name="direccion" value="'.$this->valoresInput->direccion.'">
            <label for="">telefono</label>
            <input type="number" name="telefono" value="'.$this->valoresInput->telefono.'">
        
            <button>Actualizar usuario</button>
            <input type="hidden" name="id" value="'.$this->valoresInput->id.'">
            <input type="hidden" name="nombreTabla" value="Usuario">
        </form>';
    }
}
?>

