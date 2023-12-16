<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="formularioBotones" action="http://localhost/ProtectoraAnimales/controlador/usuarioControlador.php" method="GET">
        <button name="atras"value="1">atras</button>
        <button name="introducirUsuario" value="1">Introducir un nuevo usuario</button>
    </form>
    <?php
        
        $location='http://localhost/ProtectoraAnimales/controlador/usuarioControlador.php?reclamoTabla="1"';//es un poco burdo poner esto hardcodeado directamente, pero es la unica forma que se me ha ocurrido
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
    
</body>
</html>