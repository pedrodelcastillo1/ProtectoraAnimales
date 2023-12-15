<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/adopcion.php" method="POST">
        <label for="">id_animal</label>
        <input type="text" name="idAnimal" value="<?=$_GET['idAnimal']?>">
        <label for="">id_usuario</label>
        <input type="text" name="idUsuario" value="<?=$_GET['idUsuario']?>">
        <label for="">fecha</label>
        <input type="date" name="fecha" value="<?=$_GET['fecha']?>">
        <label for="">razon</label>
        <input type="text" name="razon" value="<?=$_GET['razon']?>">

        <button name="actualizarAdopcion" value="1">Actualizar adopcion</button>
        <input type="hidden" name="idAdopcion" value="<?=$_GET['id']?>">
    </form>
</body>
</html>