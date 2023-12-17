<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Adopcion</title>
    <link rel = "stylesheet" href = "../../styles/Vistas_Tablas_Formularios.css">
</head>
<body>
    <h1 class = "titulo">Actualizar Adopción</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/adopcion3.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="/ProtectoraAnimales/Controlador/Controlador_Adopcion.php" method="POST">
                <label for="">ID_Animal</label>
                <input type="text" name="idAnimal" value="<?=$_GET['idAnimal']?>">

                <label for="">ID_Usuario</label>
                <input type="text" name="idUsuario" value="<?=$_GET['idUsuario']?>">

                <label for="">Fecha</label>
                <input type="date" name="fecha" value="<?=$_GET['fecha']?>">
                
                <label for="">Razón</label>
                <input type="text" name="razon" value="<?=$_GET['razon']?>">

                <button>Actualizar Adopcion</button>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
            </form>
        </div>
    </div>
</body>
</html>