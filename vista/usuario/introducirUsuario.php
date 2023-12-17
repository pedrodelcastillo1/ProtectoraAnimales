<?php
    class IntroducirVistaUsuario{


    public function __construct(){
    }
    public function imprimirIntroducir(){
        echo '<form action="http://localhost/ProtectoraAnimales/controlador/controladorOrquestador.php" method="GET">
            <label for="">nombre</label>
            <input type="text" name="nombre">
            <label for="">apellido</label>
            <input type="text" name="apellido">
            <label for="">sexo</label>
            <input type="text" name="sexo">
            <label for="">direccion</label>
            <input type="text" name="direccion">
            <label for="">telefono</label>
            <input type="number" name="telefono">
            <button name="botonInsertarPulsado" value="1">Insertar Usuario</button>
            <input type="hidden" name="nombreTabla" value="Usuario">
        </form>';
    }
}
?>

