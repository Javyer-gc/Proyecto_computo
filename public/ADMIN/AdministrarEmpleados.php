<?php
include_once 'conexion_admin.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header('location: loginAdmin.php');
}
$session_username = $_SESSION['admin'];

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
    <link rel="stylesheet" href="css/StyleAdminUser.css">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>
    <title>Portal Administrativo de eHelp - Empleados</title>
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

        <div class="container mt-5 all">
            <div class="row">
                <div class="col-md-6" id="add-form">
                    <h2>Agregar Empleado</h2>
                    <br>
                    <form id="form" name="form" action="Empleados/agregarEmpleado.php" method="POST">
                        <div>
                            <label>Nombre(s):</label>
                            <input type="text" class="form-control mt-3" id="Nombre" name="Nombre" required><br>
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" id="Apellidos" name="Apellidos" required><br>
                            <label for="Puesto">Puesto:</label>
                            <input type="text" class="form-control mt-3" id="Puesto" name="Puesto" required><br>
                            <label>Correo:</label>
                            <input type="email" class="form-control" id="Correo" name="Correo" required><br>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Agregar</button>
                        <button type="reset" class="btn btn-danger mt-3">Cancelar</button>
                    </form>
                </div>
                <div class="col-md-6" id="edit-form" style="display: none;">
                </div>
                <div class="col-md-5 container-tabla">
                    <h2>Datos Empleados</h2>
                    <br>
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th class="titulo column-id">Id</th>
                                <th class="titulo column-nombre">Nombre</th>
                                <th class="titulo column-apellidos">Apellidos</th>
                                <th class="titulo column-puesto">Puesto</th>
                                <th class="titulo column-correo">Correo</th>
                                <td class="column-edit"></td>
                                <td class="column-delete"></td>
                            </tr>
                        </thead>
                        <tbody id="resultado"></tbody>
                    </table>
                </div>
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
                    <a class="logo text-light" href="#"><img src="IMAGENES/logo/logo.png" height="25"></a>
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
        function mostrar() {
            fetch('Empleados/datosEmpleado.php')
                .then(datos => datos.json())
                .then(datos => {
                    var resultado = document.getElementById('resultado');
                    resultado.innerHTML = '';
                    for (let dato of datos) {
                        resultado.innerHTML += ` 
                   <tr UserId="${dato.IdEmpleados}">
                      <td class="renglon">${dato.IdEmpleados}</td>
                      <td class="renglon">${dato.Nombre}</td>
                      <td class="renglon">${dato.Apellidos}</td>
                      <td class="renglon">${dato.Puesto}</td>
                      <td class="renglon">${dato.Correo}</td>
                      <td class="botones">
                              <button onclick="obtener('${dato.IdEmpleados}')" class="float-right botonEditar">
                                <i class="fas fa-user-edit"></i> Editar
                              </i></button>
                      </td>

                      <td class="botones">
                              <button onclick="eliminar('${dato.IdEmpleados}')" class="float-right ml-3 botonEliminar">
                                <i class="fas fa-user-times"></i> Eliminar
                              </button>
                      </td>
                  </tr>
                  `;
                    }
                })
        }

        function obtener(dato) {
            window.scroll(0, 310);
            $add_form = document.getElementById("add-form");
            $add_form.style.display = "none";
            $edit_form = document.getElementById("edit-form");
            $edit_form.style.display = "inline-block";
            cadena1 = "Empleados/obtenerEmpleado.php?id=";
            cadena2 = dato;
            cadena3 = cadena1.concat(cadena2);
            console.log(cadena3);
            fetch(cadena3)
                .then(datos => datos.json())
                .then(datos => {
                    var resultado = document.getElementById('edit-form');
                    resultado.innerHTML = '';
                    resultado.innerHTML += `
                    <h2>Editar Empleado</h2>
                    <form id="form2" name="form2" action="Empleados/editarEmpleado.php" method="POST">
                        <div>
                            <input type="text" class="form-control" id="Id" name="Id"  value="${datos.IdEmpleados}" hidden><br>
                            <label>Usuario:</label>
                            <label>Nombre(s):</label>
                            <input type="text" class="form-control mt-3" id="Edit-Nombre" name="Nombre" value="${datos.Nombre}" required><br>
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" id="Edit-Apellidos" name="Apellidos" value="${datos.Apellidos}" required><br>
                            <label>Puesto:</label>
                            <input type="text" class="form-control mt-3" id="Edit-Puesto" name="Puesto" value="${datos.Puesto}" required><br>
                            <label>Correo:</label>
                            <input type="email" class="form-control" id="Edit-Correo" name="Correo" value="${datos.Correo}" required><br>
                        </div>
                      
                      <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                      <input type="button" onclick="cancelar()" class="btn btn-danger mt-3" value="Cancelar">
                    </form>  
                            `;
                })
        }


        
        function cargar() {
            window.scroll(0, 0);
            document.forms['form'].reset();
        }

        function cancelar() {
            document.forms['form'].reset();
            window.location.href = "AdministrarEmpleados.php";
        }

        function eliminar(dato) {
            cadena1 = "Empleados/eliminarEmpleado.php?id=";
            cadena2 = dato;
            cadena3 = cadena1.concat(cadena2);
            if (confirm('Esta seguro que desea eliminar este Empleado')) {
                window.location.href = cadena3;
            }
        }

   
    </script>
</body>

</html>