/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `heroku_b8f17c891b9f87c` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_b8f17c891b9f87c`;

CREATE TABLE IF NOT EXISTS `appointment` (
  `app_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `app_for` varchar(255) NOT NULL,
  `app_address` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `app_date` varchar(255) NOT NULL,
  `app_time` bigint(20) NOT NULL,
  `mechanic_id` bigint(20) NOT NULL,
  `request_by` bigint(20) NOT NULL,
  `prog_status` int(11) NOT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT IGNORE INTO `appointment` (`app_id`, `app_for`, `app_address`, `reg_no`, `engine_no`, `app_date`, `app_time`, `mechanic_id`, `request_by`, `prog_status`) VALUES
	(24, 'Tanvir', 'Dhaka', 'DHAKA GA-15-0569', '52WVC10338', '2022-03-22', 3, 44, 74, 1),
	(44, 'Tanvir', 'Dhaka', 'DHAKA GA-15-0568', '52WVC10338', '2022-03-23', 3, 54, 74, 1),
	(54, 'Tanvir', 'Dhaka', 'DHAKA GA-15-0568', '52WVC10338', '2022-03-24', 4, 34, 74, 1),
	(64, 'Tanvir', 'Dhaka', 'DHAKA GA-15-0568', '52WVC10338', '2022-03-25', 1, 44, 74, 1),
	(74, 'Tanvir', 'Dhaka', 'DHAKA GA-15-0568', '52WVC10338', '2022-03-26', 2, 44, 74, 1),
	(84, 'Arfa', 'Dhaka', 'DHAKA-GA-15-0450', '15XWS15AS1', '2022-03-22', 2, 44, 54, 1),
	(94, 'Arfa', 'Dhaka', 'DHAKA-GA-15-0450', '15XWS15AS1', '2022-03-22', 2, 34, 54, 1),
	(104, 'Tanjid', 'Dhaka', 'DHAKA GA-15-0560', '52WVC1D334', '2022-03-22', 4, 34, 44, 1),
	(114, 'Tanjid', 'Dhaka', 'DHAKA-GA-15-4050', '52WVCDE334', '2022-03-24', 2, 54, 44, 1),
	(124, 'Jim', 'Dhaka', 'CTG LA-11-5054', '15XXS15AS1', '2022-03-31', 1, 44, 64, 1),
	(134, 'Jim', 'Dhaka', 'DHAKA LA-11-1050', '52DSVC1D334', '2022-03-24', 3, 44, 64, 1),
	(144, 'Client', 'Dhaka', 'DHAKA LA-11-1051', '15XXS15AS1', '2022-03-23', 2, 44, 34, 1),
	(154, 'Client', 'Dhaka', 'DHAKA-GA-15-0568', '15XWS15AS1', '2022-03-30', 3, 44, 34, 1),
	(164, 'Client', 'Dhaka', 'DHAKA-GA-15-0568', '15XWS15AS1', '2022-03-28', 2, 44, 34, 1);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `role_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT IGNORE INTO `client` (`id`, `first_name`, `last_name`, `email`, `phone`, `hash_password`, `role_type`) VALUES
	(4, 'Mechanic', 'Mechanic', 'mechanic@gmail.com', '01717171717', '202cb962ac59075b964b07152d234b70', 2),
	(14, 'Sadman', 'Rownak', 'sadmanrownak@gmail.com', '01614001300', '202cb962ac59075b964b07152d234b70', 2),
	(24, 'Razwan', 'Rafi', 'razwanrafi@gmail.com', '01631048170', '202cb962ac59075b964b07152d234b70', 2),
	(34, 'Client', 'Client', 'client@gmail.com', '01616161616', '202cb962ac59075b964b07152d234b70', 1),
	(44, 'Tanjid', 'Ahmed', 'tanjidahmed@gmail.com', '01717171718', '202cb962ac59075b964b07152d234b70', 1),
	(54, 'Arfa', 'Kamal', 'arfa@gmail.com', '01717171719', '202cb962ac59075b964b07152d234b70', 1),
	(64, 'Tanjilur', 'Rahman', 'tanjilur@gmail.com', '01717171720', '202cb962ac59075b964b07152d234b70', 1),
	(74, 'Tanvir', 'Rahman', 'tanviranindo@gmail.com', '01616161617', '202cb962ac59075b964b07152d234b70', 1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `mechanic` (
  `mechanic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mechanic_name` varchar(255) NOT NULL,
  `order_count` bigint(20) NOT NULL,
  PRIMARY KEY (`mechanic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `mechanic` DISABLE KEYS */;
INSERT IGNORE INTO `mechanic` (`mechanic_id`, `mechanic_name`, `order_count`) VALUES
	(34, 'Mechanic Mechanic', 0),
	(44, 'Sadman Rownak', 0),
	(54, 'Razwan Rafi', 0);
/*!40000 ALTER TABLE `mechanic` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
