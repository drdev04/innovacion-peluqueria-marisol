<?php
  session_start();
  error_reporting(0);
  include('../includes/dbconnection.php');
  include('../includes/Carrito.php');
  error_reporting(0);

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
<title>Salon de Belleza | Factura</title>
<link rel="stylesheet" href="../css/styleFactura.css">
</head> 

<body>
<div class='container'>
  <div class='window'>
    <div class='order-info'>
      <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <form action="guardar_datos.php" method="POST">
          <div class='order-info-content'>
            <h2>Lista de Productos</h2>
            <div class='line'></div>         
            <table class='order-table'>
              <tbody>
              <?php $total = 0; ?>
              <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                <tr>
                  <td>
                    <img src='ss' class='full-width'></img>
                  </td>
                  <td>
                    <br> <span class='thin'><?php echo $producto['DESCRIPCION']; ?></span>
                    <br> <span class='thin small'> Cantidad:  <?php echo $producto['CANTIDAD']; ?></span>
                  </td>
                  <td>
                    <div class='thin' style="padding-top: 45px">S/.<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2); ?></div>
                  </td>
                </tr>       
                <?php $total += ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                
                <!-- Campos ocultos para enviar los datos del producto -->
                <input type="hidden" name="productos[<?php echo $indice; ?>][DESCRIPCION]" value="<?php echo $producto['DESCRIPCION']; ?>">
                <input type="hidden" name="productos[<?php echo $indice; ?>][CANTIDAD]" value="<?php echo $producto['CANTIDAD']; ?>">
                <input type="hidden" name="productos[<?php echo $indice; ?>][PRECIO]" value="<?php echo $producto['PRECIO']; ?>">
              <?php } ?>
              </tbody>
            </table>

            <div class='line'></div>
            <div class='total'>
              <span style='float:left;'>
                TOTAL
              </span>
              <span style='float:right; text-align:right;'>
                <?php echo number_format($total, 2); ?>
              </span>
            </div>

            <!-- Campo oculto para el total -->
            <input type="hidden" name="total" value="<?php echo $total; ?>">

            <!-- Botón para enviar el formulario -->
            <button type="submit">Guardar datos</button>
          </div>
        </form>
      <?php } else { ?>
        <div class="alert alert-success" style="padding-top: 20px;">
          No hay productos...
        </div>
      <?php } ?>
    </div>

    <div class='credit-info'>
      <div class='credit-info-content'>
        <table class='half-input-table'>
          <tr>
            <td>Elegir método de pago: </td>
            <td>
              <div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                <div class='dropdown-select'>
                  <ul>
                    <li>Master Card</li>
                    <li>American Express</li>
                  </ul>
                </div>
              </div>
            </td>
          </tr>
        </table>
        <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
        Card Number
        <input class='input-field'></input>
        Card Holder
        <input class='input-field'></input>
        <table class='half-input-table'>
          <tr>
            <td> Expires
              <input class='input-field'></input>
            </td>
            <td>CVC
              <input class='input-field'></input>
            </td>
          </tr>
        </table>
        <a href="../mostrarCarrito.php"><button class="btn-rp btn-success">back</button></a>
        <button class='pay-btn' type="submit" name="mostrar_mensaje" class="btn-rp btn-success">
            <i class="fa fa-money" aria-hidden="true"></i> <b>Pagar</b>
        </button>
      </div>
    </div>
  </div>
</div>
</body>

<script>
  var cardDrop = document.getElementById('card-dropdown');
var activeDropdown;
cardDrop.addEventListener('click',function(){
  var node;
  for (var i = 0; i < this.childNodes.length-1; i++)
    node = this.childNodes[i];
    if (node.className === 'dropdown-select') {
      node.classList.add('visible');
       activeDropdown = node; 
    };
})

window.onclick = function(e) {
  console.log(e.target.tagName)
  console.log('dropdown');
  console.log(activeDropdown)
  if (e.target.tagName === 'LI' && activeDropdown){
    if (e.target.innerHTML === 'Master Card') {
      document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/2vbqk5lcpi7hjoc/MasterCard_Logo.svg.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'Master Card';
    }
    else if (e.target.innerHTML === 'American Express') {
         document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/f5hyn6u05ktql8d/amex-icon-6902.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'American Express';      
    }
    else if (e.target.innerHTML === 'Visa') {
         document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'Visa';
    }
  }
  else if (e.target.className !== 'dropdown-btn' && activeDropdown) {
    activeDropdown.classList.remove('visible');
    activeDropdown = null;
  }
}
</script>
</html>


