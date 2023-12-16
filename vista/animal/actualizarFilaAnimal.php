<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Animal</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/animalControlador.php" method="POST">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?=$_GET['nombre']?>">
        <label for="">Especie</label>
        <input type="text" name="especie" value="<?=$_GET['especie']?>">
        <label for="">Raza</label>
        <input type="text" name="raza" value="<?=$_GET['raza']?>">
        <label for="">Genero</label>
        <input type="text" name="genero" value="<?=$_GET['genero']?>">
        <label for="">Color</label>
        <input type="number" name="color" value="<?=$_GET['color']?>">
        <label for="">Edad</label>
        <input type="number" name="edad" value="<?=$_GET['edad']?>">

        <button>Actualizar Animal</button>
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
    </form>
</body>
</html>