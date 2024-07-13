<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['newpassword'];

    $query=mysqli_query($con,"update tbcliente set Password='$password'  where  Email='$email' ");
  	if($query) {
		$_SESSION['data']=1;
		session_destroy();
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
<script type="text/javascript">
function checkpass() {
	if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value) {
		alert('Las contraseñas no coinciden. ¡inténtalo denuevo!');
		document.changepassword.confirmpassword.focus();
		return false;
	}
return true;
} 
</script>
<!--//Alerta animada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head> 

<body>
	<div class="main-content">	
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Página Actualización</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Actualiza tu contraseña</h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
							<p style="font-size:16px; color:red" align="center"> 
								<?php 
									if($msg) {
										echo $msg;
									}  
								?> 
							</p>
							<input type="text" name="email" class="lock" placeholder="ingresar correo" required="true">
							<input type="password" name="newpassword" class="lock" placeholder="Nueva contraseña" required="true">							
							<input type="password" name="confirmpassword" class="lock" placeholder="Confirmar contraseña" required="true">						
							<input type="submit" name="submit" value="Actualizar">
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
                title: 'Contraseña actualizada',
                text: 'Gracias por visitarnos',
                icon: 'success'
                });
              </script>";
    }
	?>
</body>
</html>