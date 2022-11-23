<?php

include("conexion.php"); //llama el archivo conexión

//datos enviados por el formulario

$nickname     = $_POST["nickname"];
$nombre       = $_POST["nombre"];
$apellidos    = $_POST["apellidos"];
$edad         = $_POST["edad"];
$descripcion  = $_POST["descripcion"];
$email        = $_POST["correo"];
$password     = $_POST["contrasena"];

//Encriptar el valor
//BCRYPT es el algoritmo de encriptamiento
$passwordHash=password_hash($password, PASSWORD_BCRYPT);

$fotoPerfil= "img/$nickname/perfil.png";
//ingresamos el nombre de la foto de perfil por defecto

//Evaluamos si nickname ingresado ya existe
$consultaId= "SELECT Nickname FROM persona WHERE Nickname='$nickname'";
$consultaId= mysqli_query($conexion,$consultaId); 
//Devuelve un objeto con resultado false si no existe el usuario
//y true si existe

$consultaId=mysqli_fetch_array($consultaId);
//devuelve un array o NULL

if(!$consultaId){  //si esta vacia entonces agregamos Nvo usuario
   
   $sql="INSERT INTO persona VALUES('$nickname', '$nombre','$apellidos','$edad','$descripcion','$fotoPerfil','$email','$passwordHash')";
     
	 //Ejecutamos y verificamos si se guardan los datos
     
	 if(mysqli_query($conexion,$sql)){
		 mkdir("../img/$nickname"); //crea una carpeta en imagenes para el usuario Nvo
		 
		 copy("../img/default.png","../img/$nickname/perfil.jpg");
		 //copia nuestra foto por defaul
		 echo "Tu cuenta ha sido creada";
		 echo"<br> <a href='../index.html'> Iniciar Sesión</a>";
	 }
	 else{
		 echo "Error:".$sql ."<br>" .mysqli_error($conexion);
	 }
}
else{
	echo "El nombre del usuario ya existe";
	echo "<br> <a href='../index.html'>Intentelo de nuevo</a>";
}

//cerrando la conexión
mysqli_close($conexion);
	 

?>