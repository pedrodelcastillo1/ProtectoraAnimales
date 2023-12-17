<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de Animales - Gestión de Usuarios</title>
    <link rel="stylesheet" href="../../styles/Vistas_Tablas.css">
    
    <!-- Transiciones entre páginas -->
    <style> body {opacity: 0; transition: opacity 1s ease;} body.loaded {opacity: 1;}</style>
    <script> window.addEventListener('load', function () {document.body.classList.add('loaded');}); </script>
    
</head>
<body>
    <div class="contenedor-general1">
    <h1 class = "titulo">Tabla Usuarios</h1>
        <?php
            $location = 'https://localhost/ProtectoraAnimales/Controlador/Controlador_Usuario.php?reclamoTabla="1"';
            $header = array('Content-Type: text/html; charset=utf-8');

            $mandarCurl = curl_init();

            curl_setopt($mandarCurl, CURLOPT_URL, $location);
            curl_setopt($mandarCurl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($mandarCurl, CURLOPT_POST, true);
            curl_setopt($mandarCurl, CURLOPT_NOBODY, false);
            curl_setopt($mandarCurl, CURLOPT_SSL_VERIFYPEER, false);

            $tabla = curl_exec($mandarCurl);
            $tabla = substr($tabla, 0, -1);
            echo $tabla;
            curl_close($mandarCurl);
        ?>
        <form id="formularioBotones" action="/ProtectoraAnimales/Controlador/Controlador_Usuario.php" method="GET"></form>

        <div class="botones-form">
            <button form="formularioBotones" name="introducirUsuario" value="1">Introducir un Nuevo Usuario</button><br>
            <button form="formularioBotones" name="atras" value="1">Atrás</button>
        </div>
    </div>
</body>
</html>