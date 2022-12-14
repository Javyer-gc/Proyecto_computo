<?php 

	include_once 'conexion.php';
	session_start();

	if (! isset($_SESSION["Usuario"])) {
		header('location: index.php');
	}
	$session_username = $_SESSION["Usuario"];

	if (isset($_POST["submit"])) {
		$username = $_POST["Usuario"];
		$email = $_POST["Correo"];
		$name = $_POST["Nombre"];
		$lname = $_POST["Apellidos"];
		$id = $_POST['IdUsuario'];

		$query1 = $db->prepare("SELECT Usuario FROM usuariosclientes WHERE Usuario = ? ");
		$query1->execute([$username]);
		if ($query1->rowCount() > 0) {
			$err = "Usuario ya en uso";
		}
		else{
			$query = "UPDATE usuariosclientes SET Usuario = ? , Correo = ? , Nombre = ? , Apellidos = ?";
			$query = $db->prepare($query);
			if ($query->execute([$username,$email,$name,$lname])) {
				$_SESSION["Usuario"] = $username; 
				header('location: homepage.php');
			}
		}
	}

	
?>




<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Datos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-primary font-weight-bold" href="../Index.html"><img src="../IMAGENES/logo/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
        </div>
    </nav>
    <!---------------------------------------------------------------->
	<div class="jumbotron pt-5" style="height: 45em">
		<div class="row pt-5">
			<div class="col-12 col-md-3"></div>	
			<div class="col-12 col-md-6 pt-3 card">
				<div class="container-fluid">
					<?php  
						$query = $db->prepare("SELECT * FROM usuariosclientes WHERE Usuario = ? ");
						$query->execute([$session_username]);
						$user = $query->fetch();

						$preUsername = $user["Usuario"];
						$preemail = $user["Correo"];
						$prename = $user["Nombre"];
						$prelname = $user["Apellidos"];
						
					?>
					<h3>Actualizar Datos</h3>
					<form method="post">
						<?php if (isset($err)): ?>
							<div class="alert alert-danger"><?php echo $err ?></div>
						<?php endif ?>

						<?php if (isset($success)): ?>
							<div class="alert alert-success">Exito</div>
						<?php endif ?>

						<div class="form-group">
							<label>Usuario</label>
							<input required type="text" value="<?php echo $preUsername ?>" name="Usuario" class="form-control">
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input required type="email" value="<?php echo $preemail ?>" name="Correo" class="form-control">
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input required type="text" value="<?php echo $prename ?>" name="Nombre" class="form-control">
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input required type="text" value="<?php echo $prelname ?>" name="Apellidos" class="form-control">
						</div>
						
						<div class="form-group">
							<button name="submit" class="btn btn-dark form-control">Actualizar</button>
						</div>
					</form>
				</div>	
			</div>
			<div class="col-12 col-md-3"></div>	
		</div>
	</div>
</body>
</html>