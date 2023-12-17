<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Adopcion</title>
    <link rel = "stylesheet" href = "../../styles/Vistas_Tablas_Formularios.css">
</head>
<body>
    <h1 class = "titulo">Introducir Nueva Adopcion</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/adopcion2.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="/ProtectoraAnimales/Controlador/Controlador_Adopcion.php" method="POST">
                <label for="">ID Animal</label>
                <input type="number" name="idAnimal"><br>

                <label for="">ID Usuario</label>
                <input type="number" name="idUsuario"><br>

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