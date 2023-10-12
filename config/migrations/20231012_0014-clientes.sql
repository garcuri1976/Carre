ALTER TABLE `clientes` CHANGE `correo` `correo` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `clave` `clave` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `productos` CHANGE `precio_rebajado` `precio_rebajado` DECIMAL(10,2) NOT NULL;
