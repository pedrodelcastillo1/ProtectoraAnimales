<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Adopcion</title>
</head>
<body>
    <form action="http://localhost/ProtectoraAnimales/controlador/adopcion.php" method="POST">
        <label for="">Id Animal</label>
        <input type="text" name="id_animal"><br>

        <label for="">Id Usuario</label>
        <input type="text" name="id_usuario"><br>

        <label for="">Fecha</label>
        <input type="date" name="fecha"><br>

        <label for="">Razon</label>
        <input type="text" name="razon"><br>

        <button name="botonInsertarPulsado" value="1">Introducir Adopcion</button>
    </form>
</body>
</html>