<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de Animales - Gestión de Adopciones</title>
    <link rel="stylesheet" href="../../styles/vistasTablas.css">
    <style>
        body {
            opacity: 0;
            transition: opacity 1s ease;
        }

        body.loaded {
            opacity: 1;
        }
    </style>

    <script>
        window.addEventListener('load', function () {
            document.body.classList.add('loaded');
        });
    </script>
</head>
<body>
    <div class="contenedor-general1">
        <h1 class = "titulo">Tabla Adopción</h1>
        <?php
            $location='http://localhost/ProtectoraAnimales/controlador/adopcionControlador.php?reclamoTabla="1"';//es un poco burdo poner esto hardcodeado directamente, pero es la unica forma que se me ha ocurrido
            $header=array('Content-Type: text/html; charset=utf-8');
        
            $mandarCurl=curl_init();
            
            //Se introducen algunos paremetros
            curl_setopt($mandarCurl,CURLOPT_URL,$location);//a donde se manda (la ruta)
            curl_setopt($mandarCurl,CURLOPT_HTTPHEADER,$header);//le pasamos el header que especifica el tipo MIME o MIMO siempre tengo dudas :)
            curl_setopt($mandarCurl,CURLOPT_POST,true);//le indicamos que no va a tener un cuerpo
            curl_setopt($mandarCurl,CURLOPT_NOBODY,false);//indicamos que tiene que haber cuerpo ya que recibimos el html por el
            // curl_setopt($mandarCurl,CURLOPT_POSTFIELDS,formadorTablaHTML($_GET['botonPulsado']));
            
            curl_setopt($mandarCurl,CURLOPT_SSL_VERIFYPEER,false);//Sin ssl, osea que no es necesario tener ssl
            
            //Realiza un curl hacia el controlador para pedirle las tabla de usuario
            $tabla= curl_exec($mandarCurl);//Se recive el body y se imprime
            $tabla= substr($tabla,0,-1);//Quitamos el caracter 1 que indica que se ha realizado correctmanete la transacción
            echo $tabla;
            curl_close($mandarCurl);
        ?>

        <form id="formularioBotones" action="http://localhost/ProtectoraAnimales/controlador/adopcionControlador.php" method="GET"></form>

        <div class="botones-form">
            <button form="formularioBotones" name="introducirAdopcion" value="1">Introducir una Nueva Adopción</button><br>
            <button form="formularioBotones" name="atras" value="1">Atrás</button>
        </div>
    </div>
</body>
</html>