-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: March 2024 at 10:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'ukmdinedashweb'
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin1', 'admin123', 'admin@ukmdinedash.com', '', '2024-04-10 07:18:13');

-- --------------------------------------------------------


--
-- Table structure for table `items`
--

CREATE TABLE `ukmdinedash_items` (
  `itm_id` int NOT NULL,
  `stall_id` int NOT NULL,
  `college_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `ukmdinedash_items` (`itm_id`, `stall_id`, `college_id`, `title`, `price`, `img`) VALUES
(110, 10, 1,'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(111, 11, 2, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(112, 12, 3, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(113, 13, 4, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(114, 14, 5,'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(115, 15, 6, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(116, 16, 7, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(117, 17, 8, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(118, 18, 9, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),
(119, 19, 10, 'Nasi Ayam Biasa', '4.50', 'nasi ayam.jpg'),

(210, 10, 1, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(211, 11, 2, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(212, 12, 3, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(213, 13, 4, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(214, 14, 5, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(215, 15, 6, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(216, 16, 7, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(217, 17, 8, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(218, 18, 9, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),
(219, 19, 10, 'Nasi Ayam Peha', '5.50', 'nasi ayam.jpg'),

(310, 10, 1, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(311, 11, 2, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(312, 12, 3, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(313, 13, 4, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(314, 14, 5, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(315, 15, 6, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(316, 16, 7, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(317, 17, 8, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(318, 18, 9, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),
(319, 19, 10, 'Nasi Ayam Hainan', '4.50', 'nasi ayam.jpg'),

(410, 10, 1, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(411, 11, 2, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(412, 12, 3, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(413, 13, 4, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(414, 14, 5, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(415, 15, 6, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(416, 16, 7, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(417, 17, 8, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(418, 18, 9, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),
(419, 19, 10, 'Nasi Ayam Madu', '5.50', 'nasi ayam.jpg'),

(510, 10, 1, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(511, 11, 2, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(512, 12, 3, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(513, 13, 4, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(514, 14, 5, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(515, 15, 6, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(516, 16, 7, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(517, 17, 8, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(518, 18, 9, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),
(519, 19, 10, 'Nasi Ayam Special', '6.50', 'nasi ayam.jpg'),

(620, 20, 1, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(621, 21, 2, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(622, 22, 3, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(623, 23, 4, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(624, 24, 5, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(625, 25, 6, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(626, 26, 7, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(627, 27, 8, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(628, 28, 9, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),
(629, 29, 10, 'Nasi Ayam Penyet', '5.90', 'nasi ayam penyet.jpg'),

(720, 20, 1, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(721, 21, 2, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(722, 22, 3, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(723, 23, 4, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(724, 24, 5, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(725, 25, 6, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(726, 26, 7, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(727, 27, 8, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(728, 28, 9, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),
(729, 29, 10, 'Nasi Ikan Keli Penyet', '6.90', 'nasi ayam penyet.jpg'),

(820, 20, 1, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(821, 21, 2, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(822, 22, 3, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(823, 23, 4, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(824, 24, 5, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(825, 25, 6, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(826, 26, 7, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(827, 27, 8, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(828, 28, 9, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),
(829, 29, 10, 'Nasi Talapia Penyet', '7.90', 'nasi ayam penyet.jpg'),

(920, 20, 1, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(921, 21, 2, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(922, 22, 3, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(923, 23, 4, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(924, 24, 5, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(925, 25, 6, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(926, 26, 7, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(927, 27, 8, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(928, 28, 9, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),
(929, 29, 10, 'Nasi Kukus Biasa', '5.90', 'nasi ayam penyet.jpg'),

(1020, 20, 1, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1021, 21, 2, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1022, 22, 3, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1023, 23, 4, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1024, 24, 5, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1025, 25, 6, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1026, 26, 7, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1027, 27, 8, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1028, 28, 9, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),
(1029, 29, 10, 'Nasi Kukus Ayam Dara', '6.90', 'nasi ayam penyet.jpg'),

(1130, 30, 1, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1131, 31, 2, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1132, 32, 3, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1133, 33, 4, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1134, 34, 5, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1135, 35, 6, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1136, 36, 7, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1137, 37, 8, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1138, 38, 9, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),
(1139, 39, 10, 'Tomyam Ayam', '5.50', 'tomyam.jpg'),

(1230, 30, 1, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1231, 31, 2, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1232, 32, 3, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1233, 33, 4, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1234, 34, 5, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1235, 35, 6, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1236, 36, 7, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1237, 37, 8, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1238, 38, 9, 'Tomyam Campur', '7.00', 'tomyam.jpg'),
(1239, 39, 10, 'Tomyam Campur', '7.00', 'tomyam.jpg'),

(1330, 30, 1, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1331, 31, 2, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1332, 32, 3, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1333, 33, 4, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1334, 34, 5, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1335, 35, 6, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1336, 36, 7, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1337, 37, 8, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1338, 38, 9, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),
(1339, 39, 10, 'Nasi Putih Ayam Paprik', '7.00', 'tomyam.jpg'),

(1430, 30, 1, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1431, 31, 2, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1432, 32, 3, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1433, 33, 4, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1434, 34, 5, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1435, 35, 6, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1436, 36, 7, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1437, 37, 8, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1438, 38, 9, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),
(1439, 39, 10, 'Nasi Goreng Pattaya', '6.00', 'tomyam.jpg'),

(1530, 30, 1, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1531, 31, 2, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1532, 32, 3, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1533, 33, 4, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1534, 34, 5, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1535, 35, 6, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1536, 36, 7, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1537, 37, 8, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1538, 38, 9, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),
(1539, 39, 10, 'Nasi Goreng USA', '7.00', 'tomyam.jpg'),

(1630, 30, 1, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1631, 31, 2, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1632, 32, 3, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1633, 33, 4, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1634, 34, 5, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1635, 35, 6, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1636, 36, 7, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1637, 37, 8, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1638, 38, 9, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),
(1639, 39, 10, 'Mee Goreng Ayam', '6.50', 'tomyam.jpg'),

(1730, 30, 1, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1731, 31, 2, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1732, 32, 3, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1733, 33, 4, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1734, 34, 5, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1735, 35, 6, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1736, 36, 7, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1737, 37, 8, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1738, 38, 9, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),
(1739, 39, 10, 'Mihun Goreng Biasa', '6.50', 'tomyam.jpg'),

(1830, 30, 1, 'Kueyteow Goreng  Biasa', '6.00', 'tomyam.jpg'),
(1831, 31, 2, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1832, 32, 3, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1833, 33, 4, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1834, 34, 5, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1835, 35, 6, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1836, 36, 7, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1837, 37, 8, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1838, 38, 9, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),
(1839, 39, 10, 'Kueyteow Goreng Biasa', '6.00', 'tomyam.jpg'),

(1940, 40, 1, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1941, 41, 2, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1942, 42, 3, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1943, 43, 4, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1944, 44, 5, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1945, 45, 6, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1946, 46, 7, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1947, 47, 8, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1948, 48, 9, 'Aglio Olio Pasta', '6.50', 'western.jpg'),
(1949, 49, 10, 'Aglio Olio Pasta', '6.50', 'western.jpg'),

(2040, 40, 1, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2041, 41, 2, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2042, 42, 3, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2043, 43, 4, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2044, 44, 5, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2045, 45, 6, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2046, 46, 7, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2047, 47, 8, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2048, 48, 9, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),
(2049, 49, 10, 'Bolognese Meatball Pasta', '6.50', 'western.jpg'),

(2140, 40, 1, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2141, 41, 2, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2142, 42, 3, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2143, 43, 4, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2144, 44, 5, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2145, 45, 6, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2146, 46, 7, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2147, 47, 8, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2148, 48, 9, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),
(2149, 49, 10, 'Spicy Carbonara Pasta', '6.50', 'western.jpg'),

(2240, 40, 1, 'Beef Lasagna', '6.50', 'western.jpg'),
(2241, 41, 2, 'Beef Lasagna', '6.50', 'western.jpg'),
(2242, 42, 3, 'Beef Lasagna', '6.50', 'western.jpg'),
(2243, 43, 4, 'Beef Lasagna', '6.50', 'western.jpg'),
(2244, 44, 5, 'Beef Lasagna', '6.50', 'western.jpg'),
(2245, 45, 6, 'Beef Lasagna', '6.50', 'western.jpg'),
(2246, 46, 7, 'Beef Lasagna', '6.50', 'western.jpg'),
(2247, 47, 8, 'Beef Lasagna', '6.50', 'western.jpg'),
(2248, 48, 9, 'Beef Lasagna', '6.50', 'western.jpg'),
(2249, 49, 10, 'Beef Lasagna', '6.50', 'western.jpg'),

(2340, 40, 1, 'Chicken Chop', '7.00', 'western.jpg'),
(2341, 41, 2, 'Chicken Chop', '7.00', 'western.jpg'),
(2342, 42, 3, 'Chicken Chop', '7.00', 'western.jpg'),
(2343, 43, 4, 'Chicken Chop', '7.00', 'western.jpg'),
(2344, 44, 5, 'Chicken Chop', '7.00', 'western.jpg'),
(2345, 45, 6, 'Chicken Chop', '7.00', 'western.jpg'),
(2346, 46, 7, 'Chicken Chop', '7.00', 'western.jpg'),
(2347, 47, 8, 'Chicken Chop', '7.00', 'western.jpg'),
(2348, 48, 9, 'Chicken Chop', '7.00', 'western.jpg'),
(2349, 49, 10, 'Chicken Chop', '7.00', 'western.jpg'),

(2440, 40, 1, 'Beef Steak', '8.00', 'western.jpg'),
(2441, 41, 2, 'Beef Steak', '8.00', 'western.jpg'),
(2442, 42, 3, 'Beef Steak', '8.00', 'western.jpg'),
(2443, 43, 4, 'Beef Steak', '8.00', 'western.jpg'),
(2444, 44, 5, 'Beef Steak', '8.00', 'western.jpg'),
(2445, 45, 6, 'Beef Steak', '8.00', 'western.jpg'),
(2446, 46, 7, 'Beef Steak', '8.00', 'western.jpg'),
(2447, 47, 8, 'Beef Steak', '8.00', 'western.jpg'),
(2448, 48, 9, 'Beef Steak', '8.00', 'western.jpg'),
(2449, 49, 10, 'Beef Steak', '8.00', 'western.jpg'),

(2540, 40, 1, 'Lamb Chop', '8.50', 'western.jpg'),
(2541, 41, 2, 'Lamb Chop', '8.50', 'western.jpg'),
(2542, 42, 3, 'Lamb Chop', '8.50', 'western.jpg'),
(2543, 43, 4, 'Lamb Chop', '8.50', 'western.jpg'),
(2544, 44, 5, 'Lamb Chop', '8.50', 'western.jpg'),
(2545, 45, 6, 'Lamb Chop', '8.50', 'western.jpg'),
(2546, 46, 7, 'Lamb Chop', '8.50', 'western.jpg'),
(2547, 47, 8, 'Lamb Chop', '8.50', 'western.jpg'),
(2548, 48, 9, 'Lamb Chop', '8.50', 'western.jpg'),
(2549, 49, 10, 'Lamb Chop', '8.50', 'western.jpg'),

(2640, 40, 1, 'Fish n Chips', '7.50', 'western.jpg'),
(2641, 41, 2, 'Fish n Chips', '7.50', 'western.jpg'),
(2642, 42, 3, 'Fish n Chips', '7.50', 'western.jpg'),
(2643, 43, 4, 'Fish n Chips', '7.50', 'western.jpg'),
(2644, 44, 5, 'Fish n Chips', '7.50', 'western.jpg'),
(2645, 45, 6, 'Fish n Chips', '7.50', 'western.jpg'),
(2646, 46, 7, 'Fish n Chips', '7.50', 'western.jpg'),
(2647, 47, 8, 'Fish n Chips', '7.50', 'western.jpg'),
(2648, 48, 9, 'Fish n Chips', '7.50', 'western.jpg'),
(2649, 49, 10, 'Fish n Chips', '7.50', 'western.jpg'),

(2750, 50, 1, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2751, 51, 2, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2752, 52, 3, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2753, 53, 4, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2754, 54, 5, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2755, 55, 6, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2756, 56, 7, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2757, 57, 8, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2758, 58, 9, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),
(2759, 59, 10, 'Sirap Limau Ais', '1.50', 'kopigantung.jpg'),

(2850, 50, 1, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2851, 51, 2, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2852, 52, 3, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2853, 53, 4, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2854, 54, 5, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2855, 55, 6, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2856, 56, 7, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2857, 57, 8, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2858, 58, 9, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),
(2859, 59, 10, 'Kopi O Ais', '1.50', 'kopigantung.jpg'),

(2950, 50, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2951, 51, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2952, 52, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2953, 53, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2954, 54, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2955, 55, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2956, 56, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2957, 57, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2958, 58, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),
(2959, 59, 1, 'Teh O Ais', '1.50', 'kopigantung.jpg'),

(3050, 50, 1, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3051, 51, 2, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3052, 52, 3, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3053, 53, 4, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3054, 54, 5, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3055, 55, 6, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3056, 56, 7, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3057, 57, 8, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3058, 58, 9, 'Milo Ais', '2.00', 'kopigantung.jpg'),
(3059, 59, 10, 'Milo Ais', '2.00', 'kopigantung.jpg'),

(3150, 50, 1, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3151, 51, 2, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3152, 52, 3, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3153, 53, 4, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3154, 54, 5, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3155, 55, 6, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3156, 56, 7, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3157, 57, 8, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3158, 58, 9, 'Bandung Ais', '2.00', 'kopigantung.jpg'),
(3159, 59, 10, 'Bandung Ais', '2.00', 'kopigantung.jpg'),

(3250, 50, 1, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3251, 51, 2, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3252, 52, 3, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3253, 53, 4, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3254, 54, 5, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3255, 55, 6, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3256, 56, 7, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3257, 57, 8, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3258, 58, 9, 'Greentea Ais', '2.50', 'kopigantung.jpg'),
(3259, 59, 10, 'Greentea Ais', '2.50', 'kopigantung.jpg'),

(3350, 50, 1, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3351, 51, 2, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3352, 52, 3, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3353, 53, 4, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3354, 54, 5, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3355, 55, 6, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3356, 56, 7, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3357, 57, 8, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3358, 58, 9, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),
(3359, 59, 10, 'Nescafe Ais', '2.50', 'kopigantung.jpg'),

(3450, 50, 1, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3451, 51, 2, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3452, 52, 3, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3453, 53, 4, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3454, 54, 5, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3455, 55, 6, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3456, 56, 7, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3457, 57, 8, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3458, 58, 9, 'Fresh Orange', '3.00', 'kopigantung.jpg'),
(3459, 59, 10, 'Fresh Orange', '3.00', 'kopigantung.jpg'),

(3550, 50, 1, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3551, 51, 2, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3552, 52, 3, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3553, 53, 4, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3554, 54, 5, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3555, 55, 6, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3556, 56, 7, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3557, 57, 8, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3558, 58, 9, 'Tembikai', '3.00', 'kopigantung.jpg'),
(3559, 59, 10, 'Tembikai', '3.00', 'kopigantung.jpg'),

(3650, 50, 1, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3651, 51, 2, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3652, 52, 3, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3653, 53, 4, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3654, 54, 5, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3655, 55, 6, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3656, 56, 7, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3657, 57, 8, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3658, 58, 9, 'Mangga Susu', '3.00', 'kopigantung.jpg'),
(3659, 59, 10, 'Mangga Susu', '3.00', 'kopigantung.jpg'),

(3750, 50, 1, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3751, 51, 2, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3752, 52, 3, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3753, 53, 4, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3754, 54, 5, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3755, 55, 6, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3756, 56, 7, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3757, 57, 8, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3758, 58, 9, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),
(3759, 59, 10, 'Ais Batu Campur (ABC)', '3.50', 'kopigantung.jpg'),

(3850, 50, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3851, 51, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3852, 52, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3853, 53, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3854, 54, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3855, 55, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3856, 56, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3857, 57, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3858, 58, 1, 'Cendol', '3.50', 'kopigantung.jpg'),
(3859, 59, 1, 'Cendol', '3.50', 'kopigantung.jpg'),

(3960, 60, 1, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3961, 61, 2, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3962, 62, 3, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3963, 63, 4, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3964, 64, 5, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3965, 65, 6, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3966, 66, 7, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3967, 67, 8, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3968, 68, 9, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),
(3969, 69, 10, 'Creamy Strawberry', '2.50', 'chillchill.jpg'),

(4060, 60, 1, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4061, 61, 2, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4062, 62, 3, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4063, 63, 4, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4064, 64, 5, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4065, 65, 6, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4066, 66, 7, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4067, 67, 8, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4068, 68, 9, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),
(4069, 69, 10, 'Teh Ais Tarik', '2.50', 'chillchill.jpg'),

(4160, 60, 1, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4161, 61, 2, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4162, 62, 3, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4163, 63, 4, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4164, 64, 5, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4165, 65, 6, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4166, 66, 7, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4167, 67, 8, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4168, 68, 9, 'Milky Honeydew', '2.50', 'chillchill.jpg'),
(4169, 69, 10, 'Milky Honeydew', '2.50', 'chillchill.jpg'),

(4260, 60, 1, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4261, 61, 2, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4262, 62, 3, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4263, 63, 4, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4264, 64, 5, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4265, 65, 6, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4266, 66, 7, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4267, 67, 8, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4268, 68, 9, 'Double Chocolate', '2.50', 'chillchill.jpg'),
(4269, 69, 10, 'Double Chocolate', '2.50', 'chillchill.jpg'),

(4360, 60, 1, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4361, 61, 2, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4362, 62, 3, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4363, 63, 4, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4364, 64, 5, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4365, 65, 6, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4366, 66, 7, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4367, 67, 8, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4368, 68, 9, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),
(4369, 69, 10, 'Kopi Ais Kaww', '2.50', 'chillchill.jpg'),

(4460, 60, 1, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4461, 61, 2, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4462, 62, 3, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4463, 63, 4, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4464, 64, 5, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4465, 65, 6, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4466, 66, 7, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4467, 67, 8, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4468, 68, 9, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg'),
(4469, 69, 10, 'Dreamy Vanilla Blue', '2.50', 'chillchill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table 'remark'
--

CREATE TABLE `remark` (
  `id` int NOT NULL,
  `f_id` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stalls`
--

CREATE TABLE `ukmdinedash_stalls` (
  `stall_id` int NOT NULL,
  `college_id` int NOT NULL,
  `stall_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukmdinedash_stalls`
--

INSERT INTO `ukmdinedash_stalls` (`stall_id`, `college_id`, `stall_name`, `seller_name`, `seller_password`, `email`, `phone`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(10, 1, 'Lot 1A: Nasi Ayam', 'Ali', 'lot1a', 'lot1a@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(11, 2, 'Lot 1B: Nasi Ayam', 'Abu', 'lot1b', 'lot1b@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(12, 3, 'Lot 1C: Nasi Ayam', 'Afiq', 'lot1c', 'lot1c@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(13, 4, 'Lot 1D: Nasi Ayam', 'Siti', 'lot1d', 'lot1d@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(14, 5, 'Lot 1E: Nasi Ayam', 'Kumar', 'lot1e', 'lot1e@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(15, 6, 'Lot 1F: Nasi Ayam', 'Alia', 'lot1f', 'lot1f@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(16, 7, 'Lot 1G: Nasi Ayam', 'Amin', 'lot1g', 'lot1g@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(17, 8, 'Lot 1H: Nasi Ayam', 'Aina', 'lot1h', 'lot1h@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(18, 9, 'Lot 1I: Nasi Ayam', 'Adam', 'lot1i', 'lot1i@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'nasi ayam.jpg', '2024-05-27 08:10:35'),
(19, 10, 'Lot 1J: Nasi Ayam', 'Amira', 'lot1j', 'lot1j@ukmdinedash.com', '0322893841', '10AM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'nasi ayam.jpg', '2024-05-27 08:10:35'),

(20, 1, 'Lot 2A: Nasi Ayam Penyet', 'Ali', 'lot2a', 'lot2a@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(21, 2, 'Lot 2B: Nasi Ayam Penyet', 'Abu', 'lot2b', 'lot2b@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(22, 3, 'Lot 2C: Nasi Ayam Penyet', 'Afiq', 'lot2c', 'lot2c@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(23, 4, 'Lot 2D: Nasi Ayam Penyet', 'Siti', 'lot2d', 'lot2d@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(24, 5, 'Lot 2E: Nasi Ayam Penyet', 'Kumar', 'lot2e', 'lot2e@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(25, 6, 'Lot 2F: Nasi Ayam Penyet', 'Alia', 'lot2f', 'lot2f@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(26, 7, 'Lot 2G: Nasi Ayam Penyet', 'Amin', 'lot2g', 'lot2g@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(27, 8, 'Lot 2H: Nasi Ayam Penyet', 'Aina', 'lot2h', 'lot2h@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(28, 9, 'Lot 2I: Nasi Ayam Penyet', 'Adam', 'lot2i', 'lot2i@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),
(29, 10, 'Lot 2J: Nasi Ayam Penyet', 'Amira', 'lot2j', 'lot2j@ukmdinedash.com', '0322893842', '11AM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'nasi ayam penyet.jpg', '2024-05-27 08:06:41'),

(30, 1, 'Lot 3A: Masakan Thai', 'Ali', 'lot3a', 'lot3a@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'tomyam.jpg', '2024-05-27 08:04:30'),
(31, 2, 'Lot 3B: Masakan Thai', 'Abu', 'lot3b', 'lot3b@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'tomyam.jpg', '2024-05-27 08:04:30'),
(32, 3, 'Lot 3C: Masakan Thai', 'Afiq', 'lot3c', 'lot3c@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'tomyam.jpg', '2024-05-27 08:04:30'),
(33, 4, 'Lot 3D: Masakan Thai', 'Siti', 'lot3d', 'lot3d@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'tomyam.jpg', '2024-05-27 08:04:30'),
(34, 5, 'Lot 3E: Masakan Thai', 'Kumar', 'lot3e', 'lot3e@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'tomyam.jpg', '2024-05-27 08:04:30'),
(35, 6, 'Lot 3F: Masakan Thai', 'Alia', 'lot3f', 'lot3f@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'tomyam.jpg', '2024-05-27 08:04:30'),
(36, 7, 'Lot 3G: Masakan Thai', 'Amin', 'lot3g', 'lot3g@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'tomyam.jpg', '2024-05-27 08:04:30'),
(37, 8, 'Lot 3H: Masakan Thai', 'Aina', 'lot3h', 'lot3h@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'tomyam.jpg', '2024-05-27 08:04:30'),
(38, 9, 'Lot 3I: Masakan Thai', 'Adam', 'lot3i', 'lot3i@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'tomyam.jpg', '2024-05-27 08:04:30'),
(39, 10, 'Lot 3J: Masakan Thai', 'Amira', 'lot3j', 'lot3j@ukmdinedash.com', '0322893843', '10AM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'tomyam.jpg', '2024-05-27 08:04:30'),

(40, 1, 'Lot 4A: Western Grill', 'Ali', 'lot4a', 'lot4a@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'western.jpg', '2024-05-27 11:01:03'),
(41, 2, 'Lot 4B: Western Grill', 'Abu', 'lot4b', 'lot4b@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'western.jpg', '2024-05-27 11:01:03'),
(42, 3, 'Lot 4C: Western Grill', 'Afiq', 'lot4c', 'lot4c@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'western.jpg', '2024-05-27 11:01:03'),
(43, 4, 'Lot 4D: Western Grill', 'Siti', 'lot4d', 'lot4d@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'western.jpg', '2024-05-27 11:01:03'),
(44, 5, 'Lot 4E: Western Grill', 'Kumar', 'lot4e', 'lot4e@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'western.jpg', '2024-05-27 11:01:03'),
(45, 6, 'Lot 4F: Western Grill', 'Alia', 'lot4f', 'lot4f@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'western.jpg', '2024-05-27 11:01:03'),
(46, 7, 'Lot 4G: Western Grill', 'Amin', 'lot4g', 'lot4g@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'western.jpg', '2024-05-27 11:01:03'),
(47, 8, 'Lot 4H: Western Grill', 'Aina', 'lot4h', 'lot4h@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'western.jpg', '2024-05-27 11:01:03'),
(48, 9, 'Lot 4I: Western Grill', 'Adam', 'lot4i', 'lot4i@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'western.jpg', '2024-05-27 11:01:03'),
(49, 10, 'Lot 4J: Western Grill', 'Amira', 'lot4j', 'lot4j@ukmdinedash.com', '0322893844', '4PM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'western.jpg', '2024-05-27 11:01:03'),

(50, 1, 'Lot 5A: Air Gantung', 'Ali', 'lot5a', 'lot5a@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(51, 2, 'Lot 5B: Air Gantung', 'Abu', 'lot5b', 'lot5b@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(52, 3, 'Lot 5C: Air Gantung', 'Afiq', 'lot5c', 'lot5c@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(53, 4, 'Lot 5D: Air Gantung', 'Siti', 'lot5d', 'lot5d@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(54, 5, 'Lot 5E: Air Gantung', 'Kumar', 'lot5e', 'lot5e@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(55, 6, 'Lot 5F: Air Gantung', 'Alia', 'lot5f', 'lot5f@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(56, 7, 'Lot 5G: Air Gantung', 'Amin', 'lot5g', 'lot5g@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(57, 8, 'Lot 5H: Air Gantung', 'Aina', 'lot5h', 'lot5h@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(58, 9, 'Lot 5I: Air Gantung', 'Adam', 'lot5i', 'lot5i@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'kopigantung.jpg', '2024-05-27 11:01:03'),
(59, 10, 'Lot 5J: Air Gantung', 'Amira', 'lot5j', 'lot5j@ukmdinedash.com', '0322893845', '10AM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'kopigantung.jpg', '2024-05-27 11:01:03'),

(60, 1, 'Lot 6A: Big Cup', 'Ali', 'lot6a', 'lot6a@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Aminuddin Baki', 'chillchill.jpg', '2024-05-27 11:01:03'),
(61, 2, 'Lot 6B: Big Cup', 'Abu', 'lot6b', 'lot6b@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Burhanuddin Helmi', 'chillchill.jpg', '2024-05-27 11:01:03'),
(62, 3, 'Lot 6C: Big Cup', 'Afiq', 'lot6c', 'lot6c@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Dato Onn', 'chillchill.jpg', '2024-05-27 11:01:03'),
(63, 4, 'Lot 6D: Big Cup', 'Siti', 'lot6d', 'lot6d@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibrahim Yaakub', 'chillchill.jpg', '2024-05-27 11:01:03'),
(64, 5, 'Lot 6E: Big Cup', 'Kumar', 'lot6e', 'lot6e@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Ibu Zain', 'chillchill.jpg', '2024-05-27 11:01:03'),
(65, 6, 'Lot 6F: Big Cup', 'Alia', 'lot6f', 'lot6f@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Keris Mas', 'chillchill.jpg', '2024-05-27 11:01:03'),
(66, 7, 'Lot 6G: Big Cup', 'Amin', 'lot6g', 'lot6g@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Pendeta Zaaba', 'chillchill.jpg', '2024-05-27 11:01:03'),
(67, 8, 'Lot 6H: Big Cup', 'Aina', 'lot6h', 'lot6h@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Rahim Kajai', 'chillchill.jpg', '2024-05-27 11:01:03'),
(68, 9, 'Lot 6I: Big Cup', 'Adam', 'lot6i', 'lot6i@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Tun Hussein Onn', 'chillchill.jpg', '2024-05-27 11:01:03'),
(69, 10, 'Lot 6J: Big Cup', 'Amira', 'lot6j', 'lot6j@ukmdinedash.com', '0322893846', '10AM', '10PM', 'Mon-Sat', 'Kolej Ungku Omar', 'chillchill.jpg', '2024-05-27 11:01:03');


-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `ukmdinedash_colleges` (
  `college_id` int NOT NULL,
  `college_name` varchar(222) NOT NULL,
  `college_image` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `ukmdinedash_colleges` (`college_id`, `college_name`, `college_image`, `date`) VALUES
(1, 'Kolej Aminuddin Baki', 'kab.png', '2024-05-27 08:07:35'),
(2, 'Kolej Burhanuddin Helmi', 'kbh.png', '2024-04-07 08:45:23'),
(3, 'Kolej Dato Onn', 'kdo.png', '2024-04-07 08:45:25'),
(4, 'Kolej Ibrahim Yaakub', 'kiy.png', '2024-04-07 08:45:28'),
(5, 'Kolej Ibu Zain', 'kiz.png', '2024-04-07 08:45:28'),
(6, 'Kolej Keris Mas', 'kkm.png', '2024-04-07 08:45:28'),
(7, 'Kolej Pendeta Zaaba', 'kpz.png', '2024-04-07 08:45:28'),
(8, 'Kolej Rahim Kajai', 'krk.png', '2024-04-07 08:45:28'),
(9, 'Kolej Tun Hussein Onn', 'ktho.png', '2024-04-07 08:45:28'),
(10, 'Kolej Ungku Omar', 'kuo.png', '2024-04-07 08:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `ukmdinedash_users` (
  `u_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `matric_num` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `ukmdinedash_users_orders` (
  `o_id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stall_id` int NOT NULL,
  `college_id` int NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itm_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`stall_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `items`
  MODIFY `itm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `stalls`
  MODIFY `stall_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
