-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 02, 2021 at 09:34 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuji`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `size`, `quantity`, `customer_id`, `total`) VALUES
(26, 33, 'M', 1, 5, 20000),
(27, 20, 'L', 1, 5, 2000),
(28, 4, 'L', 1, 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'HOODIE'),
(2, 'PANTS'),
(3, 'COAT'),
(4, 'T-SHIRT'),
(5, 'JACKET'),
(6, 'SWEAT'),
(7, 'SHIRT');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_quantity` int(5) NOT NULL,
  `total_price` int(11) NOT NULL,
  `checkout_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_quantity`, `total_price`, `checkout_date`) VALUES
(4, 4, 2, 23000, '2021-07-02'),
(5, 1, 6, 206000, '2021-07-02 17:17:30'),
(6, 1, 2, 34100, '2021-07-02 17:22:09'),
(7, 4, 1, 2000, '2021-07-02 17:25:53'),
(8, 4, 1, 2100, '2021-07-02 17:40:39'),
(9, 4, 1, 32000, '2021-07-02 17:49:40'),
(10, 4, 4, 304000, '2021-07-02 18:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_photo` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_photo`, `cat_id`) VALUES
(4, 'Cotton T-shirt', 2000, 'cool music.jpeg', 4),
(5, 'ZARA leather Jacket', 60000, 'leather Jacket.jpg', 5),
(6, 'COMMCA Jacket', 40000, 'Jacket.webp', 5),
(7, 'ZARA Hoodie', 32000, 'hoodie(1).jpg', 1),
(8, 'UNIQLO hoodie', 2100, 'hoodie(2).jpg', 1),
(9, 'adidas hoodie', 4000, 'hoodie(3).jpg', 1),
(10, 'AMACA hoodie', 6000, 'hoodie(1).jpg', 1),
(11, 'Champion hoodie', 4500, 'hoodie(3).jpg', 1),
(12, 'Columbia', 7000, 'hoodie(2).jpg', 1),
(13, 'BEAMS T-shirt ', 3000, 'T-shirt-1.jpg', 4),
(14, 'SNIDEL T-shirt', 12000, 'T-shirt-2.jpg', 4),
(15, 'nano universe T-shirt', 3200, 'T-shirt-3.jpg', 4),
(16, 'FRAY I.D T-shirt', 3000, 'T-shirt-4.jpg', 4),
(17, 'TOMMY HILFIGER', 4000, 'T-shirt-5.jpg', 4),
(18, 'niko and...', 3000, 'T-shirt-6.jpg', 4),
(19, 'SHIPS T-shirt', 1000, 'T-shirt-7.jpg', 4),
(20, 'H&M Sweat', 2000, 'hoodie(2).jpg', 6),
(21, 'nico and...', 4050, 'T-shirt-3.jpg', 7),
(22, 'DHOLIC Pants', 2000, 'pants.jpg', 2),
(23, 'FILA Pants', 3000, 'pants.jpg', 2),
(24, 'NIKE Pants', 6000, 'pants.jpg', 2),
(25, 'Champion Pants', 5000, 'pants.jpg', 2),
(26, 'ZARA Coat', 40000, 'coat.jpg', 3),
(27, 'Admiral Coat', 30000, 'coat.jpg', 3),
(28, 'POLO Coat', 80000, 'coat.jpg', 3),
(29, 'BEAMS Coat', 20000, 'coat.jpg', 3),
(30, 'PRADA Jacket', 100000, 'Jacket.webp', 5),
(31, 'POLO Jacket', 20000, 'benjamin-rascoe-NxtxmmHc2OE-unsplash.jpg', 5),
(32, 'ZARA Jacket', 40000, 'toa-heftiba-ua9ReZlzcIE-unsplash.jpg', 5),
(33, 'POLO Sweat', 20000, 'sweat.jpg', 6),
(34, 'Supreme Sweat', 40000, 'sweat.jpg', 6),
(35, 'ASCLO Sweat', 20000, 'sweat.jpg', 6),
(36, 'Zara Shirt', 4000, 'shirt.jpg', 7),
(37, 'GAP', 5000, 'shirt.jpg', 7),
(38, 'COMMCA ISM', 20000, 'shirt.jpg', 7),
(39, 'Zara pants', 3000, 'pants.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `size_product`
--

CREATE TABLE `size_product` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size_product`
--

INSERT INTO `size_product` (`id`, `prod_id`, `size`, `quantity`) VALUES
(1, 2, 'L', 10),
(2, 3, 'L', 5),
(3, 3, 'S', 30),
(4, 4, 'L', 22),
(5, 5, 'L', 5),
(6, 6, 'M', 3),
(7, 7, 'M', 20),
(8, 8, 'L', 44),
(9, 9, 'M', 30),
(10, 10, 'S', 10),
(11, 11, 'S', 50),
(12, 12, 'L', 30),
(13, 9, 'S', 30),
(14, 9, 'L', 20),
(15, 13, 'S', 12),
(16, 14, 'M', 30),
(17, 15, 'S', 22),
(18, 16, 'L', 20),
(19, 17, 'M', 50),
(20, 18, 'M', 20),
(21, 19, 'M', 10),
(22, 20, 'L', 20),
(23, 21, 'M', 10),
(24, 22, 'M', 5),
(25, 23, 'M', 7),
(26, 24, 'L', 30),
(27, 25, 'S', 21),
(28, 26, 'M', 20),
(29, 27, 'M', 20),
(30, 28, 'M', 30),
(31, 29, 'L', 10),
(32, 30, 'M', 20),
(33, 31, 'L', 10),
(34, 32, 'M', 10),
(35, 33, 'M', 40),
(36, 34, 'L', 30),
(37, 34, 'S', 33),
(38, 35, 'M', 50),
(39, 36, 'S', 30),
(40, 37, 'L', 70),
(41, 38, 'S', 30),
(42, 39, 'L', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(1, 'John', 'Doe', 'John', 'john@gmail.com', '$2y$10$6GNXuHOMi3MSxjKDP0ybsuw0niEA.kqoOcs0DfR0Ly0gx01ZcSYla'),
(2, 'Kosuke', 'Okazaki', 'Kosuke', 'kkk@gmail.com', '$2y$10$wBqtYf6dTIEAbiwSdZdbj.d919ni32t8Kjilwq8wfzkrNPaAbYYSe'),
(3, 'L', 'J', 'LJ', 'lj@aaa', '$2y$10$c17xDxAltdfsMSf73IiwoeBUW.ef444yJH9bFcCcAkPYlddYxQX5i'),
(4, 'Rose', 'Marry', 'Rose', 'rose@eee', '$2y$10$KBtoCyAfwfuBvCMGUk.cTe/DvsrZkMuU1x2uWAl4.E1cNUb57Fdvm'),
(5, 'Natsu', 'Okazaki', 'Natsu', 'natsu@eee', '$2y$10$JjjosRbR09Bbop4BTMctFemWyPW9waQT5jrJdIRrRjOy5O4/0V7eS'),
(6, 'Yuji', 'Toyama', 'Yuji', 'yuji@aaa', '$2y$10$gBaSqssgsDmcSI0F7duU9.VDVVW.S.fGW6IIOEC83.U.lxaC5R.M.'),
(7, 'Bob', 'K', 'Bob', 'bob@dd', '$2y$10$f7AcPduO7fSLM/9yDPsxteSowjZpsE.Xv7.gQi2AWH9hcVmqkqNcy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`,`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `size_product`
--
ALTER TABLE `size_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `size_product`
--
ALTER TABLE `size_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
