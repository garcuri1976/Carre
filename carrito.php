
<?php
require_once "config/conexion.php";
require_once "config/functions.php";
require_once "config/config.php";
// Verifica si el usuario está conectado
if ($user = is_user_logged_in()) {
    // Obtiene el carrito desde la variable de sesión
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
                            <table class="table table-hover">
        <?php if (count($carrito['items']) > 0) : ?>
            <!-- <table class="table"> -->
                
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
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
                            <td><?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><?php echo $subtotal; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <!-- <th scope="row" colspan="4">Total a Pagar</th> -->
                        <!-- <td><?php echo $total_pagar; ?></td> -->
                    </tr>
                </tbody>
            </table>

            <div class="col-md-5 ms-auto">
                        <h4>Total a Pagar: <?php echo $total_pagar; ?> </h4>
                        <div class="d-grid gap-2">
                            <div id="paypal-button-container"></div>
                            <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                        </div>
                    </div>
                </div>

        <?php else : ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
        <br>
        <br>
    </div>
    </div>
            </div>
        </div>
<!-- Footer-->
<footer class="py-5" style="background-color: #ffcc50;">
            <div class="container px-1">
                <div class="text-center text-black">
                    <p>&copy;Todos los derechos reservados. Diseñado por <b>Arcurin Gustavo, Vega Claudio, Javier Torres , Machuca Nicolas, Luis Truyen</b></p> 
                </div>
            </div>
        </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
} else {
    // Si el usuario no está conectado, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
