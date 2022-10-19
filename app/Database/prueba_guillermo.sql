-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for prueba_guillermo
DROP DATABASE IF EXISTS `prueba_guillermo`;
CREATE DATABASE IF NOT EXISTS `prueba_guillermo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prueba_guillermo`;

-- Dumping structure for table prueba_guillermo.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(150) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table prueba_guillermo.orders: ~3 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `nombre_cliente`, `fecha_pedido`) VALUES
	(1, 'Guillermo', '2022-10-19 01:34:55'),
	(2, 'Antonio', '2022-10-19 01:35:36'),
	(3, 'Jose', '2022-10-19 00:37:32'),
	(4, 'Robert', '2022-10-19 10:53:08');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table prueba_guillermo.order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_detail_order` (`id_pedido`),
  KEY `fk_order_detail_product` (`id_producto`),
  CONSTRAINT `fk_order_detail_order` FOREIGN KEY (`id_pedido`) REFERENCES `orders` (`id`),
  CONSTRAINT `fk_order_detail_product` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table prueba_guillermo.order_details: ~6 rows (approximately)
DELETE FROM `order_details`;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`, `id_pedido`, `id_producto`) VALUES
	(3, 1, 3),
	(4, 2, 2),
	(5, 2, 4),
	(6, 3, 3),
	(7, 4, 3),
	(8, 4, 7);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table prueba_guillermo.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(150) NOT NULL DEFAULT '',
  `descripcion_producto` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(250) DEFAULT '',
  `precio` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table prueba_guillermo.products: ~6 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `nombre_producto`, `descripcion_producto`, `imagen`, `precio`) VALUES
	(1, 'HP Pavilon', 'Laptop HP core i5 10th G', 'https://m.media-amazon.com/images/I/61Fy+f8sWIL.jpg', 699.99),
	(2, 'iPhone X', 'iPhone X pro Max 128GB ROM 8RAM', 'https://www.apple.com/newsroom/images/product/iphone/standard/iphonex_front_back_glass_big.jpg.large.jpg', 1500.00),
	(3, 'Lenovo', 'Lenovo Legion Gaming C i7 RTX 3060 16RAM', 'http://www.aeon.com.sv/web/image/product.template/7566/image_1024?unique=3f524c5', 1300.00),
	(4, 'MacBook Pro', 'MacBook Pro M1 8GG RAM 1T ROOM', 'https://istore.gt/wp-content/uploads/2022/08/EC00029i.jpg', 2000.00),
	(5, 'Asus', 'Asus', 'https://m.media-amazon.com/images/I/71ehzrGUO7L.jpg', 900.00),
	(7, 'Asus Rog', 'Laptop Gaming', 'https://www.tradeinn.com/f/13887/138872337_2/asus-rog-g5-g513ic-hn004-15.6-r7-4800h-16gb-512gb-ssd-nvidia-geforce-rtx-3050-4gb-gaming-laptop.jpg', 899.99);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
