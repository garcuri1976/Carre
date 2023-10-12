-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 16:41:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carre5_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `estado`) VALUES
(1, 'Almacen\r\n', 'activo'),
(7, 'Congelado\r\n', 'activo'),
(8, 'Limpieza\r\n', 'activo'),
(16, 'Bebidas', 'activo'),
(18, 'Deporte', 'inactivo'),
(21, 'Bazar', 'activo'),
(23, 'Enlatado', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `localidad`, `clave`) VALUES
(3, 'Agustin', 'Zarza', 'zarza_agu@gamil.com', '1163333333', 'Rucci 3125', 'Victoria', 'b7bc2a2f5bb6d521e64c8974c143e9a0'),
(4, 'Aldo', 'Grimaldi', 'tano22@gmail.com', '1165555555', 'Rucci 2722', 'Victoria', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'Mariano ', 'Arcuri', 'locoarcuri@gmail.com', '156777777', 'Rucci 2662', 'Victoria', '22a4d9b04fe95c9893b41e2fde83a427'),
(7, 'Camila', 'Gioffre', 'camila@yahoo.com', '1199999999', 'Carlos Casares 6262', 'Victoria', 'd3eb9a9233e52948740d7eb8c3062d14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_ventas` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `importe` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_ventas`, `id_productos`, `cantidad`, `precio`, `importe`) VALUES
(1, 1, 2, 5.00, 10.00),
(1, 3, 1, 1.50, 1.50),
(2, 3, 1, 1.50, 1.50),
(2, 4, 2, 1.20, 2.40),
(2, 1, 1, 5.00, 5.00),
(3, 1, 50, 5.00, 250.00),
(3, 3, 6, 1.50, 9.00),
(4, 1, 50, 5.00, 250.00),
(4, 3, 6, 1.50, 9.00),
(5, 1, 50, 5.00, 250.00),
(5, 3, 6, 1.50, 9.00),
(6, 1, 3, 5.00, 15.00),
(6, 3, 6, 1.50, 9.00),
(7, 3, 6, 1.50, 9.00),
(8, 1, 10, 5.00, 50.00),
(8, 3, 6, 1.50, 9.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio_normal` decimal(10,2) DEFAULT NULL,
  `precio_rebajado` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio_normal`, `precio_rebajado`, `stock`, `imagen`, `id_categoria`, `estado`) VALUES
(1, 'Aceite de Girasol', 'Aceite de Girasol Natura 1,5Lts.\r\n', 496.20, 496.20, 100, '1.webp', 1, 'activo'),
(2, 'Cerveza', 'Cerveza Quilmes Doble Malta lata 410 Ml.', 160.20, 160.20, 5, '11.webp', 16, 'activo'),
(3, 'Hamburguesa', 'Hamburguesa Good 320 Gr.', 644.70, 644.70, 120, '21.webp', 7, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(250) NOT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `clave`, `tipo`, `estado`, `correo`) VALUES
(3, 'Gabriel', 'Notirne', 'eb89f40da6a539dd1b1776e522459763', 'admin', '1', 'gabriel@gmail.com'),
(4, 'Ariel', 'Arcuri', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '1', 'garcuri76@gmail.com'),
(6, 'Maximo', 'Arcuri', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '1', 'maximo@gmail.com'),
(8, 'Sabrina', 'Giofrre', '12345', 'Admin', '1', 'sgioffre@gmail.com'),
(9, 'Martina', 'Arcuri', '12345', 'admin', '1', 'martina@gmail.com'),
(10, 'Antonella', 'Arcuri', '12345', 'admin', '1', 'anto_nella@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `cliente`, `estado`, `total`, `tipo`, `numero`) VALUES
(1, '2023-02-19', 'Cliente Prueba 1', 'vista', 11.50, 'Boleta', '1'),
(2, '2023-02-19', 'Cliente 2', 'vista', 8.90, 'Factura', '1'),
(3, '2023-03-14', 'Gabriel', 'vista', 259.00, 'Boleta', '75'),
(4, '2023-03-14', 'Cliente 22', 'vista', 259.00, 'Boleta', '73'),
(5, '2023-03-14', 'fewf', 'vista', 259.00, 'Boleta', '5454'),
(6, '2023-03-14', '3543', 'vista', 24.00, 'Boleta', '3543'),
(7, '2023-03-14', '55', 'vista', 9.00, 'Boleta', '5'),
(8, '2023-03-14', 'eg', 'activo', 59.00, 'Boleta', 'gr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `pedido_detalle_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `pedido_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
