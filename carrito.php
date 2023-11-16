
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
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Carre5 OnLine</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="py-5" style="background-color: #ffcc50;">
       

        <div class="container px-1">
            <div class="text-center text-black">
    <!--<header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">-->
                <h1 class="display-4 fw-bolder">Carrito de Compras</h1>
                <p class="lead fw-normal text-grey-50 mb-0">Productos Deseados.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: $ <span id="total_pagar">0.00</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
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
