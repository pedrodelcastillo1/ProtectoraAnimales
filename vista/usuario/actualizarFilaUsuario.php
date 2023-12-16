<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel = "stylesheet" href = "../../styles/form.css">
</head>
<body>
    <h1 class = "titulo">Actualizar Usuario</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/user2.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="http://localhost/ProtectoraAnimales/controlador/usuarioControlador.php" method="POST">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?=$_GET['nombre']?>">

                <label for="">Apellido</label>
                <input type="text" name="apellido" value="<?=$_GET['apellido']?>">

                <label for="">Sexo</label>
                <input type="text" name="sexo" value="<?=$_GET['sexo']?>">

                <label for="">Direccion</label>
                <input type="text" name="direccion" value="<?=$_GET['direccion']?>">

                <label for="">Telefono</label>
                <input type="text" name="telefono" value="<?=$_GET['telefono']?>">

                <button>Actualizar Usuario</button>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
            </form>
        </div>
    </div>
</body>
</html>