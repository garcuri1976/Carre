<?php
require_once "config/conexion.php";
require_once "config/functions.php";
require_once "config/config.php";

// Verifica si el usuario está conectado
if (!$user = is_user_logged_in()) {
    // Si el usuario no está conectado, redirige a la página de inicio de sesión
    header("Location: login.php"); 
    exit();
}
    
$carrito = $_SESSION['carrito'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>  
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="py-5" style="background-color: #ffcc50;">
        <div class="container px-1">
            <div class="text-center text-black">
                <div class="container mt-5">
                    <h1 class="display-4 fw-bolder">Carrito de Compras</h1>
                    <p class="lead fw-normal text-grey-50 mb-0">Productos acumulados: 
                        <span class="badge bg-success" id="carrito"><?php echo count($carrito['items']) ?></span>
                    </p>
                    <a href="./index.php" class="">Volver al inicio</a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <?php if (count($carrito['items']) > 0) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col" class="text-end">Precio Unitario</th>
                                    <th scope="col" class="text-end">Cantidad</th>
                                    <th scope="col" class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_pagar = 0;
                                foreach ($carrito['items'] as $id_producto => $producto) :
                                    $subtotal = $producto['cantidad'] * $producto['precio'];
                                    $total_pagar += $subtotal;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $id_producto; ?></th>
                                        <td><?php echo $producto['nombre']; ?></td>
                                        <td class="text-end"><?php echo $producto['precio']; ?></td>
                                        <td class="text-end"><?php echo $producto['cantidad']; ?></td>
                                        <td class="text-end"><?php echo $subtotal; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <div class="col-md-5 ms-auto">
                            <h4 class="text-end">Total a Pagar: $ <?php echo $total_pagar; ?> </h4>
                            <div class="d-grid gap-2">
                                <div id="paypal-button-container"></div>
                                <button class="btn btn-warning" type="button" id="btnpedido">Solicitar Pedido</button>
                                
                            </div>
                        </div>

                    <?php else : ?>
                        <p>El carrito está vacío.</p>
                    <?php endif ?>
                    <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5" style="background-color: #ffcc50;">
        <div class="container px-1">
            <div class="text-center text-black">
                <p>&copy;Todos los derechos reservados. Diseñado por <b>Arcurin Gustavo, Vega Claudio, Javier Torres , Machuca Nicolas, Luis Truyen</b></p> 
            </div>
        </div>
    </footer>        
</body>

<script>
$(document).ready(function() {
    $("#btnpedido").click(function() {
        $.ajax({
            type: "POST",
            url: "carga_pedido.php",
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    // Vacía el carrito
                    vaciarCarrito();
                    
                    alert("Pedido generado con éxito: " + response.message);
                    // Puedes redirigir a otra página si lo deseas
                    window.location.href = "index.php";
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(error) {
                console.error("Error en la solicitud:", error);
            }
        });
    });
});

function vaciarCarrito() {
    $.ajax({
        url: 'actualizar_carrito.php',
        type: 'POST',
        async: true,
        data: {
            action: 'vaciar',
        },
        success: function(response) {
            return true;
        },
        error: function(error) {
            console.log(error);
            return false;
        }
    });
}
</script>
</html>