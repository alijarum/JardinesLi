<?php
include("ValidarUsuario.php");
$ubicacion="../img/$nickname/perfil.jpg";
$archivo=$_FILES['archivo']['tmp_name'];
if(move_uploaded_file($archivo,$ubicacion))
{
   echo "El archivo ha sido subido";
   //Redireccionar a la pagina de mi perfil
   header('Location:../miperfil.php');
}
else{
    echo"Ha ocurrido un error trate de nuevo";
    echo "<br> <a href='../miperfil.php'>Volver.</a>";
}
?>