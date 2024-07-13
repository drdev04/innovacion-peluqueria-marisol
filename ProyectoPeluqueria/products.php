<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');
  include('includes/Carrito.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Productos</title>
  
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
  .card {
    height: 100%;
  }
  .card-img-top {
    height: 300px;
    object-fit: cover;
  }
  </style>
</head>

<body>
	  <?php include_once('includes/header.php');?> 

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5">
            <h2 class="mb-0 bread">Productos</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Productos <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
        
    <section class="ftco-section ftco-pricing">
			<div class="container">
            <!-- <div class="alert alert-success"> 
                  Pantalla de mensaje...
                  <?php echo $mensaje; ?>
                  </div> -->
				<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big">Productos</h1>
          	<span class="subheading">Productos</span>
            <h2 class="mb-4">Elige Nuestros Productos</h2>
            <p>Tenemos un gran pull de Productos para tu deleite, sabemos que te encantará elegir nuestros Productos</p>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <?php
              $ret=mysqli_query($con,"select *from tb_producto");
              $cnt=1;
              while ($row=mysqli_fetch_array($ret)) {
            ?>
              <div class="col-md-4 mb-5">
                <div class="card" style="width: 18rem;">
                  <img src="<?php echo $row['img'];?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php  echo $row['descripcion'];?></h5>
                    <p class="card-text">S/.<?php  echo $row['precio'];?></p>
                  <div class="card-body">
                    <form method="POST" action="">
                      <input type="hidden" class="form-control" type="text" name="id" id="" value="<?php  echo $row['ID'];?>">
                      <input type="hidden" class="form-control" type="text" name="codigo" id="" value="<?php  echo $row['codigo'];?>">
                      <input type="hidden" class="form-control" type="text" name="descripcion" id="" value="<?php  echo $row['descripcion'];?>">
                      <input type="hidden" class="form-control" type="text" name="cantidad" id="" value="<?php  echo 1;?>">
                      <input type="hidden" class="form-control" type="text" name="precio" id="" value="<?php  echo $row['precio'];?>">
                      <button class="btn btn-primary" name="btnAccion" type="submit" value="Eliminar">Agregar</button>
                    </form>  
                  </div>
                  </div>
                </div>
              </div>
            <?php 
              $cnt=$cnt+1;
              }
            ?>
          </div>
        </div>
      </div>
		</section>

    <?php include_once('includes/footer.php');?>
    
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
</body>
</html>