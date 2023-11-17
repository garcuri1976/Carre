<?php
require_once "config/conexion.php";
require_once "config/functions.php";
require_once "config/config.php";

// Verifica si el usuario está conectado
if ($user = is_user_logged_in()) {
    // Obtiene el carrito desde la variable de sesión
    $carrito = $_SESSION['carrito'];

    // Genera pedido
    $sql = "INSERT INTO pedidos(id_cliente, fecha_pedido, estado, total) values({$user['id_cliente']}, NOW(),'1',{$carrito['total']})";
    $query = mysqli_query($conexion, $sql);

    // Obtiene id pedido guardado
    $sql2 = "SELECT MAX(id_pedido) as pedido FROM pedidos";
    $query2 = mysqli_query($conexion, $sql2);
    $row = mysqli_fetch_assoc($query2);

    // Genera detalle del pedido
    foreach ($carrito['items'] as $id_producto => $producto)  { 
        $sql3 = "INSERT INTO pedido_detalle(id_pedido, id_producto, cantidad, subtotal)";
        $sql3.=" VALUES({$row['pedido']}, $id_producto, {$producto['cantidad']}, {$carrito['items'][$id_producto]['subtotal']})";
    
        $query3 = mysqli_query($conexion, $sql3);
    }

    if ($query && $query2 && $query3) {
        $response = array("success" => true, "message" => "Felicitaciones");
        
    } else {
        $response = array("success" => false, "message" => "Mala suerte");
    }

    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Usuario no autenticado");
    echo json_encode($response);             

}