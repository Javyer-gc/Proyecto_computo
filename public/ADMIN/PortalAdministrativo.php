<?php
include_once 'conexion_admin.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header('location: loginAdmin.php');
}
$session_username = $_SESSION['admin'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../IMAGENES/logo/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylePortal.css">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>

    <title>Portal Administrativo de eHelp</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-primary font-weight-bold" href="../index.html"><img src="../IMAGENES/logo/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div align='center'>
        <div class="container-welcome">
            <h1>Portal Administrativo de eHelp</h1><br>
            <h3>Bienvendo ADMIN - <?php echo $session_username ?></h3>
            <h5>Los detalles de los usuarios son: </h5><br>
            <?php
            $sql = "SELECT * From usuariosadmin Where adminuser = '$session_username'";
            $resultado = mysqli_query($conexion, $sql);
            $admin = mysqli_fetch_array($resultado);
            $user = $admin['adminuser'];
            $mail = $admin['correo'];
            ?>
            <table class="table">
                <tr>
                    <td>USUARIO</td>
                    <td><?php echo $user ?></td>
                </tr>
                <tr>
                    <td>CORREO</td>
                    <td><?php echo $mail ?></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <div class="apartados">
            <a href="AdministrarAdmins.php">
            <h2>Administradores</h2> 
            </a>
            <a>&nbsp; &nbsp; &nbsp;</a>
            <a href="AdministrarUsuarios.php">
                <h2>Usuarios</h2>
            </a> 
            <a>&nbsp; &nbsp; &nbsp;</a>
            <a href="AdministrarEmpleados.php">
                <h2>Empleados</h2>
            </a> 
            <a>&nbsp; &nbsp; &nbsp;</a>
            <a href="HistorialUsuarios.php">
                <h2>Historial</h2>
            </a> 
        </div>
    </div>

    <footer>
        <div class="container-fluid padding">
            <div class="row text-center font-weight-bold">
                
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <h5>Instalaciones</h5>
                    <hr class="light">
                    <a href="https://goo.gl/maps/PcndVhK4RzKij3kn9">DICIS</a>
                </div>
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <a class="logo text-light" href="#"><img src="../IMAGENES/logo/logo.png" height="25"></a>
                    <hr class="light">
                    <p><a href="mailto: email@ugto.mx">email@ugto.mx</a></p>
                </div>
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <h5> Redes Sociales </h5>
                    <hr class="light">
                    <div >
                      <a href="https://www.facebook.com/UG.DICIS.SecAcad/"><i  class="fab fa-facebook" style="font-size:30px"></i></a> &nbsp; &nbsp; 
                      <a href="https://twitter.com/UdeGuanajuato"><i class="fab fa-twitter"  style="font-size:30px"></i></a>    &nbsp; &nbsp; 
                      <a href="https://www.youtube.com/channel/UCukUdjkk48CyYXQUBGw9cww"><i class="fab fa-youtube"  style="font-size:30px"></i></a> &nbsp; &nbsp; 
                      <a href="https://www.instagram.com/udeguanajuato/"><i class="fab fa-instagram"  style="font-size:30px"></i></a> 
                    </div>
                </div>
                <div class="col-12">
                    <hr class="light-100">
                    <h5>&copy; eHelp S.A </h5>
                    <br>
                    <h5> "Servicios de vanguardia"</h5>
                </div>
                
                
            </div>
        </div>
    </footer>


</body>

</html>