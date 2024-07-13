<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');

	if (strlen($_SESSION['bpmsaid']==0)) {
	header('location:logout.php');
	} else {
		if(isset($_POST['submit'])) {
			$cod=$_POST['codigo'];
    		$des=$_POST['descripcion'];
			$cant=$_POST['cantidad'];
			$pre=$_POST['precio'];
			$url=$_POST['img'];

 			$query=mysqli_query($con, "insert into  tb_producto (codigo,descripcion,cantidad,precio,img)
									   value ('$cod','$des','$cant','$pre','$url')");
    		if ($query) {
				echo "<script>alert('Producto agregado satisfactoriamente.');</script>"; 
				echo "<script>window.location.href = 'add-products.php'</script>"; 
			} else {
				echo "<script>alert('Algo salió mal. Inténtalo de nuevo.');</script>";  	
			} 
		}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>SPA | Agregar Producto</title>

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
</head>

<body class="cbp-spmenu-push">
	<div class="main-content">
		<?php include_once('includes/sidebar.php');?>
	 	<?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Agregar Producto</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Agregar Producto:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> 
									<?php 
										if ($msg) {
											echo $msg;
										}  
									?> 
								</p>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Código</label> 
									<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Nombre de Producto" value="" required="true"> 
								</div> 
								<div class="form-group"> 
										<label for="exampleInputEmail1">Descripción</label> 
										<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Apellido de Producto" required="true">
									</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Cantidad</label> 
									<input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad de Producto" value="" required="true"> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Precio</label> 
									<input type="number" class="form-control" id="precio" name="precio" placeholder="Producto" value="" required="true" maxlength="10" pattern="[0-9]+"> 
								</div>		
								<div class="form-group"> 
									<label for="exampleInputPassword1">URL Imagen</label>
									<input type="text" id="img" name="img" class="form-control" placeholder="Imagen" value="" required="true">
								</div>							
								<button type="submit" name="submit" class="btn btn-default">Agregar Producto</button> 
							</form> 
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
</body>
</html>
<?php 
	} 
?>