<?php
include_once 'conexion_admin.php';
session_start();
if (isset($_SESSION["admin"])) {
    header('location: PortalAdministrativo.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../IMAGENES/logo/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StyleLoginAdmin.css">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>
    <script>
        function mostrar() {
            $show = document.getElementById("contrasena");
            $show.type = "text";
            $btnEye = document.getElementById("eye");
            $btnEye.style.display = "none";
            $btnSleye = document.getElementById("eyeSlash");
            $btnSleye.style.display = "inline";
        }

        function ocultar() {
            $show = document.getElementById("contrasena");
            $show.type = "password";
            $btnEye = document.getElementById("eye");
            $btnEye.style.display = "inline";
            $btnSleye = document.getElementById("eyeSlash");
            $btnSleye.style.display = "none";
        }
    </script>
    <title>Login Administrativo - eHelp </title>
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
                        <a class="nav-link" href="../index.html">Página Principal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class='container-form'>
        <h1>Login</h1>
        <form class="formulario" action="CheckLoginAdmin.php" method="POST">
            <p>
                <input type="text" name="login_usuario" placeholder="Usuario" required>
            </p>
            <p class="password">
                <input type="password" id="contrasena" name="login_contrasena" placeholder="Contraseña" required> <button id="eye" class="eye" onclick="mostrar()" type="button"><i class="fas fa-eye"></i><button id="eyeSlash" class="eyeSlash" onclick="ocultar()" type="button" style="display: none;"><i class="fas fa-eye-slash"></i></button>
            </p>
            <p>
                <button class="login" type="submit">Login</button>
            </p>
        </form>
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
                    <a class="logo text-light" href="#"><img src="IMAGENES/logo/logo.png" height="25"></a>
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