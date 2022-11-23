<?php
session_start(); //iniciar una nueva sesion o reanuda la existente 
$_SESSION=array(); //limpia las variables super globales de sesion

session_destroy(); //destruir todas las variables de sesion
header('Location: ../index.html'); 
?>