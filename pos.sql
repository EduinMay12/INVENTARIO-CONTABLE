-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para posinventor
CREATE DATABASE IF NOT EXISTS `posinventor` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `posinventor`;

-- Volcando estructura para tabla posinventor.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla posinventor.categorias: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
	(1, 'Agregados', '2021-07-09 13:42:12'),
	(2, 'Derivados', '2021-07-09 13:42:23'),
	(3, 'Cementos y Derivados', '2021-07-09 13:42:46'),
	(4, 'Laminas', '2021-07-09 13:42:57'),
	(5, 'Acero', '2021-07-09 13:54:28'),
	(6, 'Tubos Básicos Sanitario', '2021-07-09 13:54:54');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla posinventor.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `referencia` text COLLATE utf8_spanish_ci NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla posinventor.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`, `referencia`, `compras`, `ultima_compra`, `fecha`) VALUES
	(1, 'Prueba 1', '(999) 999-9999', 'sahcabchen', '', 953, '2021-08-03 14:40:15', '2021-08-05 13:37:12'),
	(2, 'Gerson Poox', '(996) 108-0421', 'Sahcabchen', 'casa color blanco frente a don tolio', 122, '2021-08-05 15:38:44', '2021-08-05 15:38:44');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla posinventor.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` float NOT NULL DEFAULT '0',
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla posinventor.productos: ~63 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `unidad_medida`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
	(1, 1, '101', 'Polvo', 'M3', 'vistas/img/productos/default/anonymous.png', 9996.5, 520, 520, 4, '2021-08-03 14:40:12'),
	(2, 1, '102', 'Grava', 'M3', 'vistas/img/productos/default/anonymous.png', 9997, 520, 520, 3, '2021-08-03 14:40:12'),
	(3, 1, '103', 'Escombro', 'M3', 'vistas/img/productos/default/anonymous.png', 9988, 1300, 1300, 12, '2021-08-03 14:40:13'),
	(4, 1, '104', 'Sascab', 'M3', 'vistas/img/productos/default/anonymous.png', 9999, 1400, 1400, 1, '2021-08-05 15:27:53'),
	(5, 1, '105', 'Piedra', 'M3', 'vistas/img/productos/default/anonymous.png', 9999, 1300, 1300, 1, '2021-08-05 15:38:44'),
	(6, 2, '201', 'Block Procon Rojo', 'Pieza', 'vistas/img/productos/default/anonymous.png', 9900, 18.8, 18.8, 100, '2021-08-05 15:38:43'),
	(7, 2, '202', 'Block Procon Azul', 'Pieza', 'vistas/img/productos/default/anonymous.png', 10000, 11, 11, 0, '2021-07-22 14:26:13'),
	(8, 2, '203', 'Block Mapsa', 'Pieza', 'vistas/img/productos/default/anonymous.png', 9980, 11, 11, 20, '2021-08-05 15:27:53'),
	(9, 2, '204', 'Block  Mitza', 'Pieza', 'vistas/img/productos/default/anonymous.png', 9350, 12, 12, 650, '2021-08-03 14:40:13'),
	(10, 2, '205', 'Bovedilla Procon', 'Pieza', 'vistas/img/productos/default/anonymous.png', 10000, 21, 21, 0, '2021-07-22 14:26:27'),
	(11, 2, '206', 'Bovedilla Mapsa', 'Pieza', 'vistas/img/productos/default/anonymous.png', 9900, 23, 23, 100, '2021-08-03 14:40:12'),
	(12, 2, '207', 'Viga Procon', 'Pieza', 'vistas/img/productos/default/anonymous.png', 10000, 85, 85, 0, '2021-07-22 14:26:37'),
	(13, 2, '208', 'Viga Mapsa', 'Pieza', 'vistas/img/productos/default/anonymous.png', 9980, 90, 90, 20, '2021-08-03 14:40:14'),
	(14, 3, '301', 'Cemento Maya', 'Pieza', 'vistas/img/productos/default/anonymous.png', 972, 220, 220, 28, '2021-08-03 14:40:10'),
	(15, 3, '302', 'Cemento Apasco', 'Pieza', 'vistas/img/productos/default/anonymous.png', 988, 210, 210, 33, '2021-07-22 14:26:48'),
	(16, 3, '303', 'Cemento Fortaleza', 'Pieza', 'vistas/img/productos/default/anonymous.png', 966, 200, 200, 34, '2021-07-22 14:26:57'),
	(17, 3, '304', 'Cal', 'Pieza', 'vistas/img/productos/default/anonymous.png', 994, 75, 75, 12, '2021-08-03 14:40:11'),
	(18, 3, '305', 'Masilla', 'Pieza', 'vistas/img/productos/default/anonymous.png', 987, 105, 105, 22, '2021-08-03 14:40:15'),
	(19, 3, '306', 'Pegazulejo Gris', 'Pieza', 'vistas/img/productos/default/anonymous.png', 1000, 80, 80, 0, '2021-07-22 14:28:21'),
	(20, 3, '307', 'Pegazulejo MCP', 'Pieza', 'vistas/img/productos/default/anonymous.png', 1000, 90, 90, 0, '2021-07-22 14:28:25'),
	(21, 3, '308', 'Cemento Blanco (Saco/Bulto)', 'Pieza', 'vistas/img/productos/default/anonymous.png', 988, 220, 220, 12, '2021-07-22 14:28:30'),
	(22, 3, '309', 'Cemento Blanco (Kilo)', 'Kg', 'vistas/img/productos/default/anonymous.png', 1000, 10, 10, 0, '2021-07-22 14:28:41'),
	(23, 3, '310', 'Polvo Fino', 'Pieza', 'vistas/img/productos/default/anonymous.png', 1000, 50, 50, 0, '2021-07-22 14:29:14'),
	(24, 3, '311', 'Yeso', 'Pieza', 'vistas/img/productos/default/anonymous.png', 1000, 0, 0, 0, '2021-07-22 14:29:19'),
	(25, 3, '312', 'Junta Boquilla (Boquillex)', 'Pieza', 'vistas/img/productos/default/anonymous.png', 985, 210, 210, 15, '2021-08-03 14:40:15'),
	(26, 4, '401', 'Lamina 3.05m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:20'),
	(27, 4, '402', 'Lamina 3.66m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:23'),
	(28, 4, '403', 'Lamina 4.27m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:27'),
	(29, 4, '404', 'Lamina 4.88m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:43'),
	(30, 4, '405', 'Lamina 5.50m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:46'),
	(31, 4, '406', 'Lamina 6.10m', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:50'),
	(32, 4, '407', 'Monten Pintado 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:56'),
	(33, 4, '408', 'Monten Pintado 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:36:59'),
	(34, 5, '501', 'Maya P/Techo ', '', 'vistas/img/productos/default/anonymous.png', 1000, 90, 90, 0, '2021-07-12 12:37:14'),
	(35, 5, '502', 'Armex Castillo', '', 'vistas/img/productos/default/anonymous.png', 999, 310, 310, 1, '2021-07-15 14:29:14'),
	(36, 5, '503', 'Armex cadena', '', 'vistas/img/productos/default/anonymous.png', 998, 310, 310, 2, '2021-07-15 14:29:14'),
	(37, 5, '504', 'Varrilla 3/8', '', 'vistas/img/productos/default/anonymous.png', 99, 205, 205, 1, '2021-07-14 13:11:04'),
	(38, 5, '505', 'Varrilla 1/2', '', 'vistas/img/productos/default/anonymous.png', 98, 330, 330, 2, '2021-07-15 14:29:13'),
	(39, 5, '506', 'Alambrón', '', 'vistas/img/productos/default/anonymous.png', 100, 32, 32, 0, '2021-07-12 12:44:18'),
	(40, 5, '507', 'Clavo Estandar 2 1/2', '', 'vistas/img/productos/default/anonymous.png', 99, 50, 50, 1, '2021-07-15 14:29:13'),
	(41, 5, '508', 'Clavo Acero 2 1/2', '', 'vistas/img/productos/default/anonymous.png', 99, 88, 88, 1, '2021-07-15 14:29:13'),
	(42, 5, '509', 'Alambre recocido', '', 'vistas/img/productos/default/anonymous.png', 100, 50, 50, 0, '2021-07-12 12:47:24'),
	(43, 6, '601', 'Tubo  Sanitario PVC 2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:38:12'),
	(44, 6, '602', 'Tubo  Sanitario PVC 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:38:06'),
	(45, 6, '603', 'Tubo  Sanitario PVC 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:38:04'),
	(46, 6, '604', 'Codo 90° Sanitario PVC 2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:38:01'),
	(47, 6, '605', 'Codo 45° Sanitario PVC 2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:57'),
	(48, 6, '606', 'Codo 90° Sanitario PVC 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:54'),
	(49, 6, '607', 'Codo 45° Sanitario PVC 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:51'),
	(50, 6, '608', 'Codo 90° Sanitario PVC 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:49'),
	(51, 6, '609', 'Codo 45° Sanitario PVC 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:46'),
	(52, 6, '610', 'Cople Sanitario PVC 2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:43'),
	(53, 6, '611', 'Cople Sanitario PVC 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:38'),
	(54, 6, '612', 'Cople Sanitario PVC 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:25'),
	(55, 6, '613', 'Tee Sanitario PVC 2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:36'),
	(56, 6, '614', 'Tee Sanitario PVC 3\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:22'),
	(57, 6, '615', 'Tee Sanitario PVC 4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:19'),
	(58, 6, '616', 'Tubo CPVC 1/2\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:17'),
	(59, 6, '617', 'Tubo CPVC 3/4\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:15'),
	(60, 6, '618', 'Tubo CPVC 1\'\'', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:12'),
	(61, 6, '619', 'Reduccion Sanitario PVC 4 a 2 ', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:37:10'),
	(62, 6, '620', 'Reduccion Sanitario PVC 4 a 3', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:20:50'),
	(63, 6, '621', 'Reduccion Sanitario PVC 3 a 2', 'Pieza', 'vistas/img/productos/default/anonymous.png', 0, 0, 0, 0, '2021-07-22 14:20:08');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla posinventor.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla posinventor.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(61, 'Russel Alpuche', 'russelalpuche', '$2a$07$asxx54ahjppf45sd87a5auzkLfcO/LFPumtW5KUcgWw0yLCY5sw8.', 'Administrador', '', 1, '2021-08-09 11:49:44', '2021-08-09 11:49:44');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla posinventor.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla posinventor.ventas: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
	(1, 10001, 1, 61, '[{"id":"16","descripcion":"Cemento Fortaleza","cantidad":"8","stock":"967","precio":"200","total":"1600"}]', 160, 1600, 1760, 'Efectivo', '2021-07-16 13:16:49'),
	(2, 10002, 1, 61, '[{"id":"21","descripcion":"Cemento Blanco (Saco/Bulto)","cantidad":"10","stock":"989","precio":"220","total":"2200"},{"id":"9","descripcion":"Block  Mitza","cantidad":"500","stock":"9500","precio":"12","total":"6000"}]', 0, 8200, 8200, 'Efectivo', '2021-07-16 13:18:13'),
	(3, 10003, 1, 61, '[{"id":"21","descripcion":"Cemento Blanco (Saco/Bulto)","cantidad":"1","stock":"988","precio":"220","total":"220"},{"id":"16","descripcion":"Cemento Fortaleza","cantidad":"1","stock":"966","precio":"200","total":"200"},{"id":"15","descripcion":"Cemento Apasco","cantidad":"1","stock":"988","precio":"210","total":"210"}]', 0, 630, 630, 'Efectivo', '2021-07-16 13:45:57'),
	(4, 10004, 1, 61, '[{"id":"1","descripcion":"Polvo","cantidad":"0.50","stock":"9999.5","precio":"520","total":"260"}]', 0, 260, 260, 'Efectivo', '2021-07-22 12:11:53'),
	(5, 10005, 1, 61, '[{"id":"14","descripcion":"Cemento Maya","cantidad":"18","stock":"972","precio":"220","total":"3960"},{"id":"17","descripcion":"Cal","cantidad":"4","stock":"994","precio":"75","total":"300"},{"id":"1","descripcion":"Polvo","cantidad":"3","stock":"9996.5","precio":"520","total":"1560"},{"id":"2","descripcion":"Grava","cantidad":"3","stock":"9997","precio":"520","total":"1560"},{"id":"11","descripcion":"Bovedilla Mapsa","cantidad":"100","stock":"9900","precio":"23","total":"2300"},{"id":"9","descripcion":"Block  Mitza","cantidad":"150","stock":"9350","precio":"12","total":"1800"},{"id":"3","descripcion":"Escombro","cantidad":"12","stock":"9988","precio":"1300","total":"15600"},{"id":"13","descripcion":"Viga Mapsa","cantidad":"20","stock":"9980","precio":"90","total":"1800"},{"id":"25","descripcion":"Junta Boquilla (Boquillex)","cantidad":"15","stock":"985","precio":"210","total":"3150"},{"id":"18","descripcion":"Masilla","cantidad":"10","stock":"987","precio":"105","total":"1050"}]', 0, 33080, 33080, 'Efectivo', '2021-08-03 14:40:16'),
	(6, 10006, 2, 61, '[{"id":"8","descripcion":"Block Mapsa","cantidad":"20","stock":"9980","precio":"11","total":"220"},{"id":"6","descripcion":"Block Procon Rojo","cantidad":"50","stock":"9950","precio":"18.8","total":"940"},{"id":"4","descripcion":"Sascab","cantidad":"1","stock":"9999","precio":"1400","total":"1400"}]', 0, 2560, 2560, 'Efectivo', '2021-08-05 15:27:56'),
	(7, 10007, 2, 61, '[{"id":"6","descripcion":"Block Procon Rojo","cantidad":"50","stock":"9900","precio":"18.8","total":"940"},{"id":"5","descripcion":"Piedra","cantidad":"1","stock":"9999","precio":"1300","total":"1300"}]', 0, 2240, 2240, 'Efectivo', '2021-08-05 15:38:44');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
