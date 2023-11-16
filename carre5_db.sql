-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 15:33:12
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
(23, 'Enlatado', 'inactivo'),
(24, 'Ferreteria', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `localidad`, `estado`, `clave`) VALUES
(3, 'Agustin', 'Zarza', 'zarza_agu@gamil.com', '1163333333', 'Rucci 3125', 'Victoria', '1', 'b7bc2a2f5bb6d521e64c8974c143e9a0'),
(4, 'Aldo', 'Grimaldi', 'tano22@gmail.com', '1165555555', 'Rucci 2722', 'Victoria', '1', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'Mariano ', 'Arcuri', 'locoarcuri@gmail.com', '156777777', 'Rucci 2662', 'Victoria', '1', '22a4d9b04fe95c9893b41e2fde83a427'),
(7, 'Camila', 'Gioffre', 'camila@yahoo.com', '43384000', 'Carlos Casares 6262', 'Victoria', '1', 'a589a3a99e9adcfcb3772deaecdd60d9'),
(8, 'Pepe', 'Argento', '43384000', 'Roca 721', 'San Fernando', '1', '2', ''),
(9, 'Pepe', 'Argento', 'ppargento@gmail.com', '43384000', 'Roca 721', 'San Fernando', '2', '12345'),
(10, 'Pepe', 'Argento', 'ppargento@gmail.com', '43384000', 'Roca 721', 'San Fernando', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Eduardo', 'Villar', 'coco@gmail.com', '11680808080', 'Constitucion 3658', 'San Fernando', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'ccc', 'ccc', 'ccc@ccc.ccc', '111111', 'cccc 111', 'Victoria', '1', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Carlos', 'Correia', 'yerry@gmail.com', '11678945612', 'Lugones 2710', 'Virreyes', '1', '25f9e794323b453885f5181f1b624d0b'),
(14, 'gonza', 'boca', 'gonza@gonza.com', '111111', 'boca 222', 'Beccar', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(15, 'aaa', 'aaa', 'aaa@aaa.aaa', '111111', 'aaa 111', 'Virreyes', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'javi', 'torres', 'jtorres@yahoo.com.ar', '111', ' jjj111', 'Virreyes', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'Sabrina', 'Gioffre', 'sg@gmail.com', '15678978978', 'Santa Maria de Oro 2357', 'Virreyes', '1', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(18, 'maxi', 'bazan', 'bazan@gmail.com', '1111', 'lcdll 666', 'Lujan', '1', '71b3b26aaa319e0cdf6fdb8429c112b0');

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
  `precio_rebajado` float(10,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio_normal`, `precio_rebajado`, `stock`, `imagen`, `id_categoria`, `estado`) VALUES
(1, 'Aceite de Girasol', 'Aceite de Girasol Natura 1,5Lts.', 496.20, 494.20, 300, '1.webp', 1, 'activo'),
(2, 'Cerveza', 'Cerveza Quilmes Doble Malta lata 410 Ml.', 160.20, 160.20, 5, '11.webp', 16, 'activo'),
(3, 'Hamburguesa', 'Hamburguesa Good 320 Gr.', 644.70, 644.70, 103, '21.webp', 7, 'activo'),
(4, 'Pure de Tomate', 'Pure de Tomate Arcor 530 Gr.', 285.50, 260.00, 100, '4.webp', 1, 'activo'),
(5, 'Sal Fina', 'Sal Fina en Paquete Celusal  500gr', 250.00, 250.00, 50, '5.webp', 1, 'activo'),
(6, 'Vinagre de Alcohol', 'Vinagre de Alcohol Menoyo 1 L.', 256.33, 249.99, 200, '6.webp', 1, 'inactivo'),
(7, 'Sopa', 'sopa de arvejas', 100.00, 90.00, 100, '10.webp', 1, 'activo');

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
(6, 'Maximo', 'Arcuri', '907fc10f1338514846ef98a4e284c8e8', 'admin', '1', 'maximo@gmail.com'),
(8, 'Sabrina', 'Giofrre', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '1', 'sgioffre@gmail.com'),
(9, 'Martina Angeles', 'Arcuri', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '1', 'martina@gmail.com'),
(10, 'Antonella', 'Arcuri', '12345', 'admin', '2', 'anto_nella@gmail.com'),
(11, 'gerardo', 'giampietro', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1', 'gg@ssn.gob.ar'),
(12, 'aa', 'aa', '123456789', 'admin', '2', 'aa@aa.aaa'),
(13, 'bb', 'bb', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '2', 'bb@bb.bbb');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
