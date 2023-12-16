<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/usuarioControlador.php" method="POST">
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
        <button name="botonInsertarPulsado" value="1">Introducir Usuario</button>
    </form>
</body>
</html>