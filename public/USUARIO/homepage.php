<?php
include_once 'conexion.php';
session_start();
if (!isset($_SESSION["Usuario"])) {
	header('location: login.php');
}
$session_username = $_SESSION['Usuario'];
?>


<!DOCTYPE html>
<html>

<head>
	<title>Home Usuario - eHelp</title>
	<link rel="shortcut icon" href="../IMAGENES/logo/icono.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand text-primary font-weight-bold" href="../index.html"><img src="../IMAGENES/logo/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
	<!---------------------------------------------------------------->
	<div class="jumbotron pt-5" style="height: 60em">
		<div class="row pt-5">
			<div class="col-12 col-md-3"></div>
			<div class="col-12 col-md-6 pt-3 pb-3 card">
				<div class="container-fluid">
					<h3>Bienvenido <?php echo $session_username ?></h3>
					<h5>Los detalles de su cuenta son: </h5>

					<?php
					$query = $db->prepare("SELECT * FROM usuariosclientes WHERE Usuario = ? ");
					$query->execute([$session_username]);
					$user = $query->fetch();

					$username = $user["Usuario"];
					$email = $user["Correo"];
					$name = $user["Nombre"];
					$lname = $user["Apellidos"];

					?>
					<table class="table">
						<tr>
							<td>Usuario: </td>
							<td><?php echo $username ?></td>
						</tr>
						<tr>
							<td>Correo: </td>
							<td><?php echo $email ?></td>
						</tr>
						<tr>
							<td>Nombre (s): </td>
							<td><?php echo $name ?></td>
						</tr>
						<tr>
							<td>Apellidos</td>
							<td><?php echo $lname ?></td>
						</tr>
					</table>
					<div >

					<a href="logout.php">Cerrar Sesión</a> |
					<a href="update.php">Actualizar Cuenta</a> |
					<a href="delete.php">Eliminar Cuenta</a>
					
				</div>

			</div>

		  </div>							
			
		</div>
	
	</div>

</body>

</html>