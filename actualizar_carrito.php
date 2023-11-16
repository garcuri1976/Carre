<?php

require_once "config/conexion.php";
require_once "config/functions.php";

$user = is_user_logged_in();
$carrito = ($user) ? $_SESSION['carrito'] : [];

// Actualizar carrito
if ($_POST['action'] == 'actualizar') {

    // Update carrito
    $item = $_POST['item'];

    // Actualiza producto existente
    if (key_exists($item['id'], $carrito['items'])) {

        // Quita producto del carrito
        if ($item['cantidad'] == 0) {
            unset($carrito['items'][$item['id']]);
        } else { // Actualiza cantidad
            $carrito['items'][$item['id']]['cantidad'] = $item['cantidad'];
            $carrito['items'][$item['id']]['subtotal'] = $item['cantidad'] * $carrito['items'][$item['id']]['precio'];
        }

    } else { // Agrega nuevo producto
        $query = "SELECT * FROM productos where id_producto='". $item['id'] ."';";
        $res = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($res);

        if ($row) {
            $carrito['items'][$item['id']]['precio'] = $row['precio_rebajado'];
            $carrito['items'][$item['id']]['cantidad'] = $item['cantidad'];
            $carrito['items'][$item['id']]['nombre'] = $row['descripcion'];
            $carrito['items'][$item['id']]['subtotal'] = $item['cantidad'] * $row['precio_rebajado'];
        }
    }

    $carrito['total'] = calcularTotalCarrito($carrito);
}

// Vaciar carrito
if ($_POST['action'] == 'vaciar') {
    $carrito['items'] = [];
    $carrito['total'] = 0;
}

// Actualiza los cambios en la sesión
$_SESSION['carrito'] = $carrito;

// Muestra datos
echo json_encode($carrito);