<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Adopcion</title>
    <link rel = "stylesheet" href = "../../styles/form.css">
</head>
<body>
    <h1 class = "titulo">Introducir Nueva Adopcion</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/adopcion2.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="http://localhost/ProtectoraAnimales/controlador/adopcionControlador.php" method="POST">
                <label for="">Id Animal</label>
                <input type="text" name="idAnimal"><br>

                <label for="">Id Usuario</label>
                <input type="text" name="idUsuario"><br>

                <label for="">Fecha</label>
                <input type="date" name="fecha"><br>

                <label for="">Razon</label>
                <input type="text" name="razon"><br>

                <button name="botonInsertarPulsado" value="1">Introducir Adopción</button>
            </form>
        </div>
    </div>
</body>
</html>