<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Servicios</title>
  
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
    height: 400px;
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
            <h2 class="mb-0 bread">Servicios</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Servicios <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
       
    <section class="ftco-section ftco-pricing">
      <div class="container pb-2">
        <div class="row justify-content-center">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h1 class="big">Corte</h1><span class="subheading">Corte</span>
            <h2 class="mb-4">Corte Damas / Caballeros</h2>
          </div>
        </div>
        <div id="servicesCarousel" class="carousel slide pb-5" data-ride="carousel">
          <div class="carousel-inner">
            <?php
              $ret = mysqli_query($con, "select * from tblservices where id BETWEEN 1 AND 18");
              $cnt = 0;
              $items = [];
              while ($row = mysqli_fetch_array($ret)) {
                $items[] = $row;
              }
              $chunks = array_chunk($items, 3); // Dividir los elementos en grupos de 3
              foreach ($chunks as $index => $chunk) {
                $activeClass = ($index == 0) ? 'active' : '';
            ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row">
                  <?php foreach ($chunk as $row) { ?>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="<?php echo $row['img'];?>" class="card-img-top" alt="Imagen <?php echo $row['id']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['ServiceName'];?></h5>
                    <p class="card-text">S/.<?php echo $row['Cost'];?></p>
                  </div>
                </div>
              </div>
                  <?php } ?>
            </div>
          </div>
            <?php } ?>
          </div>
        <a class="carousel-control-prev" href="#servicesCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#servicesCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h1 class="big">Servicios</h1><span class="subheading">Servicios</span>
            <h2 class="mb-4">Otros Servicios</h2>
          </div>
        </div>
        <div id="servicesCarouse2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
              $ret = mysqli_query($con, "select * from tblservices where id BETWEEN 19 AND 27");
              $cnt = 0;
              $items = [];
              while ($row = mysqli_fetch_array($ret)) {
                $items[] = $row;
              }
              $chunks = array_chunk($items, 3); // Dividir los elementos en grupos de 3
              foreach ($chunks as $index => $chunk) {
                $activeClass = ($index == 0) ? 'active' : '';
            ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row">
                  <?php foreach ($chunk as $row) { ?>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="<?php echo $row['img'];?>" class="card-img-top" alt="Imagen <?php echo $row['id']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['ServiceName'];?></h5>
                    <p class="card-text">S/.<?php echo $row['Cost'];?></p>
                  </div>
                </div>
              </div>
                  <?php } ?>
            </div>
          </div>
            <?php } ?>
          </div>
        <a class="carousel-control-prev" href="#servicesCarouse2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#servicesCarouse2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
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