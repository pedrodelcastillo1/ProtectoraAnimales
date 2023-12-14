<style> @import url('https://fonts.googleapis.com/css2?family=Archivo&display=swap'); body{font-family: Archivo;} </style>

<?php 
require_once '../core/Crud.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Animal.php';
require_once '../modelo/Adopcion.php';

$tablaUsuarios = "usuarios";
$tablaAnimal = "animal";
$tablaAdopcion = "adopcion";

// Para mostrar los datos en general
function mostrarDatos($datos, $instanciaClase)
{
    foreach ($datos as $instanciaClase) 
    {
        echo "<li>";
    
        foreach ($instanciaClase as $tipoDato => $valor) 
        {
            echo "<strong><u>" . ucfirst($tipoDato) . "</u></strong>" . ": " . ucfirst($valor) . ",  ";
        }
    
        echo "</li>";
    }
}

/* ------------------------------------------------------------------------------------------------------- */  

/* ------------ Crear un script index.php en el que utilizando los métodos correspondientes: ------------- */
// • Se crean 3 animales, se borre uno, y se actualice otro cambiando alguna de las propiedades.
echo "<h2>Se crean 3 animales</h2>";
$animal1 = new Animal(10, "Toby", "Perro", "Rottweiler", "Macho", "Marrón oscuro", "7");
$animal2 = new Animal(11, "Alexa", "Gato", "Persa", "Hembra", "Negro", "4");
$animal3 = new Animal(12, "Thor", "Perro", "Golden Retriever", "Macho", "Blanco", "8");

$animal1 -> crear();
$animal2 -> crear();
$animal3 -> crear();

echo "<br>";

$datosAnimales = $animal1 -> obtieneTodos();
mostrarDatos($datosAnimales, $animal1);

echo "<h3>Prueba de busqueda por ID - Animales</h3>";

$datosAnimales1 = $animal1 -> obtieneDeId(9);
mostrarDatos($datosAnimales1, $animal1);

echo "<h2>Se borra 1</h2>";
//$animal1 -> borrar(11); 

echo "<h2>Se actualiza otro cambiando alguna de las propiedades</h2>";
$animal1 -> nombre = "Foxy";
$animal1 -> actualizar();

echo "<br>";

mostrarDatos($datosAnimales, $animal1);

/* -------------------------------------------------------------------------------------------------------*/
/* -------------------------------------------------------------------------------------------------------*/
echo "________________________________________________________________________________________________________________________________________________"; 

// • Se crean 3 usuarios, se borre uno y se actualice otro cambiando alguna de las propiedades.
echo "<h2>Se crean 3 usuarios</h2>";
$usuario1 = new Usuario(7, 'Christian', 'Peraza', 'Masculino', 'Sector Foresta 11, 3A', '656890887');
$usuario2 = new Usuario(8, 'Tamara', 'Peraza', 'Femenino', 'Sector Foresta 11, 3A', '646608934');
$usuario3 = new Usuario(9, 'Stephanie', 'Castro', 'Femenino', 'Av. de Castilla y León 9, 3D', '611443093');

$usuario1 -> crear();
$usuario2 -> crear();
$usuario3 -> crear();

echo "<br>";

// 
$datosUsuarios = $usuario1 -> obtieneTodos();
mostrarDatos($datosUsuarios, $usuario1);

echo "<h3>Prueba de busqueda por ID - Usuarios</h3>";

$datosUsuarios1 = $usuario1 -> obtieneDeId(7);
mostrarDatos($datosUsuarios1, $usuario1);

echo "<h2>Se borra 1</h2>";
//$usuario1 -> borrar(8);

echo "<h2>Se actualiza otro cambiando alguna de las propiedades</h2>";
$usuario3 -> apellido = "Castro Dos Santos";
$usuario3 -> actualizar(); 

echo "<br>";

// 
$datosUsuarios = $usuario1 -> obtieneTodos();
mostrarDatos($datosUsuarios, $usuario1);

/* -------------------------------------------------------------------------------------------------------*/
/* -------------------------------------------------------------------------------------------------------*/
echo "________________________________________________________________________________________________________________________________________________"; 

// • Se crean 3 adopciones, se borre una y se actualice otra cambiando alguna de las propiedades.
echo "<h2>Se crean 3 adopciones</h2>";
$adopcion1 = new Adopcion(7, 10, 7, "2023-12-12", "Nuevo miembro de la familia");
$adopcion2 = new Adopcion(8, 11, 8, "2023-11-11", "Regalo para su hermana");
$adopcion3 = new Adopcion(9, 12, 9, "2023-12-12", "Nuevo miembro para acompañar a su otro perro en casa");

$adopcion1 -> crear();
$adopcion2 -> crear();
$adopcion3 -> crear();

echo "<br>";

$datosAdopciones = $adopcion1 -> obtieneTodos();
mostrarDatos($datosAdopciones, $adopcion1);

echo "<h3>Prueba de busqueda por ID - Adopcion</h3>";

$datosAdopciones1 = $adopcion1 -> obtieneDeId(7);
mostrarDatos($datosAdopciones1, $adopcion1);

echo "<h2>Se borra 1</h2>";
//$adopcion2 -> borrar(8);

echo "<h2>Se actualiza otro cambiando alguna de las propiedades</h2>";
$adopcion3 -> razon = "Para hacer compañia al rey de la casa";
$adopcion3 -> actualizar();

?>