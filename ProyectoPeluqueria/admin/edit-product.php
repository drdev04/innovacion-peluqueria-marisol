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
			$can=$_POST['cantidad'];
			$pre=$_POST['precio'];
			$img=$_POST['img'];	
			$eid=$_GET['editid'];
			
			$query=mysqli_query($con, "update  tb_producto set codigo='$cod', descripcion='$des', cantidad='$can' , precio='$pre', img='$img' where ID='$eid' ");
			if ($query) {
			$msg="Producto Actualizado Satisfactoriamente.";
			} else {
				$msg="Algo salió mal. Inténtalo de nuevo";
			}

		
		}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>SPA | ACTUALIZAR PRODUCTOS</title>

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
					<h3 class="title1">Actualizar Productos</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Actualizar Productos SPA:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> 
									<?php 
										if($msg) {
											echo $msg;
										} 
									?> 
								</p>
									<?php
										$pid=$_GET['editid'];
										$ret=mysqli_query($con,"select * from  tb_producto where ID='$pid'");
										$cnt=1;
										while ($row=mysqli_fetch_array($ret)) {
									?>  
								<div class="form-group"> 
									<label for="exampleInputEmail1">Código Producto</label> 
									<input type="text" class="form-control" id="id-codigo" name="codigo" placeholder="Nombre Código" value="<?php  echo $row['codigo'];?>" required="true"> 
								</div> 
								<div class="form-group"> 
									<label for="exampleInputPassword1">Descripción</label> 
									<input type="text" class="form-control" id="id-descripcion" name="descripcion" placeholder="Descripción" value="<?php  echo $row['descripcion'];?>" required="true"> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Cantidad</label> 
									<input type="number" class="form-control" id="id-cantidad" name="cantidad" placeholder="Cantidad" value="<?php  echo $row['cantidad'];?>" required="true"> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Precio</label> 
									<input type="number" class="form-control" id="id-precio" name="precio" placeholder="Precio" value="<?php  echo $row['precio'];?>" required="true"> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">URL imagen</label> 
									<input type="text" class="form-control" id="id-img" name="img" placeholder="URL imagen" value="<?php  echo $row['img'];?>" required="true"> 
								</div>
							 		<?php 
										} 
									?>
							  	<button type="submit" name="submit" class="btn btn-default">Actualizar</button> 
							</form> 
						</div>				
					</div>						
				</div>
			</div>
		 	<?php include_once('includes/footer.php');?>
		</div>
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