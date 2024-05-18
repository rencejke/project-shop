-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminform`
--

CREATE TABLE `adminform` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminform`
--

INSERT INTO `adminform` (`id`, `name`, `username`, `email`, `password`, `image`) VALUES
(5, 'admintest', 'admintest', 'admintest@gmail.com', '044087623cce4555b78a028a4f0b6cd7', 'hover (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

CREATE TABLE `cart2` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE `order_form` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `person_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(67, 'first hokage', 200, 'Naruto_Shippuden_Hashirama_Senju_statue_10.jpg'),
(68, 'Gojo', 150, 'Gojo.jpg'),
(70, 'Nanami', 50, 'Nanami 2.jpg'),
(71, 'sakuna', 400, 'Sukuna(1).jpg'),
(72, 'fushigiro', 250, 'Fushigiro(1).jpg'),
(73, 'nobara', 300, 'Nobara.jpg'),
(74, 'Aether', 120, 'Aether 2.jpg'),
(75, 'Lumine', 130, 'Lumine 2.jpg'),
(76, 'Venti', 200, 'Venti.jpg'),
(77, 'Hell Taker', 30, 'Justice 2.jpg'),
(78, 'Anya', 50, 'Anya 2.jpg'),
(79, 'yor', 100, 'Yor 2.jpg'),
(80, 'aqua', 30, 'Aqua.jpg'),
(81, 'Kazuma', 35, 'Kazuma 2.jpg'),
(82, 'Megumin', 20, 'Megumin 2.jpg'),
(83, 'Kazuma with darkness', 110, 'Kazuma x Darkness.jpg'),
(84, 'Riko', 40, 'Riko 4.jpg'),
(85, 'Prushka', 30, 'Prushka 4.jpg'),
(86, 'Sanji', 100, 'Sanji 11.jpg'),
(87, 'Luffy Gear 4', 1300, 'Luffy Gear 4.jpg'),
(88, 'Robin', 130, 'Robin.jpg'),
(89, 'Ace', 300, 'Ace.jpg'),
(90, 'Zoro', 210, 'Zoro.jpg'),
(91, 'sumi', 35, 'Sumi 2.jpg'),
(93, 'Kaneki', 350, 'Ken 2.jpeg'),
(94, 'Diablo', 400, '7d61e4f3-4640-4fdd-90ff-2f75764f2a1a.jpg'),
(95, 'Filo', 220, 'Filo.jpg'),
(96, 'Erza', 110, 'Erza.jpg'),
(97, 'Lucy', 105, 'Lucy.jpg'),
(98, 'Itachi', 900, 'Naruto_Shippuden_Itachi_Uchiha_figure_Precious_G.E.M._1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userform`
--

CREATE TABLE `userform` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userform`
--

INSERT INTO `userform` (`id`, `name`, `username`, `email`, `password`, `image`) VALUES
(4, 'user', 'usertest', 'usertest@gmail.com', '806b2af4633e64af88d33fbe4165a06a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminform`
--
ALTER TABLE `adminform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userform`
--
ALTER TABLE `userform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminform`
--
ALTER TABLE `adminform`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `order_form`
--
ALTER TABLE `order_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `userform`
--
ALTER TABLE `userform`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
