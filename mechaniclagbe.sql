-- CREATE DATABASE IF NOT EXISTS `mechaniclagbe`;
-- USE `mechaniclagbe`;
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
) ENGINE = InnoDB AUTO_INCREMENT = 24 DEFAULT CHARSET = utf8;

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
) ENGINE = InnoDB AUTO_INCREMENT = 54 DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `mechanic` (
  `mechanic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mechanic_name` varchar(255) NOT NULL,
  `order_count` bigint(20) NOT NULL,
  PRIMARY KEY (`mechanic_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 34 DEFAULT CHARSET = utf8;