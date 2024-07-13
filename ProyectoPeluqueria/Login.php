<?php 	
session_start(); 					  	// Iniciar la sesión.
error_reporting(0); 				 	// Configurar el nivel de reporte de errores a cero (no mostrar errores).
include('includes/dbconnection.php');   // Incluir el archivo de conexión a la base de datos.

if(isset($_POST['login'])) 			// Verificar si el formulario ha sido enviado (si se ha presionado el botón 'submit').
  {
    $user=$_POST['usuario']; 				// Asignar los datos del formulario a variables...
    $pass=$_POST['contrasena'];
	
	// Verificar las credenciales en la base de datos.
    $query=mysqli_query($con,"select * from tbcliente where UserName='$user' and Password='$pass'");
    $ret = mysqli_fetch_array($query);
 
	if ($ret > 0) {                     // Verificar si la validacion de datos fue exitosa. 	
        $_SESSION['nam']=$ret['Name'];  
        $_SESSION['ape']=$ret['LastName'];
        $_SESSION['correo']=$ret['Email'];   
        $_SESSION['num']=$ret['MobileNumber']; 
        $_SESSION['user']=$ret['UserName']; 
        $_SESSION['id']=$ret['ID'];     
        $_SESSION['dni']=$ret['Dni']; 
        header('location:index.php');   // Redirigir al usuario a la página 'index.php'.	
  	} else {
        $_SESSION['data']=2;
    }
  }

if(isset($_POST['register'])) {

    $name=$_POST['name'];
    $ape=$_POST['apellido'];
    $dni=$_POST['dni'];
    $email=$_POST['email'];
    $mobilenum=$_POST['mobilenum'];
    $gender=$_POST['gender'];
    $usu=$_POST['usuario'];
    $pass=$_POST['contrasena'];

        $query=mysqli_query($con, "insert into  tbcliente (Name,LastName,Dni,Email,MobileNumber,Genero,UserName,Password) value ('$name','$ape','$dni','$email','$mobilenum','$gender','$usu','$pass')");
    if ($query) {
        $_SESSION['data']=1;
    } else {
        $_SESSION['data']=3;  	
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/styleLogin.css">
    <!-- iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>	
  	.modal-header {
		color: #fff;
		background: #000000;
		display: flex;
		justify-content: center;
	}
    </style>
</head>

<body style="background-image: url(images/bg-2.jpg)">
    <div class="wrapper" style="color:black">
        <form action="#" method="POST">
            <h1>Iniciar Sesión</h1>
            <div class="input-box">
                <input type="text" placeholder="Usuario" name="usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box" >
                <input type="password" placeholder="Contraseña" name="contrasena" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin/index.php"><b>Administrador</b></a></label>
                <a href="recuperables/reset-password.php">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" name="login" class="btn">Ingresar</button>

            <div class="register-link">
                <p>¿Aún no tienes una cuenta?<a href="recuperables/register-client.php"> Registrarse</a></p>
            </div>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header meti">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Registrar Cliente</b></h1>
      </div>
      
      <div class="modal-body">
        <form  method="POST">					
			<div class="form-group">
				<label for="exampleInputEmail1" class="form-label">Nombre</label>
				<input type="text" class="form-control" name="name" id="id-name" required>
			</div>
	
			<div class="form-group">
				<label for="exampleInputPassword1" class="form-label">Apellido</label>
				<input type="text" class="form-control" name="apellido" id="id-apellido" required>
			</div>
			
			<div class="form-group">
            	<label for="exampleInputPassword1" class="form-label">Dni</label>
				<input type="number" class="form-control" name="dni" id="id-dni" required>
          	</div>

              <div class="form-group">
				<label for="exampleInputPassword1" class="form-label">Correo</label>
				<input type="email" class="form-control" name="email" id="id-email" required>
			</div>
				
			<div class="form-group">
            	<label for="exampleInputPassword1" class="form-label">Telefono</label>
				<input type="number" class="form-control" name="mobilenum" id="id-mobilenum" required>
          	</div>	

            <div class="form-group">
                <label for="id-gender" class="form-label">Género</label>
                <select class="form-control" name="gender" id="id-gender">
                    <option value="">[Seleccione rol]</option>    
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No definido">No definido</option>    
                </select>
            </div>

            <div class="form-group">
			    <label for="exampleInputPassword1" class="form-label">Usuario</label>
				<input type="text" class="form-control" name="usuario" id="id-usuario" required>
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1" class="form-label">Contraseña</label>
				<input type="password" class="form-control" name="contrasena" id="id-contrasena" required>
			</div>

			<div class="modal-footer">
				<button type="submit" name="register" class="btn btn-primary">Grabar</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cerrar">Cerrar</button>
			</div>
		</form>
      </div>    
    </div>
  </div>
</div>
</body>
<!-- Modal -->

<?php
    if(isset($_SESSION['data']) && $_SESSION['data']==2){
        echo "<script>
                Swal.fire({
                title: 'Usuario incorrecto',
                text: 'Vuelva a intentarlo',
                icon: 'error'
                });
              </script>";
        unset($_SESSION['data']);
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>