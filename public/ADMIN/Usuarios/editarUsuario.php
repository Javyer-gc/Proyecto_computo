<?php

    include_once '../conexion_admin.php';

    $id = $_POST['Id'];
    $Usuario = $_POST['Usuario'];
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];
    $Contrasena = $_POST['Contrasena'];

    

    if($Contrasena != ''){
        if (verificarUserAndMail($id,$Usuario, $Correo, $conexion) == 1) {
            echo "<script>
                    alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                    window.location.href ='../AdministrarUsuarios.php'
                </script>";
        }else{
            if (strlen($Contrasena) < 6) {
                echo "<script>
                    alert('La contraseña debe ser mayor a 5 caracteres'); 
                    window.location.href ='../AdministrarUsuarios.php'
                </script>";
            }else{
                $Contrasena = md5($Contrasena);
                
                $sql = "UPDATE usuariosclientes SET Usuario = '$Usuario', Nombre = '$Nombre', Apellidos = '$Apellidos',Correo = '$Correo', Contrasena = '$Contrasena' WHERE IdUsuario = '$id'";
                $resultado = mysqli_query($conexion, $sql);
                if (!$resultado) {
                    die('Consulta Fallida');
                } else {
                    
                    echo "<script>
                    alert('Usuario Actualizado Correctamente'); 
                    window.location.href ='../AdministrarUsuarios.php'
                    </script>";
                  
                }
            }    
        }
        
    }else{
        if (verificarUserAndMail($id,$Usuario, $Correo, $conexion) == 1) {
            echo "<script>
                        alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                        window.location.href ='../AdministrarUsuarios.php'
                    </script>";
        } else {
            
            $sql = "UPDATE usuariosclientes SET Usuario = '$Usuario', Nombre = '$Nombre', Apellidos = '$Apellidos',Correo = '$Correo' WHERE IdUsuario = '$id'";
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                die('Consulta Fallida');
            } else {
               
                echo "<script>
                    alert('Usuario Actualizado Correctamente'); 
                    window.location.href ='../AdministrarUsuarios.php'
                    </script>";
                    
            }
        }
    }


    function verificarUserAndMail($id,$user, $mail, $conexion)
    {

        $sql_user = "SELECT * FROM usuariosclientes WHERE Usuario = '$user' AND Idusuario != $id";
        $resultado_user = mysqli_query($conexion, $sql_user);

        $sql_mail = "SELECT * FROM usuariosclientes WHERE Correo = '$mail' AND Idusuario != $id";
        $resultado_mail = mysqli_query($conexion, $sql_mail);

        if (mysqli_num_rows($resultado_user) > 0 || mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
