<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Salón de belleza Marisol</a>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Servicios</a></li>     
          <li class="nav-item"><a href="products.php" class="nav-link">Productos</a></li>      
          <li class="nav-item"><a href="about.php" class="nav-link">Acerca de</a></li>       
          <li class="nav-item"><a href="contact.php" class="nav-link">Contacto</a></li> 
          <li class="nav-item nav-item dropdown">    
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
              <b>Hola invitado <?php echo $_SESSION['user'];?></b>
            </a>   
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="editUser.php">Ver Perfil</a></li>
              <li><a class="dropdown-item" href="historial.php">Pedidos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="includes/logoutUser.php">Cerrar Sesión</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <a href="mostrarCarrito.php" class="nav-link">
              <i class="fa fa-shopping-cart nav_icon"></i>
                (
                  <?php
                    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                  ?>
                )
            </a>
          </li>   
        </ul>
      </div>
  </div>
</nav>

<script>
window.addEventListener('mouseover', initLandbot, { once: true });
window.addEventListener('touchstart', initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
    s.addEventListener('load', function() {
      var myLandbot = new Landbot.Livechat({
        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2542866-1F81YCJC4VAWDUDI/index.json',
      });
    });
    s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
  }
}
</script>



