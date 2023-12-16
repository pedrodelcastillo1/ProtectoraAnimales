<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Nuevo Usuario</title>
    <link rel = "stylesheet" href = "../../styles/form.css">
</head>
<body>
    <h1 class = "titulo">Introducir Nuevo Usuario</h1>
    <div class = "contenedor-general">
        <div class = "contenedor-imagen">
            <img src = "../../styles/img/user.png">
        </div>
        
        <div class = "contenedor-form">
            <form action="http://localhost/ProtectoraAnimales/controlador/usuarioControlador.php" method="POST">
                <label for="">Nombre</label>
                <input type="text" name="nombre">
        
                <label for="">Apellido</label>
                <input type="text" name="apellido">
        
                <label for="">Sexo</label>
                <input type="text" name="sexo">
        
                <label for="">Direccion</label>
                <input type="text" name="direccion">
        
                <label for="">Telefono</label>
                <input type="number" name="telefono">
        
                <button name="botonInsertarPulsado" value="1">Introducir Usuario</button>
            </form>
        </div>
    </div>
</body>
</html>