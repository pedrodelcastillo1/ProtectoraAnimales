<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Animal</title>
    <link rel = "stylesheet" href = "../../styles/Vistas_Tablas_Formularios.css">
</head>
<body>
    <h1 class = "titulo">Actualizar Animal</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/animales3.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="/ProtectoraAnimales/Controlador/Controlador_Animal.php" method="POST">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?=$_GET['nombre']?>">

                <label for="">Especie</label>
                <input type="text" name="especie" value="<?=$_GET['especie']?>">

                <label for="">Raza</label>
                <input type="text" name="raza" value="<?=$_GET['raza']?>">

                <label for="">Genero</label>
                <input type="text" name="genero" value="<?=$_GET['genero']?>">

                <label for="">Color</label>
                <input type="text" name="color" value="<?=$_GET['color']?>">
                
                <label for="">Edad</label>
                <input type="number" name="edad" value="<?=$_GET['edad']?>">

                <button>Actualizar Animal</button>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
            </form>
        </div>
    </div>
</body>
</html>