<table>
    <tr>
        <th>Producto    </th>
        <th>Precio      </th>
        <th>Cantidad    </th>
        <th>Total       </th>
    </tr>
    <?php
    session_start();
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<tr>";
            if (isset($producto['nombre'])) {
                echo "<td>{$producto['nombre']}</td>";
            } else {
                echo "<td>Nombre no disponible</td>";
            }
            echo "<td>\${$producto['precio']}</td>";
            echo "<td>{$producto['cantidad']}</td>";
            if (isset($producto['nombre']) && isset($producto['cantidad'])) {
                echo "<td>\$" . $producto['precio'] * $producto['cantidad'] . "</td>";
            } else {
                echo "<td>Total no disponible</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>El carrito está vacío</td></tr>";
    }
    ?>
</table>

<!-- Agregar un botón para volver a la página de productos -->
<a href="index.php">Volver a la lista de productos</a>

<!-- Agregar un botón para vaciar el carrito -->
<form method="post" action="vaciar_carrito.php">
    <input type="submit" value="Vaciar Carrito">
</form>
