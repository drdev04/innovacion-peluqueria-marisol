<?php 
include('includes/dbconnection.php'); 	// Incluir el archivo de conexión a la base de datos.
session_start(); 					  	// Iniciar la sesión.
error_reporting(0); 				 	// Configurar el nivel de reporte de errores a cero (no mostrar errores).

if(isset($_POST['submit'])) 			// Verificar si el formulario ha sido enviado (si se ha presionado el botón 'submit').
  {										// Asignar los datos del formulario a variables...
    $name=$_POST['name']; 				
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);   // Generar un número de cita aleatorio.
	
	// Insertar los datos de la cita en la base de datos.
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
    
	if ($query) {   // Verificar si la inserción fue exitosa.
		$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'"); // Recuperar el número de la cita recién insertada.
		$result=mysqli_fetch_array($ret);
		$_SESSION['aptno']=$result['AptNumber'];   						// Guardar el número de la cita en la sesión.
 		echo "<script>window.location.href='thank-you.php'</script>";   // Redirigir al usuario a la página 'thank-you.php'.	
  	} else {
      $msg="Algo salió mal. Inténtalo de nuevo";						// Mostrar un mensaje de error si la inserción falla.
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inicio</title>
	
	<!--Estilos CSS para el diseño de la pagina web-->
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
	<!-- Estilos CSS para el diseño de la pagina web -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  </head>

  <body>
	<?php include_once('includes/header.php');?>   <!-- Incluir el diseño del header -->

	<!-- Primer contenedor -->
    <section id="home-section" class="hero" style="background-image: url(images/fondo.jpg);" data-stellar-background-ratio="0.5">	
		<!-- Contenedor principal del carrusel -->
		<div class="home-slider owl-carousel">
			<!-- Elemento individual del slider -->
			<div class="slider-item js-fullheight">
	      		<div class="overlay"></div>
	        	<div class="container-fluid p-0">
	          		<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          		<img class="one-third align-self-end order-md-last img-fluid" src="images/c.png" alt="" width="1000" height="500">
		          		<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          			<div class="text mt-5">
		          				<span class="subheading">Marisol</span>
			            		<h1 class="mb-4">Salón de Belleza</h1>
			            		<p class="mb-4">Nos enorgullecemos de nuestro trabajo de alta calidad y atención al detalle. Los productos que utilizamos son de marca de primera calidad.</p>
		            		</div>
		          		</div>
	        		</div>
	        	</div>
	      	</div>
			<!-- Elemento individual del slider -->
	      	<div class="slider-item js-fullheight">
	      		<div class="overlay"></div>
	        	<div class="container-fluid p-0">
	          		<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          		<img class="one-third align-self-end order-md-last img-fluid" src="images/corte.png" alt="">
		          		<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          			<div class="text mt-5">
		          				<span class="subheading">Marisol</span>
			            		<h1 class="mb-4">Peluquería y SPA</h1>
			            		<p class="mb-4">Este salón ofrece enormes instalaciones con equipos de tecnología avanzada y un servicio de la mejor calidad. Aquí le ofrecemos el mejor tratamiento que nunca haya experimentado antes.</p> 
		            		</div>
		          		</div>
	        		</div>
	        	</div>
	    	</div>
	    </div>
    </section>

	<br>

	<!-- Segundo contenedor -->
    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
				<div class="one-forth d-flex align-items-end">
					<div class="text">
						<div class="overlay"></div>
						<div class="appointment-wrap">
							<span class="subheading">Reservaciones</span>
							<h3 class="mb-2">Haga una cita</h3>
							<!-- bloque del formulario de registro de cita -->
							<form action="#" method="post" class="appointment-form">
								<div class="row">
									<div class="col-sm-12">										
										<div class="form-group">								
											<input type="text" class="form-control" id="name" placeholder="<?php echo $_SESSION['nam'];?>" value="<?php echo $_SESSION['nam'];?>" name="name" required="true" readonly>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="email" class="form-control" id="appointment_email" placeholder="<?php echo $_SESSION['correo'];?>" value="<?php echo $_SESSION['correo'];?>" name="email" required="true" readonly>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="services" id="services" required="true" class="form-control">
													<option value="">Selecciona Nuestros Servicios</option>
														<!-- bloque php-->
														<?php $query=mysqli_query($con,"select * from tblservices");
															while($row=mysqli_fetch_array($query))
															{
														?>
															<option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
														<?php 
															} 
														?> 
														<!-- bloque php-->
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Fecha" name="adate" id='adate' required="true">
										</div>    
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Hora" name="atime" id='atime' required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $_SESSION['num'];?>" value="<?php echo $_SESSION['num'];?>" required="true" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="HAZ UNA CITA" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="one-third">
					<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
				</div>
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

	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#atime", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                minTime: "10:00",
                maxTime: "23:00",
                disable: [
                    function(date) {
                        // Disable Sundays
                        return (date.getDay() === 0);
                    },
                    // Additional dates to disable (e.g., holidays)
                    "2024-07-10", "2024-07-25"
                ],
                locale: {
                    firstDayOfWeek: 1 // Start week on Monday
                }
            });
        });
    </script>
    <script>
    	document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#adate", {
                dateFormat: "Y-m-d",
                disable: [
                    // Specific dates to disable
					{ from: "2023-07-09", to: "2024-07-09" }
                ],
                locale: {
                    firstDayOfWeek: 1 // Start week on Monday
                }
            });
        });
    </script>
  </body>
</html>