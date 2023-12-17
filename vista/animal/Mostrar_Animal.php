<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de Animales - Gestión de Animales</title>
    <link rel="stylesheet" href="../../styles/Vistas_Tablas.css">
    
    <!-- Transiciones entre páginas -->
    <style> body {opacity: 0; transition: opacity 1s ease;} body.loaded {opacity: 1;}</style>
    <script> window.addEventListener('load', function () {document.body.classList.add('loaded');}); </script>

</head>
<body>
    <div class="contenedor-general1">
        <h1 class = "titulo">Tabla Animales</h1>
        <?php

            // Se define la URL a la que se le enviará la solicitud POST
            $location='https://localhost/ProtectoraAnimales/Controlador/Controlador_Animal.php?reclamoTabla="1"';

            // Se definen los encabezados HTTP que se incluirán en la solicitud POST
            $header = array('Content-Type: text/html; charset=utf-8');

            // Se crea una nueva sesión cURL (Client URL)
            $mandarCurl = curl_init();

            // Establecemos algunos parámetros de la sesión 
            curl_setopt($mandarCurl,CURLOPT_URL,$location); // URL de la solicitud
            curl_setopt($mandarCurl,CURLOPT_HTTPHEADER,$header); // Encabezados HTTP
            curl_setopt($mandarCurl,CURLOPT_POST,true); // Habilitar solicitud POST
            curl_setopt($mandarCurl,CURLOPT_NOBODY,false); // Incluye el cuerpo de la respuesta, en la salida 
            curl_setopt($mandarCurl,CURLOPT_SSL_VERIFYPEER,false); // Deshabilitar la verificación del certificado SSL

            // Realiza la solicitud cURL y almacena la respuesta en la variable $tabla
            $tabla= curl_exec($mandarCurl);

            // Elimina el último carácter de la respuesta (puede ser un carácter de salto de linea o nueva linea)
            $tabla= substr($tabla,0,-1);

            // Imprime la tabla
            echo $tabla;

            // Cierra la sesión cURL
            curl_close($mandarCurl);

        ?>

        <form id="formularioBotones" action="/ProtectoraAnimales/Controlador/Controlador_Animal.php" method="GET"></form>

        <div class="botones-form">
            <button form="formularioBotones" name="insertarAnimal" value="1">Introducir un Nuevo Animal</button><br>
            <button form="formularioBotones" name="atras" value="1">Atrás</button>
        </div>
    </div>
</body>
</html>