<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/usuario.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre" value="<?=$_GET['nombre']?>">
        <label for="">apellido</label>
        <input type="text" name="apellido" value="<?=$_GET['apellido']?>">
        <label for="">sexo</label>
        <input type="text" name="sexo" value="<?=$_GET['sexo']?>">
        <label for="">direccion</label>
        <input type="text" name="direccion" value="<?=$_GET['direccion']?>">
        <label for="">telefono</label>
        <input type="number" name="telefono" value="<?=$_GET['telefono']?>">

        <button name="actualizarUsuario" value="1">Actualizar usuario</button>
        <input type="hidden" name="idUsuario" value="<?=$_GET['id']?>">
    </form>
</body>
</html>