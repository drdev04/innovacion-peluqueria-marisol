<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');
  include('includes/Carrito.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon de Belleza | Carrito</title>
  
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
    .cant {
        align-content: center;
        width: 60px;
        text-align: center;
    }

    .btn-rp {
    border-radius: 0;
    float: right;
    border-color: black;
    padding: 10px;
    }

  </style>
</head>

<body>
    <?php include_once('includes/header.php');?>
    <section id="home-section" class="hero" style="background-image: url(images/fondo.jpg); padding-bottom: 130px;" data-stellar-background-ratio="0.5">
        <br><br><br><br>
        <div class="container">
            <h3>Lista de carrito</h3>
            <?php if (!empty($_SESSION['CARRITO'])) { ?>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="40%">Descripcion</th>
                            <th width="15%" class="text-center">Cantidad</th>
                            <th width="20%" class="text-center">Precio</th>
                            <th width="20%" class="text-center">SubTotal</th>
                            <th width="5%" class="text-center">---</th>
                        </tr>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                            <tr>
                                <td width="40%"><?php echo $producto['DESCRIPCION']; ?></td>
                                <td width="15%" class="text-center">
                                    <form method="POST" action="">
                                        <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                        <input type="number" name="cantidad" value="<?php echo $producto['CANTIDAD']; ?>" min="1" class="cant">
                                        <button class="btn btn-warning" name="btnAccionActualizar" type="submit"><i class="fa fa-hourglass-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td width="20%" class="text-center">S/.<?php echo $producto['PRECIO']; ?></td>
                                <td width="20%" class="text-center">
                                    S/.<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2); ?>
                                </td>
                                <th width="5%">
                                    <form method="POST" action="">
                                        <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                        <button class="btn btn-danger" name="btnAccionEliminar" type="submit">Eliminar</button>
                                    </form>
                                </th>
                            </tr>
                            <?php $total += ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="right"><h3>Total</h3></td>
                            <td align="right"><h3><?php echo number_format($total, 2); ?></h3></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <form action="recuperables/pago.php" method="POST">   
                                    <div class="alert alert-success">                           
                                        <div class="form-group">
                                            <label for="my-input">Correo de contacto:</label>
                                            <input id="email" class="form-control" type="email" name="email" value="<?php echo $_SESSION['correo'];?>" readonly>
                                        </div> 
                                        <small id="emailHelp" class="form-text text-muted">
                                            Los productos se enviaran a este correo.
                                        </small>
                                    </div>  
                                    <button class="btn-primary btn-lg btn-block" type="submit" name="btn-accion" style="border-radius: 0px">
                                        Proceder a pagar >>
                                    </button>              
                                </form>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-success">
                    No hay productos en el carrito...
                </div>
            <?php } ?>
        </div>
        <br><br>
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
