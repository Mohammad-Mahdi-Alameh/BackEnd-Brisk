-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2022 at 09:24 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brisk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `users_user_id` int(11) NOT NULL,
  `restaurants_restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`users_user_id`,`restaurants_restaurant_id`),
  KEY `fk_users_has_restaurants_restaurants1_idx` (`restaurants_restaurant_id`),
  KEY `fk_users_has_restaurants_users1_idx` (`users_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(1000) NOT NULL,
  `restaurants_restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_images_restaurants1_idx` (`restaurants_restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_name` varchar(100) NOT NULL,
  `working_hours` varchar(100) NOT NULL,
  `dining_room_capacity` int(11) NOT NULL,
  `drivethrough_availabilty` tinyint(4) NOT NULL,
  `delivery_availabilty` tinyint(4) NOT NULL,
  `reservation_availabilty` tinyint(4) NOT NULL,
  `support_all_diets` tinyint(4) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews_rates`
--

DROP TABLE IF EXISTS `reviews_rates`;
CREATE TABLE IF NOT EXISTS `reviews_rates` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_text` text,
  `rating_value` int(11) DEFAULT NULL,
  `is_approved` tinyint(4) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `restaurants_restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `fk_reviews_users1_idx` (`users_id`),
  KEY `fk_reviews_rates_restaurants1_idx` (`restaurants_restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `county` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_users_has_restaurants_restaurants1` FOREIGN KEY (`restaurants_restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_restaurants_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_restaurants1` FOREIGN KEY (`restaurants_restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews_rates`
--
ALTER TABLE `reviews_rates`
  ADD CONSTRAINT `fk_reviews_rates_restaurants1` FOREIGN KEY (`restaurants_restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
