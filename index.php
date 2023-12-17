<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Protectora de Animales Ciudad Escolar</title>
    <link rel = "stylesheet" href = "styles/Index.css">
    
    <!-- Transiciones entre páginas -->
    <style> body {opacity: 0; transition: opacity 1s ease;} body.loaded {opacity: 1;}</style>
    <script> window.addEventListener('load', function () {document.body.classList.add('loaded');}); </script>

</head>
<body>
    <h1 class = "titulo">Gestión de Protectora de Animales</h1>
    <div class = "contenedor-general">
        <form action="Controlador/Controlador_Orquestador.php" method="GET">
            <div class = "contenedor-especifico">
                <img class = "img" src = "styles/img/protectora.png">
                <button class = "botones" name="botonPulsado" value="Usuario">Usuarios</button>
            </div>

            <div class = "contenedor-especifico">
                <img class = "img" src = "styles/img/animales.png">
                <button class = "botones" name="botonPulsado" value="Animal">Animales</button>
            </div>
            
            <div class = "contenedor-especifico">
                <img class = "img" src = "styles/img/adopcion.png">
                <button  class = "botones"name="botonPulsado" value="Adopcion">Adopción</button>
            </div>
        </form>
    </div>
</body>
</html>