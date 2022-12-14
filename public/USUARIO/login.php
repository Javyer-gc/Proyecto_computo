<?php
include_once 'conexion.php';
session_start();
if (isset($_SESSION["Usuario"])) {
    header('location: homepage.php');
}

if (isset($_POST["submit"])) {
    $username = $_POST["Usuario"];
    $password = md5($_POST["Contrasena"]);

    $query1 = $db->prepare("SELECT * FROM usuariosclientes WHERE Usuario = ? AND Contrasena = ? ");
    $query1->execute([$username, $password]);
    if ($query1->rowCount() > 0) {
        $_SESSION['Usuario'] = $username;
        header('location: homepage.php');
    } else {
        $err = "Datos erroneos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN - eHelp</title>
    <link rel="shortcut icon" href="../IMAGENES/logo/logo.png" type="image/x-icon">

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="/css/style.css" rel="stylesheet">

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
                        <a class="nav-link" href="../index.html">Inicio</a>

                    <li class="nav-item">
                        <a class="nav-link" href="registrarse.php">Registrarse</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contactanos.html">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!---------------------------------------------------------------->
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/ingresar.png" />
                </div>
                <form class="col-12" method="post">
                    <?php if (isset($err)) : ?>
                        <div class="alert alert-danger"><?php echo $err ?></div>
                    <?php endif ?>
                    <div class="form-group" id="user-group">
                        <input required type="text" class="form-control" placeholder="Nombre de usuario" name="Usuario" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input required type="password" class="form-control" placeholder="Contrasena" name="Contrasena" />
                    </div>
                    <button name="submit" class="btn btn-dark form-control"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
                </form>
                <div class="col-12 forgot">
                    <p>¿Aún no tienes cuenta? <a href="registrarse.php">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>