<?php
include_once 'conexion.php';
session_start();
if (isset($_SESSION["Usuario"])) {
	header('location: homepage.php');
}

if (isset($_POST["submit"])) {
	$username = $_POST["Usuario"];
	$email = $_POST["Correo"];
	$password = $_POST["Contrasena"];
	$name = $_POST["Nombre"];
	$lname = $_POST["Apellidos"];

	$edad = $_POST["Edad"];
	$sexo = $_POST["Sexo"];
	$alergias = $_POST["Alergias"];
	$enfermedades = $_POST["Enfermedades"];


	$query1 = $db->prepare("SELECT Usuario FROM usuariosclientes WHERE Usuario = ? ");
	$query1->execute([$username]);
	if ($query1->rowCount() > 0) {
		$err = "Este nombre de usuario ya existe";
	} else {
		if ($username == "") {
			$err = "El nombre de usuario no puede estar vacio";
		} else {
			if (strlen($password) < 6) {
				$err = "La contraseña debe ser mayor a 5 caracteres";
			} else {
		
				$password = md5($password);
				$query = "INSERT INTO usuariosclientes(Usuario,Correo,Contrasena,Nombre,Apellidos) VALUES(?,?,?,?,?)";
				$query = $db->prepare($query);
				if ($query->execute([$username, $email, $password, $name, $lname])) {
					$_SESSION["Usuario"] = $username;
					header('location: homepage.php');
				} 

				$id = $_GET["IdUsuario"];
				
				$query2 = "INSERT INTO datosusuario(Usuario,Edad,Sexo,Alergias,Enfermedades) VALUES(?,?,?,?,?)";
				$query2 = $db->prepare($query2);
				if ($query2->execute([$username, $edad, $sexo, $alergias, $enfermedades])) {
					$_SESSION["Usuario"] = $username;
					header('location: homepage.php');
				} else {
					$err = "Datos erroneos";
				}

			}
		}
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Registrarse - eHelp</title>
	<link rel="shortcut icon" href="../IMAGENES/logo/icono.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
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
						<a class="nav-link" href="login.php">Iniciar Sesión</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="../contactanos.html">Contactanos</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!---------------------------------------------------------------->

	<body>

		<!---------------------------------------------------------------->
		<div class="modal-dialog text-center">
			<div class="col-sm-8 main-section">
				<div class="modal-content">
					<div class="col-12 user-img">
						<img src="img/user.png" />
					</div>
					<form class="col-12" method="post">

						<?php if (isset($err)) : ?>
							<div class="alert alert-danger"><?php echo $err ?></div>
						<?php endif ?>

						<?php if (isset($success)) : ?>
							<div class="alert alert-success">Registro Exitoso</div>
						<?php endif ?>

						<div class="form-group" id="user-group">
							<label>Nombre</label>
							<input required type="text" <?php if (isset($name)) : ?> value="<?php echo $name ?>" <?php endif ?> name="Nombre" placeholder="Nombre(s)" class="form-control">
						</div>
						<div class="form-group" id="user-group">
							<label>Apellido</label>
							<input required type="text" <?php if (isset($lname)) : ?> value="<?php echo $lname ?>" <?php endif ?> name="Apellidos" placeholder="Apellidos" class="form-control">
						</div>
						<div class="form-group" id="user-group">
							<label>Usuario</label>
							<input required type="text" <?php if (isset($username)) : ?> value="<?php echo $username ?>" <?php endif ?> name="Usuario" placeholder="Usuario" class="form-control">
						</div>
						<div class="form-group" id="user-group">
							<label>Correo</label>
							<input required type="Correo" <?php if (isset($email)) : ?> value="<?php echo $email ?>" <?php endif ?> name="Correo" placeholder="Correo" class="form-control">
						</div>
						<div class="form-group" id="contrasena-group">
							<label>Contraseña</label>
							<input required type="password" placeholder="Contraseña" name="Contrasena" class="form-control">
						</div>

							
			

				
						<div class="form-group" id="paciente">
							<label> Edad </label>
							<input required type="number" <?php if (isset($edad)) : ?> value="<?php echo $edad ?>" <?php endif ?> name="Edad"  class="form-control">
						</div>
						<div class="form-group" id="paciente">
							<label> Sexo </label> <br>
							<input required type="text" <?php if (isset($sexo)) : ?> value="<?php echo $sexo ?>" <?php endif ?> name="Sexo"  class="form-control">
						</div>
						<div class="form-group" id="paciente">
							<label> Alergias </label>
							<input required type="text" <?php if (isset($alergias)) : ?> value="<?php echo $alergias ?>" <?php endif ?> name="Alergias"  placeholder="Polen, Paracetamol..." class="form-control">
						</div>
						<div class="form-group" id="paciente">
							<label> Enfermedades </label>
							<input required type="text" <?php if (isset($enfermedades)) : ?> value="<?php echo $enfermedades ?>" <?php endif ?> name="Enfermedades"  placeholder="Diabetes, Presion..." class="form-control">
						</div>
						
			
						<div class="form-group">
							<button name="submit" class="btn btn-dark form-control"><i class="fas fa-sign-in-alt"></i>Registrarse </button>
						</div>
					</form>
					
					<div>

	
						<p>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>
								


					</div>
					
				</div>

				
			</div>

			
		</div>

		
	</body>

</html>

