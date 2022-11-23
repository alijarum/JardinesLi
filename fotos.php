<?php
include("php/conexion.php");
include("php/ValidarUsuario.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <metal charset='utf-8'>
            <title>Jardines LI</title>
            <link href="css/estilo.css" rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <header>
            <div id="logo"> <!----id para trabajar con css----> 
                 <img src="img/logo.jpeg" alt="logo" height="200" width="200">
            </div>
            <nav class="menu">
                <ul> <!----lista desordenada---->
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="miperfil.php">Mi perfil</a></li>
                    <li><a href="amigos.php">Mis amigos</a></li>
                    <li><a href="fotos.php">Mis fotos</a></li>
                    <li><a href="agregar.php">Buscar amigos</a></li>
                    <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
<br><br><br><br><br>

<section id="recuadros">
            <h2>Mis fotos</h2>
            <h3><form action="php/SubirFoto.php" method="POST" enctype="multipart/form-data">
                Anadir imagen: <input  name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required/>
            <input type="submit" name="subir" value="Subir"/>
            </form></h3>
            <?php
            $consulta="Select*From fotos F Where F.Nickname='$nickname' ";
            $datos=mysqli_query($conexion,$consulta);
            while($fila=mysqli_fetch_array($datos)){
            ?>
            <section class="recuadro">
                <img src="<?php echo $fila['NombreFotos']?>" height="200"  width="229"> 
            </section>
            <?php
            }
            ?>
        </section>
          

        <footer>
            <p>Copyright &copy; JDS LI</p>
        </footer>
    </body>
</html>