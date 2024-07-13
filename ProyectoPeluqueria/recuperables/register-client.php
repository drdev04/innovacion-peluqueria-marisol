<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['register'])) {

    $name=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $dni=$_POST['dni'];
    $email=$_POST['correo'];
    $mobilenum=$_POST['telefono'];
    $gender=$_POST['genero'];
    $usu=$_POST['usuario'];
    $pass=$_POST['contrasena'];

        $query=mysqli_query($con, "insert into  tbcliente (Name,LastName,Dni,Email,MobileNumber,Genero,UserName,Password) value ('$name','$ape','$dni','$email','$mobilenum','$gender','$usu','$pass')");
    if ($query) {
        $_SESSION['data']=1;
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>BPMS | Reset Page </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="../admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="../admin/js/jquery-1.11.1.min.js"></script>
<script src="../admin/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="../admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../admin/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="../admin/js/metisMenu.min.js"></script>
<script src="../admin/js/custom.js"></script>
<link href="../admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<!--//Alerta animada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	.login-page input[type="number"] {
    font-size: 0.9em;
    padding: 10px 15px 10px 37px;
    width: 100%;
    color: #A8A8A8;
    outline: none;
    border: 1px solid #D3D3D3;
    background: #FFFFFF;
    margin: 0em 0em 1.5em 0em;
}
.login-page input.lock {
    background: url(../admin/images/lock.png)no-repeat 8px 10px #fff;
}
</style>
</head> 

<body>
	<div class="main-content">	
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Registro de Cliente</h3>
				<div class="widget-shadow">
					<div class="login-body">
						<form method="post">
							<input type="text" class="lock" name="nombre"  placeholder="Ingrese su nombre" required>
							<input type="text" class="lock" name="apellido" placeholder="Ingrese su apellido" required>
							<input type="number" class="lock" name="dni" placeholder="Ingrese su dni" required>
							<input type="text" class="lock" name="correo" placeholder="Ingrese su correo" required>
							<input type="text" class="lock" name="telefono" placeholder="Ingrese su teléfono" required>
							<input type="text" class="lock" name="genero" placeholder="Ingrese su género" required>
							<input type="text" class="lock" name="usuario" placeholder="Ingrese su nombre de usuario" required>
							<input type="password" class="lock" name="contrasena" placeholder="Ingrese su contraseña" required>						
							<input type="submit" name="register" value="Registrarse">
							<div class="forgot-grid">								
								<div class="forgot">
									<a href="../Login.php">Volver al inicio</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>							
			</div>
		</div>	
	</div>

	<?php include_once('../admin/includes/footer client.php');?>

	<!-- Classie -->
		<script src="../admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>

	<!--scrolling js-->
	<script src="../admin/js/jquery.nicescroll.js"></script>
	<script src="../admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="../admin/js/bootstrap.js"> </script>

   <?php
    if(isset($_SESSION['data']) && $_SESSION['data']==1){
        echo "<script>
                Swal.fire({
                title: '¡Ha sido registrado!',
                text: 'Gracias por visitarnos',
                icon: 'success'
                });
              </script>";
    }
	?>
</body>
</html>