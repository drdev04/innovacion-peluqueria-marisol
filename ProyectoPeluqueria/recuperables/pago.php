<?php
  session_start();
  error_reporting(0);
  include('../includes/dbconnection.php');
  include('../includes/Carrito.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon de Belleza | Pago</title>
  
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">

  <link rel="stylesheet" href="../css/aos.css">

  <link rel="stylesheet" href="../css/ionicons.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../css/jquery.timepicker.css">

  
  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/icomoon.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <?php include_once('../includes/header.php');?>
  <section id="home-section" class="hero" style="background-image: url(../images/fondo.jpg)" data-stellar-background-ratio="0.5">
    <br><br><br><br>
      <div class="container">

        <?php
          if($_POST) {

            $total=0;
            $SID=session_id();
            $Correo=$_POST['email'];

            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
              $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
            }

            $query=mysqli_query($con, "insert into  tb_venta (ID, claveTransaccion, Fecha, Correo, Total, estado) 
            values (NULL, '$SID', NOW(), '$Correo', '$total', 'pendiente')");

            if ($query) {
              $last_id = mysqli_insert_id($con);
            }
            
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
              $id=$producto['ID'];
              $precio=$producto['PRECIO'];
              $cantidad=$producto['CANTIDAD'];
              $query2=mysqli_query($con, "insert into tbDetalleVenta (ID, IDVENTA, IDPRODUCTO, PRECIO_UNITARIO, CANTIDAD, DESCARGADO)
              values (NULL, '$last_id', '$id', '$precio', '$cantidad', '0')");
            }

            //echo "<h3> .$total. </h3>";
          }
        ?>

        <div class="jumbotron text-center" style="background-color: white;">
          <h1 class="display-4">!Pago realizado con exito!</h1>
          <hr class="my-4">
          <p class="lead"> Se pago la cantidad de:
            <h4>S/.<?php echo number_format($total,2); ?></h4>
          </p>
          <p>Los productos podrán ser visualizados en:<br>
            <strong>(Correo: <?php echo  $Correo;?>)</strong>
          </p>
          <a href="../mostrarCarrito.php"><button class="btn btn-primary">Regresar</button></a>
        </div>

      </div>
    <br><br>
  </section>
  <?php include_once('../includes/footer.php');?>
    
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>


