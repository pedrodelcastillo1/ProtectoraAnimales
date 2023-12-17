<?php

// Redirección a la Vista -> Mostrar_Usuario.php
if ($_GET['botonPulsado'] === "Usuario") 
{
    header('Location: /ProtectoraAnimales/Vista/Usuario/Mostrar_Usuario.php');
} 
    // Redirección a la Vista -> Mostrar_Animal.php
    else if ($_GET['botonPulsado'] === "Animal") 
    {
        header('Location: /ProtectoraAnimales/Vista/Animal/Mostrar_Animal.php');
    } 
        // Redirección a la Vista -> Adopcion.php
        else if ($_GET['botonPulsado'] === "Adopcion") 
        {
            header('Location: /ProtectoraAnimales/Vista/Adopcion/Mostrar_Adopcion.php');
        }
