<?php 


function is_user_logged_in() 
{	
    session_start();

    $user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

	return $user;
}

function calcularTotalCarrito($carrito) 
{
    $total = 0;

    foreach ($carrito['items'] as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    return $total;
}
?>
