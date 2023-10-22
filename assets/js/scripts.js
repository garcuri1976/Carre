$(document).ready(function () {
    let productos = [];
    let items = {
        id: 0
    }

    $('.navbar-nav .nav-link[category="all"]').addClass('active');

    $('.nav-link').click(function () {
        let productos = $(this).attr('category');

        $('.nav-link').removeClass('active');
        $(this).addClass('active');

        $('.productos').css('transform', 'scale(0)');

        function ocultar() {
            $('.productos').hide();
        }
        setTimeout(ocultar, 400);

        function mostrar() {
            $('.productos[category="' + productos + '"]').show();
            $('.productos[category="' + productos + '"]').css('transform', 'scale(1)');
        }
        setTimeout(mostrar, 400);
    });

    $('.nav-link[category="all"]').click(function () {
        function mostrarTodo() {
            $('.productos').show();
            $('.productos').css('transform', 'scale(1)');
        }
        setTimeout(mostrarTodo, 400);
    });

    $('.agregar').on('change', function(e){
        e.preventDefault();
        const id = $(this).data('id');
        item = {
            id: id,
            cantidad: this.value
        }

        $.ajax({
            url: 'actualizar_carrito.php',
            type: 'POST',
            async: true,
            data: {
                action: 'actualizar',
                item: item
            },
            success: function(response) {
                const res = JSON.parse(response);
                actualizarCarrito(res);
            },
            error: function(error) {
                console.log(error);
            }
        });
    })

    $('#btnCarrito').click(function(e){
        $('#btnCarrito').attr('href','carrito.php');
    })
    $('#btnVaciar').click(function(){
        localStorage.removeItem("productos");
        $('#tblCarrito').html('');
        $('#total_pagar').text('0.00');
    })
    //categoria
    $('#abrirCategoria').click(function(){
        $('#categorias').modal('show');
    })
    //productos
    $('#abrirProducto').click(function () {
        $('#productos').modal('show');
    })
    $('.eliminar').click(function(e){
        e.preventDefault();
        if (confirm('Esta seguro de eliminar?')) {
            this.submit();
        }
    })
});

function actualizarCarrito(carrito){
    cantidad = carrito ? Object.keys(carrito.items).length : 0;
    $('#carrito').text(cantidad);
}




