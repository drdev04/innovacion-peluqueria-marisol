<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');
  $eid=$_SESSION['id'];

  if(isset($_POST['login'])) {
    $name=$_POST['name'];
    $ape=$_POST['lastname'];
    $dni=$_POST['dni'];
    $email=$_POST['email'];
    $mobilenum=$_POST['phone'];
    $usu=$_POST['user'];
    $pass=$_POST['pass'];
	
    $query=mysqli_query($con, "update  tbcliente set Name='$name', LastName='$ape', Dni='$dni', Email='$email', MobileNumber='$mobilenum', UserName='$usu', Password='$pass' where ID = '$eid'");

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mostrar Carrito</title>
  
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
    .file-upload {
      display: none;
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
            <h2 class="mb-0 bread">Perfil de Usuario</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Perfil <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    
    <section id="home-section" class="hero" style="background-image: url(images/fondo.jpg); padding-top: 90px; padding-bottom: 40px;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row h-100">
                <div class="col-6 d-flex flex-column align-items-center justify-content-center" style="background: #f0f0f0;">
                    <img src="images/about.jpg" alt="Descripción de la imagen" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center p-3" style="background: #ffffff;">
                    <form action="#" method="POST" style="width: 100%; max-width: 400px;">
                        <div class="form-row">
                            <div class="col-12 d-flex flex-column align-items-center justify-content-center pb-4">
                                <img id="profileImage" src="https://via.placeholder.com/150" alt="Imagen de perfil" class="rounded-circle" style="width: 150px; height: 150px;">
                                <a href="#" onclick="document.getElementById('fileInput').click(); return false;" class="btn btn-primary mt-3">Elegir Imagen</a>
                                <input type="file" id="fileInput" class="file-upload" accept="image/*" onchange="loadFile(event)">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="firstName">Nombre</label>
                                <input type="text" class="form-control" id="firstName" name="name" placeholder="<?php echo $_SESSION['nam'];?>" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="lastname" placeholder="<?php echo $_SESSION['ape'];?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $_SESSION['correo'];?>" required />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Teléfono</label>
                                <input type="number" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="<?php echo $_SESSION['num'];?>" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dni">Dni</label>
                                <input type="number" class="form-control" id="id-dni" name="dni" placeholder="<?php echo $_SESSION['dni'];?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" id="username" name="user" placeholder="<?php echo $_SESSION['user'];?>" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="pass" placeholder="Contraseña" required />
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Guardar Cambios</button>
                    </form>
                </div>  
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php');?>
    
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>

    <script>
    var loadFile = function(event) {
        var image = document.getElementById('profileImage');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script> 
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