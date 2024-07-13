<?php
session_start();

$mensaje = "";

if(isset($_POST['btnAccion'])) {
    $ID = $_POST['id']; 	
    $COD = $_POST['codigo']; 
    $DES = $_POST['descripcion']; 
    $CAN = $_POST['cantidad']; 
    $PRE = $_POST['precio']; 

    if(!isset($_SESSION['CARRITO'])) {
        $producto = array(
            'ID' => $ID,
            'CODIGO' => $COD,
            'DESCRIPCION' => $DES,
            'CANTIDAD' => $CAN,
            'PRECIO' => $PRE
        );
        $_SESSION['CARRITO'][0] = $producto;
    } else {
        $productoExistente = false;
        foreach($_SESSION['CARRITO'] as $indice => $producto) {
            if($producto['ID'] == $ID) {
                $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $CAN;
                $productoExistente = true;
                break;
            }
        }
        if(!$productoExistente) {
            $numeroProductos = count($_SESSION['CARRITO']);
            $producto = array(
                'ID' => $ID,
                'CODIGO' => $COD,
                'DESCRIPCION' => $DES,
                'CANTIDAD' => $CAN,
                'PRECIO' => $PRE
            );
            $_SESSION['CARRITO'][$numeroProductos] = $producto;
        }
    }
    $mensaje = print_r($_SESSION, true);
}

if (isset($_POST['btnAccionEliminar'])) {
    $ID = $_POST['id'];
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        if ($producto['ID'] == $ID) {
            unset($_SESSION['CARRITO'][$indice]);
            break;
        }
    }
    $_SESSION['CARRITO'] = array_values($_SESSION['CARRITO']); // Reindexar el array
}

if (isset($_POST['btnAccionActualizar'])) {
    $ID = $_POST['id'];
    $CAN = $_POST['cantidad'];
    foreach ($_SESSION['CARRITO'] as &$producto) {
        if ($producto['ID'] == $ID) {
            $producto['CANTIDAD'] = $CAN;
            break;
        }
    }
    unset($producto);
}
?>

