<?php 
    require_once "config/conexion.php"; 
    require_once "config/functions.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>carre5</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> 
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/estilos.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <link href="assets/carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/carousel/animate.min.css" rel="stylesheet">
        <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="admin/plugins/moment/moment.min.js"></script>
        <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="assets/carousel/owl.carousel.min.js"></script>
        <script src="assets/main.js"></script>
        <script src="assets/main.js"></script>
        <script src="assets/carousel/owl.carousel.min.js"></script>
        <style>
            /* Estilos para el encabezado */
            .header {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 20px;
            }

            /* Estilos para las filas */
            .full-width {
                width: 100%;
                text-align: center;
                padding: 20px;
            }

            .two-columns {
                display: flex;
            }

            .column-20 {
                flex: 20%;
                background-color: #ffcc50;
                padding: 20px;
            }

            .column-80 {
                flex: 80%;
                /*background-color: #ffcc50;*/
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php if ($user = is_user_logged_in()) : ?>
            <?php $carrito = $_SESSION['carrito'] ?>
            <a href="#" class="btn-flotante" id="btnCarrito">Ir al Carrito</a>
        <?php endif ?>
        <div class="py-3" >
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #ff6620;">
                    <!-- <div class="col-lg-2"> -->
                        <!-- <img src="assets\img\logos\PinCarre5.png" alt="carre5" > -->
                    <!-- </div> -->

                    <div class="col-lg-2">
    <img src="assets\img\logos\PinCarre5.png" alt="carre5" class="img-fluid" style="max-width: 55%; height: auto;"> 
</div> 


                    
                    <div class="container-fluid">
                    <a class="navbar-brand" style="font-family:  impact; font-size: 18px;">CATEGORIAS</a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <a href="#" class="nav-link"  style="font-size: 14px; font-weight: bold;" category="all">Todas</a>
                                
                            <!--levanta inregistrcarrfo de categoria para armar menu-->    
                                <?php
                                $query = mysqli_query($conexion, "SELECT * FROM categorias where estado = 'activo'");
                                while ($data = mysqli_fetch_assoc($query)) { ?>
                                    <a href="#" class="nav-link" style="font-size: 14px; font-weight: bold;" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                                <?php } ?>
                            </ul>   
                        </div>
                    </div>
                    <?php if (!$user) : ?>
                        <div class="col-lg-1  text-right">
                            <a href="registro.php" class="text-decoration-none">
                            <i class="far fa-address-card fa-3x" title="Registro" style="color: #ff8800;" title="Registrarse"></i>
                            </a>
                        </div>  
                        <div class="col-lg-1">
                            <a href="login.php" class="text-decoration-none">
                            <i class="fas fa-user fa-3x" title="Login" style="color: #ff8800;" title="Ingrear al sistema"></i>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-1">
                            <a href="salir.php" class="text-decoration-none">
                            <i class="fas fa-sign-out-alt fa-3x" style="color: #ff8800;" title="Cerrar sesión"></i>
                            </a>
                        </div>
                    <?php endif ?>
                </nav>
            </div>
        </div>
        <br /><br /><br /><br />
        <header class="py-3 top" style="background-color: #ffcc50;">
        <div class="container px-1">
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-5 text-center">
            <h2 class="display-4 fw-bolder">Carre5 OnLine</h2> 
            <p class="lead fw-normal text-grey-50 mb-0">La manera más cómoda de hacer las compras</p> 
        </div>
    </div>
</div>


        </header>
        <!-- FIN CABECERA -->
            <!-- barra encabezado-->
        
        <div class="two-columns">

        <div class="column-20">
        <!--<h2>20%</h2>-->
            <div class="btn-group-vertical text-center d-flex align-items-center justify-content-center" role="group" aria-label="Vertical button group">
                <button type="button" class="btn btn-primary" onclick="window.open('ccomprar.php', '_blank', 'width=600,height=400,scrollbars=yes')">Como Comprar?</button>
                <button type="button" class="btn btn-primary" onclick="window.open('sucursales.php', '_blank', 'width=600,height=400,scrollbars=yes')">Sucursales</button>
                <button type="button" class="btn btn-primary" onclick="window.open('catalogo.php', '_blank', 'width=600,height=400,scrollbars=yes')">Catalogo</button>
                <button type="button" class="btn btn-primary" onclick="window.open('https://www.argentina.gob.ar/economia/comercio/preciosjustos', '_blank', 'width=600,height=400,scrollbars=yes')">Presios Justos</button>
                <button type="button" class="btn btn-primary" onclick="window.open('https://www.argentina.gob.ar/justicia/derechofacil/leysimple/ley-de-gondolas', '_blank', 'width=600,height=400,scrollbars=yes')">LEY de Gondolas</button>
                
            </div>
        </div>

        <div class="column-80">
        <!-- ... (tu código HTML actual) ... -->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-2 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!--levanta info de productos para armar catalogo-->
                <?php
                $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria and p.estado='activo'");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-4 productos" category="<?php echo $data['categoria']; ?>">

                            <div class="card p-2 h-100">

                                <!-- Sale badge-->
                                <div class="badge bg-danger text-white position-absolute"
                                     style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                                <!--imagen-->

                                <img class="card-img-top p-3" src="assets/img/productos/<?php echo $data['imagen']; ?>"
                                     alt="..."/>

                                <!--datos producto-->
                                <div class="card-body p-2 h-75">
                                    <div class="text-center">
                                        <!-- nombre-->
                                        <h6 class="fw-bolder"
                                            style="font-size: 18px;"><?php echo $data['nombre'] ?></h6>
                                        <!--descripcion-->
                                        <p><?php echo $data['descripcion']; ?></p>
                                        <div class="d-flex justify-content-center small  text-warning mb-2"
                                             style="font-size: 10px;">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!--precios-->
                                        <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal'] ?></span>
                                        <?php echo $data['precio_rebajado'] ?>
                                    </div>
                                </div>
                                <!--cargar producto-->
                                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                    <?php if (isset($carrito)) : ?>
                                        <?php $cantidad = key_exists($data['id_producto'], $carrito['items']) ? $carrito['items'][$data['id_producto']]['cantidad'] : 0 ?>
                                        <input type="number" class="btn btn-outline-dark mt-auto agregar"
                                               min="0" max="<?php echo $data['stock']; ?>"
                                               data-id="<?php echo $data['id_producto']; ?>"
                                               value="<?php echo $cantidad ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
</div>
<br>
        <div class="container-fluid pt-5" style="background-color: #ffcc50;">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 40px;">
                        <i class="fa fa-check fa-3x"  style="color: #ff6620;"></i>
                        <h6 class="font-weight-semi-bold m-0" style="padding-left: 20px;"> Calidad </h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 40px;">
                        <i class="fa fa-shipping-fast fa-3x"  style="color: #ff6620;"></i>
                        <h6 class="font-weight-semi-bold m-0" style="padding-left: 20px;"> Envios</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 40px;">
                        <i class="fas fa-exchange-alt fa-3x"  style="color: #ff6620;"></i>
                        <h6 class="font-weight-semi-bold m-0" style="padding-left: 20px;"> Sin esperas</h6>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 40px;">
                        <i class="fa fa-phone-volume fa-3x"  style="color: #ff6620;"></i>
                        <h6 class="font-weight-semi-bold m-0" style="padding-left: 20px;"> Compras 24/7</h6>
                    </div>
                </div>
            </form>
            <h6 class="text-secondary text-uppercase mt-4 mb-3">SIGUENOS</h6>
            <div class="d-flex">
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <br>
        <div class="container">
        <div class="row">
            <div class="col-md-1">
            <!-- Contenido de la primera columna -->
            </div>
            <div class="col-md-10">
            <!-- Contenido de la segunda columna (carrusel) -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/carteles/carrusel_tmp1.png"  class="d-block w-100" alt="carrusel1">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/carteles/carrusel_tmp2.png"  class="d-block w-100" alt="carrusel2">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/carteles/carrusel_tmp3.png"  class="d-block w-100" alt="carrusel3">
                    </div>
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#ccarouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="col-md-1">
            <!-- Contenido de la tercera columna -->
            </div>
        </div>
        </div>
        </div>
    </div>                
        <br>
        <div class="col-md-12"></div>
        <div class="container">
            <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
            <p>Recibi todas las ofertas y novedades</p>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ingresa tu email">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Suscribirse</button>
                    </div>
                </div>
            </form>
            <h6 class="text-secondary text-uppercase mt-4 mb-3">SIGUENOS</h6>
            <div class="d-flex">
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <br><br>

        <footer class="py-5" style="background-color: #ff6620;">
        <div class="container">
            <p class="m-0 text-center text-white"></p>
            <div class="col-4 col-lg-4 mb-3 text-white">
                <h4>CONTACTO</h4>
                    <ul class="list-unstyled">
                    <li class="mb-2"> <li class="mb-2"><i class="fa fa-phone-alt text-primary mr-3" style="margin-right: 8px;" style="padding-left: 20px;"><a></i>Teléfono: (54 11) 5444-8585</a></li>
                    <i class="fa fa-map-marker-alt text-primary mr-3" style="margin-right: 8px;""></i>BELGRANO 637, CABA, ARGENTINA A</p>
                    <li class="mb-2"><a><i class="fa fa-envelope text-primary mr-3" style="margin-right: 8px;" ></i>Email: info@carre5.com.ar</a></li>
                    <i class="bi bi-shop text-primary mr-3" style="margin-right: 8px;"></i>Supermercado Carre5 OnLine</p>
                    <i class="bi bi-clipboard-check text-primary mr-3" style="margin-right: 8px;"></i>CUIT: 30-66666666-9</p>            
                    </ul>
            </div>
            </footer>
            <!-- <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
                <div class="col-md-12 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy;Todos los derechos reservados. Diseñado por <b>Arcurin Gustavo, Vega Claudio, Javier Torres , Machuca Nicolas</b>
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">
                    <img class="img-fluid" src="img/payments.png" alt="">-->
                <!-- </div> -->
            </div>
        <!-- <button class="btn btn-primary" type="button" id="btnVaciar"> Vaciar carrito</button> -->
        </div>
        </footer>
        <br>
        <footer class="py-5" style="background-color: #ffcc50;">
            <div class="container px-1">
                <div class="text-center text-black">
                    <p>&copy;Todos los derechos reservados. Diseñado por <b>Arcurin Gustavo, Vega Claudio, Javier Torres , Machuca Nicolas, Luis Truyen</b></p> 
                </div>
            </div>
        
            
        </footer>
        <script>
            $(document).ready(function() {
                localStorage.removeItem("productos");
                $('#tblCarrito').html('');
                $('#total_pagar').text('0.00');
            });
        </script>
        <!-- Back to Top -->
        <a href="#" class="btn-flotanteArriba back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </body>
</html>