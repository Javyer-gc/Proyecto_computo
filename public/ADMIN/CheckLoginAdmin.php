<?php

    session_start();

    include_once 'conexion_admin.php';

    $usuario_login = $_POST['login_usuario'];
    $contrasena_login = $_POST['login_contrasena'];

//Verificar que existe el usuario
    $sql = "SELECT * From usuariosadmin Where adminuser = '$usuario_login'";
    $resultado = mysqli_query($conexion, $sql);
    $user = mysqli_fetch_array($resultado);
 

    if(!$user){
       echo "<script>
            alert('Usuario No Existe'); 
            window.location.href ='loginAdmin.php'
            </script>";
    }
    else{

        if (password_verify($contrasena_login, $user['contrasena'])) {
            if($user['Id']==1){
                $_SESSION['admin'] = $usuario_login;
                $_SESSION['subadmin'] = $usuario_login;
                header('Location: PortalAdministrativo.php');
            }
            else{
                $_SESSION['admin'] = $usuario_login;
                $_SESSION['subadmin'] = 'subadmin';
                header('Location: PortalAdministrativo.php');
            }
           
        } else {
        echo "<script>
            alert('Contraseña Incorrecta'); 
            
            </script>";
           // window.location.href ='loginAdmin.php'
        }
    }

   