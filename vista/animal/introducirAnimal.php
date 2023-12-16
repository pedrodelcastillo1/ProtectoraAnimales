<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Animal</title>
    <link rel = "stylesheet" href = "../../styles/form.css">
</head>
<body>
    <h1 class = "titulo">Introducir Nuevo Animal</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/animales2.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="http://localhost/ProtectoraAnimales/controlador/animalControlador.php" method="POST">
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
        </div>
    </div>
</body>
</html>