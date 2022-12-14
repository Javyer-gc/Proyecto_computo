<?php 
	session_start();
	include_once 'conexion.php';
	$username = $_SESSION["Usuario"];

	$query = $db->prepare("DELETE FROM usuariosclientes WHERE Usuario = ?");
	if ($query->execute([$username])) {
		session_unset($_SESSION["Usuario"]);
		session_destroy();
		header('location: login.php');
	}
?>