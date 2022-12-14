<?php
	$db = new PDO("mysql:host=localhost; dbname=ehelp",'root','root');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (!$db) {
		die("Mala conexion");
	}
?>