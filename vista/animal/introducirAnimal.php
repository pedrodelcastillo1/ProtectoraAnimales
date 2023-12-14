<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Animal</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/animal.php" method="POST">
        <label for="">Nombre</label>
        <input type="text" name="nombre"><br>

        <label for="">Especie</label>
        <input type="text" name="especie"><br>

        <label for="">Raza</label>
        <input type="text" name="raza"><br>

        <label for="">Genero</label>
        <input type="text" name="genero"><br>

        <label for="">Color</label>
        <input type="text" name="color"><br>

        <label for="">Edad</label>
        <input type="number" name="edad"><br>

        <button name="botonInsertarPulsado" value="1">Introducir Animal</button>
    </form>
</body>
</html>