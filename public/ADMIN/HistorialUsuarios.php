<?php
include_once 'conexion_admin.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header('location: loginAdmin.php');
}
$session_username = $_SESSION['admin'];

$usuarios = $_POST["Usuarios"]



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../IMAGENES/logo/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StyleHistorial.css">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>

    <title>Portal Administrativo de eHelp - Consultas</title>
</head>

<body onload="mostrar(),cargar()">
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-primary font-weight-bold" href="PortalAdministrativo.php"><img src="../IMAGENES/logo/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="top">
        <div align='center'>
            <h1>Portal Administrativo de eHelp</h1>
        </div>
        <br>
        <br>
        <div class="apartados">
            <a href="AdministrarAdmins.php">
                <h2>Administradores</h2>
            </a>
            <a href="AdministrarUsuarios.php">
                <h2>Usuarios</h2>
            </a>
            <a href="AdministrarEmpleados.php">
                <h2>Empleados</h2>
            </a>
            <a href="HistorialUsuarios.php">
                <h2>Consultas</h2>
            </a>
        </div>

        <!-------  -------->

        <div class="container mt-5 all">
            <div class="container-tabla">
                <h2>Agendar conultas para pacientes</h2>
                <br>

                <button type="submit" class="btn btn-success mt-3">Agregar</button>

                <script>
                function obtener(dato) {
            window.scroll(0, 310);
            $add_form = document.getElementById("add-form");
            $add_form.style.display = "none";
            $edit_form = document.getElementById("edit-form");
            $edit_form.style.display = "inline-block";
            cadena1 = "Usuarios/obtenerUsuario.php?id=";
            cadena2 = dato;
            cadena3 = cadena1.concat(cadena2);
            console.log(cadena3);
            fetch(cadena3)
                .then(datos => datos.json())
                .then(datos => {
                    var resultado = document.getElementById('edit-form');
                    resultado.innerHTML = '';
                    resultado.innerHTML += `
                    <h2>Editar Usuario</h2>
                    <form id="form2" name="form2" action="Usuarios/editarUsuario.php" method="POST">
                        <div>
                            <input type="text" class="form-control" id="Id" name="Id"  value="${datos.IdUsuario}" hidden><br>
                            <label>Usuario:</label>
                            <input type="text" class="form-control" id="Edit-Usuario" name="Usuario" value="${datos.Usuario}" required><br>
                            <label>Nombre(s):</label>
                            <input type="text" class="form-control mt-3" id="Edit-Nombre" name="Nombre" value="${datos.Nombre}" required><br>
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" id="Edit-Apellidos" name="Apellidos" value="${datos.Apellidos}" required><br>
                            <label>Correo:</label>
                            <input type="email" class="form-control mt-3" id="Edit-Correo" name="Correo" value="${datos.Correo}" required><br>
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" id="Edit-Contrasena" name="Contrasena"> <button id="Editeye" class="eye" onclick="mostrarPassEdit()" type="button"><i class="fas fa-eye"></i><button id="EditeyeSlash" class="eyeSlash" onclick="ocultarPassEdit()" type="button" style="display: none;"><i class="fas fa-eye-slash"></i></button><br>
                        </div>
                      
                      <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                      <input type="button" onclick="cancelar()" class="btn btn-danger mt-3" value="Cancelar">
                    </form>  
                            `;
                })
        }
        </script>



                <form id="form" name="form" action="Empleados/agregarEmpleado.php" method="POST">

          
                        
                        <div>
                            <label>Usuario</label>
                            <select name="Usuario">

                                <option ${datos.} > </option>

                                <option>Avión</option>

                                <option>Tren</option>

                                </select> <br>


                        
                            <label>Doctor</label>
                            <input type="text" class="form-control" id="Apellidos" name="Apellidos" required><br>
                            <label for="Puesto">Fecha:</label>
                            <input type="text" class="form-control mt-3" id="Puesto" name="Puesto" required><br>
                            <label>Consultorio:</label>
                            <input type="email" class="form-control" id="Correo" name="Correo" required><br>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Agregar</button>
                        <button type="reset" class="btn btn-danger mt-3">Cancelar</button>
                    </form>




                <table class="tabla">
                    <thead>
                        <tr>
                            <th class="titulo column-id">Id Solicitud</th>
                            <th class="titulo column-user">Usuario</th>
                            <th class="titulo column-longitud">Doctor</th>
                            <th class="titulo column-fecha">Fecha</th>
                            <td class="titulo column-verMapa">Consultorio</td>
                        </tr>
                    </thead>
                    <tbody id="resultado"></tbody>
                </table>
            </div>
        </div>
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
                    <a class="logo text-light" href="#"><img src="../IMAGENES/logo/logo.png" height="25"></a>
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
    <script>
        function cargar() {
            window.scroll(0, 0);
            document.forms['form'].reset();
        }

        function mostrar() {
            fetch('Historial/datosHistorial.php')
                .then(datos => datos.json())
                .then(datos => {
                    var resultado = document.getElementById('resultado');
                    resultado.innerHTML = '';
                    for (let dato of datos) {
                        resultado.innerHTML += `
                   <tr HistoryId="${dato.id}">
                      <td class="renglon">${dato.id}</td>
                      <td class="renglon">${dato.usuario}</td>
                      <td class="renglon">${dato.Doctor}</td>
                      <td class="renglon">${dato.Fecha}</td>
                      <td class="renglon">${dato.Consultorio}</td>
                      <td class="boton">
                        <button onclick="obtener('${dato.latitud}','${dato.longitud}')" class="float-right botonVer">
                            <i class="fas fa-map-marked-alt"></i></i> Ver Ubicación
                        </i></button>
                      </td>

                  </tr>
                  `;
                    }
                })
        }
        /*https://www.google.com.mx/maps/place/*/

        function obtener(latitud, longitud) {
            cadena1 = "https://www.google.com.mx/maps/place/";
            cadena2 = latitud;
            cadena3 = '+';
            cadena4 = longitud;
            cadena5 = cadena1.concat(cadena2, cadena3, cadena4);
            var win = window.open(cadena5);
            if (win) {
                //Navegador permite abrir una ventana
                win.focus();
            } else {
                //Navegador bloquea abrir una ventana
                alert('Por favor permita una abrir una ventana a este sitio');
            }

        }
    </script>
</body>

</html>