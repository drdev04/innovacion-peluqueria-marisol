<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');

	if (strlen($_SESSION['bpmsaid']==0)) {
		header('location:logout.php');
	} else { 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>SPA | Lista de Clientes</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

<script src="js/wow.min.js"></script>
<script>
		new WOW().init();
</script>
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>

<link href="css/custom.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head> 

<body class="cbp-spmenu-push">
	<div class="main-content">
		<?php include_once('includes/sidebar.php');?>
		<?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Lista de Clientes</h3>
					<div class="table-responsive bs-example widget-shadow">
						<h4>Lista de Clientes:</h4>
						<table class="table table-bordered"> 
							<thead> 
							<tr> 
								<th>#</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Dni</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th>Género</th>
								<th>Usuario</th>
								<th>Contraseña</th>
								<th>Acción</th>
							</tr>
							</thead> 
							<tbody>
								<?php
								$ret=mysqli_query($con,"select * from  tbcliente");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
								?>
							<tr>
								<th scope="row"><?php echo $cnt;?></th>
								<td><?php  echo $row['Name'];?></td>
								<td><?php  echo $row['LastName'];?></td>
								<td><?php  echo $row['Dni'];?></td>
								<td><?php  echo $row['Email'];?></td>
								<td><?php  echo $row['MobileNumber'];?></td>
								<td><?php  echo $row['Genero'];?></td>
								<td><?php  echo $row['UserName'];?></td>
								<td><?php  echo $row['Password'];?></td>
								<td>
									<a href="edit-customer-detailed.php?editid=<?php echo $row['ID'];?>">Editar</a>  
									||
									<a href="delete-customer.php?dropid=<?php echo $row['ID'];?>">Eliminar</a>  
									||   
									<a href="add-customer-services.php?addid=<?php echo $row['ID'];?>">Servicio</a>
								</td>
							</tr>   
								<?php 
								$cnt=$cnt+1;
								}?>
							</tbody>
						</table> 
					</div>
				</div>
			</div>
		</div>
			<?php include_once('includes/footer.php');?>
	</div>

	<script src="js/classie.js"></script>
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

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.js"> </script>

	<?php
		if(isset($_SESSION['data']) && $_SESSION['data']==3) {
			echo "<script>
					Swal.fire({
					title: 'Cliente eliminado',
					text: 'Gracias por elegirnos',
					icon: 'success'
					});
				</script>";
			unset($_SESSION['data']);
		}
	?>
</body>
</html>
<?php 
	}  
?>