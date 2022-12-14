<?php 
session_start();
session_unset($_SESSION["Usuario"]);
session_destroy();

header('location: login.php');
?>