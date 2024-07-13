<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');
  include('includes/Carrito.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salon de Belleza | Historial</title>

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
    td
    {
        padding:10px 40px;
        border: 1px solid black;
        text-align: center;
        font-weight: bold;
    }

    th
    {
        padding:10px;
        border: 1px solid black;
    }   
    .card {
        height: 100%;
    }

    .card-img-top {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }
    </style>
</head>

<body class="cbp-spmenu-push">
    <?php include_once('includes/header.php');?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5">
            <h2 class="mb-0 bread">Historial de Compras</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Historial <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section id="home-section" class="hero" style="background-image: url(images/fondo.jpg); padding-bottom: 130px;" data-stellar-background-ratio="0.5">
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <table class="table" style="text-align: center;">
                    <tr><th colspan="7"><h1>Historial de Compras</h1></th></tr>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Fecha de Compra</th>
                        <th>Cliente</th>
                    </tr>

                    <?php
                        $emailUser=$_SESSION['correo'];
                        $ret=mysqli_query($con,"select tb_producto.img, tb_producto.descripcion, tbDetalleVenta.CANTIDAD,
                                                tbDetalleVenta.PRECIO_UNITARIO, tb_venta.Fecha, tbcliente.Name, tbcliente.LastName
                                                from tbcliente 
                                                inner join tb_venta ON tb_venta.Correo = tbcliente.Email
                                                inner join tbDetalleVenta ON tbDetalleVenta.IDVENTA = tb_venta.ID 
                                                inner join tb_producto ON tb_producto.ID = tbDetalleVenta.IDPRODUCTO
                                                WHERE tbcliente.Email = '$emailUser'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>

                    <tr>
                        <th scope="row"><?php echo $cnt;?></th> 
                        <td><img src="<?php echo $row['img'];?>" class="card-img-top" alt="..."></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['CANTIDAD'] ?></td>
                        <td>S/.<?php echo $row['PRECIO_UNITARIO'] ?></td>
                        <td><?php echo $row['Fecha'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                    </tr>

                    <?php
                        $cnt=$cnt+1;
                        }
                    ?>

                </table>
            </div>
        </div>
    </section>

    <br>

    <?php include_once('includes/footer.php');?>   <!-- Incluir el diseño del footer -->

    <!-- loader -->
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