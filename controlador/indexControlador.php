<?php

if ($_GET['botonPulsado'] === "Usuario") {
    //Lleva a la vista de usuario.php
    header('Location: http://localhost/ProtectoraAnimales/vista/usuario/usuario.php');

} else if ($_GET['botonPulsado'] === "Animal") {

    header('Location: http://localhost/ProtectoraAnimales/vista/animal/animal.php');
    
} else if ($_GET['botonPulsado'] === "Adopcion") {

    header('Location: http://localhost/ProtectoraAnimales/vista/adopcion/adopcion.php');
}
