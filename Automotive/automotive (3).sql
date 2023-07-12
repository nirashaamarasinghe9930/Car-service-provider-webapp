-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2022 at 04:34 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automotive`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `city_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `first_name`, `last_name`, `email`, `contact_no`, `city_id`, `image_path`) VALUES
(3, 'BMW SALES SERVICES', 'When you purchase from Prestige Automobile, you’ll be buying a vehicle from a team that cares ', 'Kavinda', 'Weersinghe', 'Kavinda@gmail.com', '077-5368873', 1, 'images/index3.jpg'),
(1, 'Car for sale', '\nPrestige Automobile(Pvt)Ltd\nNo. 234-238, Pannipitiya Road., Battaramulla, Sri Lanka.', 'chatura', 'silva', 'chatura@gmail.com', '07712345689', 1, 'images/pexels-mike-b-170811.jpg'),
(2, '50% OFF Discount', 'Auto Miraj\n50% OFF Discount On Your Service \nOffer ', 'Sahan', 'Prabhash', 'Kavinda@gmail.com', '011-566-8888', 1, 'images/offer.jpg'),
(4, 'Auto Miraj - We provide total auto solutions', 'Auto Miraj - A pioneer and leader in automotive services in Sri Lanka with over 25 years of service', 'Dilshan', 'Manawadu', 'Dilshan@gmail.com', ' 070 500 4004 ', 3, 'images/automiraj.jpg'),
(5, 'AutoMiraj', 'AutoMiraj service', ' 50% Offers', 'Best Service', 'adadad@gmail.com', '07575757', 2, 'images/automiraj.jpg'),
(6, 'Stafford Motor Company', 'Stafford Motor Company was established in 1977 by Mr. Felix R. de Zoysa, the founder of Stafford group of companies. His entrepreneurial spirit and quest ...', 'Nehan', 'Perera', 'nehan@gmail.com', '0117-522540', 2, 'images/automiraj.jpg'),
(7, 'Experience the Lexus', 'Holidays with Lexus', 'Hashen', 'weerakkodi', 'hashen@gmail.com', '0117-522540', 2, 'images/advert.jpg'),
(8, 'Stafford Motor Company', 'Stafford Motor Company was established in 1977', 'Nehan', 'Perera', 'nehan@gmail.com', '0117-522540', 2, 'images/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `vehicle_number` varchar(15) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `service_center_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `service_center_id` (`service_center_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `service_type`, `city_id`, `vehicle_number`, `vehicle_model`, `name`, `email`, `mobile`, `time`, `date`, `image_path`, `service_center_id`) VALUES
(1, 'MechanicalRepair', 2, 'WP CAA 0000', 'Axio', 'abc', 'abc@gmail.com', '07712345678', '13:30:00', '2022-10-22', 'images/gabriel-gurrola-2UuhMZEChdc-unsplash.jpg', 12),
(2, 'WashOnly', 1, '15-LK-10898', 'BMW', 'Kevin', 'kevin@gmail.com', '071-358486', '14:55:00', '2022-10-26', 'images/Cars53.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `latitude`, `longitude`) VALUES
(1, 'Nugegoda', '6.86982434254328', '79.88821407647505'),
(2, 'Rajagiriya', '6.908503523025183', '79.8925271481276');

-- --------------------------------------------------------

--
-- Table structure for table `coordinates`
--

DROP TABLE IF EXISTS `coordinates`;
CREATE TABLE IF NOT EXISTS `coordinates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinates`
--

INSERT INTO `coordinates` (`id`, `latitude`, `longitude`) VALUES
(1, '6.868147522399395', '79.89141941070558'),
(2, '6.8670956514758466', '79.89309710701538'),
(3, '6.871867664952609', '79.88364794779102'),
(4, '6.871867664952609', '79.88364794779102'),
(5, '6.871867664952609', '79.88364794779102'),
(7, '6.875901337092849', '79.88490700721742'),
(8, '6.909530801994816', '79.89661552841177'),
(9, '6.90714499074372', '79.90048109354899');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `mobile`, `city`, `vehicle_id`, `user_id`) VALUES
(1, 'Alex', 'Doe', NULL, NULL, NULL, 3),
(2, 'Kalani', 'Kalani', '077123456789', 'Nugegoda', NULL, 4),
(4, 'kinki', 'jayasinghe', NULL, NULL, NULL, 6),
(5, 'Kevin', 'Smith', NULL, NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_centers`
--

DROP TABLE IF EXISTS `service_centers`;
CREATE TABLE IF NOT EXISTS `service_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `coordinates_id` int(11) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_centers`
--

INSERT INTO `service_centers` (`id`, `name`, `first_name`, `last_name`, `address`, `coordinates_id`, `contact_no`, `details`, `city_id`, `user_id`, `open_time`, `close_time`) VALUES
(6, 'test center 456', 'dsgsdfg', 'were', 'fxgdfgh', 3, '789656', 'sfds dsgdfsg tg sdv', 1, 16, '11:30:00', '21:00:00'),
(7, 'test center 456', 'dsgsdfg', 'were', 'fxgdfgh', 4, '789656', 'sfds dsgdfsg tg sdv', 1, 17, '11:30:00', '21:00:00'),
(5, 'Test Center 4', 'person ', 'four', '23, sdfj fjdskfhdjsgg dfbhg', 2, '07712345689', 'fdfg gd fghd', 1, 15, '10:30:00', '21:00:00'),
(11, 'Rajagirya Service Center ', 'Ashen', 'Silva', 'No 123, Main Road, Rajagirya', 8, '07712345689', 'We provide car services', 2, 21, '07:30:00', '21:00:00'),
(10, 'Center 23', 'fsdfg', 'were', 'erfdegfdfsg', 8, '07712345689', 'hffasf fahjkdashfj fsjdkfd', 2, 20, '10:42:00', '22:42:00'),
(12, 'Rajagirya Car Wash', 'Rachel', 'were', '12, Main Road, Rajagiriya', 9, '563241356', 'We are the leading company for auto detailing, auto wash', 2, 22, '08:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_date`) VALUES
(4, 'kalani@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', '2022-10-08 04:28:58'),
(3, 'alex@gmail.com', '0312d0d39585741666c19c217ed769f7', 'customer', '2022-10-08 04:06:13'),
(6, 'kinki@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'customer', '2022-10-10 21:01:16'),
(12, 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'service center', '2022-10-14 14:16:51'),
(11, 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'service center', '2022-10-14 13:47:02'),
(15, 'four@yahoo.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-15 04:00:31'),
(14, 'fsdfds@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-15 03:08:53'),
(22, 'rw@yahoo.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-16 16:29:43'),
(21, 'ashen@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-16 16:17:51'),
(20, 'two@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-16 16:11:26'),
(19, 'fds@yahoo.com', '32250170a0dca92d53ec9624f336ca24', 'service center', '2022-10-15 04:04:43'),
(23, 'admin@automotive.com', '32250170a0dca92d53ec9624f336ca24', 'admin', '2022-10-20 15:35:19'),
(24, 'kevin@gmail.com', '4297f44b13955235245b2497399d7a93', 'customer', '2022-10-20 17:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(20) NOT NULL,
  `model` varchar(80) NOT NULL,
  `year` int(4) NOT NULL,
  `mpg` int(2) DEFAULT NULL,
  `cylinders` int(2) DEFAULT NULL,
  `horsepower` int(5) DEFAULT NULL,
  `weight` int(5) DEFAULT NULL,
  `acceleration` float(3,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
