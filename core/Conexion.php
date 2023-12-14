<?php 
require_once 'const.php';

class Conexion 
{
    // Atributos privados - Parámetros de conexión a la BBDD
    private $serverName = SERVERNAME;
    private $dbName = DVNAME;
    private $userName = USERNANME;
    private $password = PASSWORD;
    private $charset = CHARSET;

    // Método Protegido - Realiza la conexión a la BBDD y devuelve el manejador de la conexión
    protected function conexionBBDD()
    {
        try
        {
            // Manejador para la conexión a la BBDD - Usamos $this -> para hacer referencia a las propiedades de la clase
            $ManejadorConexionBBDD = new PDO("mysql:host={$this -> serverName};dbname={$this -> dbName};charset={$this -> charset}", $this -> userName, $this -> password);

            // Control de errores
            $ManejadorConexionBBDD -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Devolvemos el manejador de la conexión
            return $ManejadorConexionBBDD;
        }
            // No se ha podido conectar a la BBDD
            catch (PDOException $e)
            {
                echo "Error. Fallo de conexión con la Base de Datos: Protectora de Animales.";
                return; 
            }
    }
}


?>