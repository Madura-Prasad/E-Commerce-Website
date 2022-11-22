-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 22, 2022 at 10:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zara_wide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subj` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subj`, `msg`) VALUES
(3, 'indula perera', 'indulaperera333@gmail.com', 'Delivery Locations ', 'test!');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `fname`, `lname`, `address`, `address1`, `city`, `pcode`, `email`, `phone`, `method`) VALUES
(62, 'Indula', 'Perera', '21/3 Gamunu Mawatha, Attidiya,Dehiwala', '', 'Dehiwala', '10350', 'indulaperera333@gmail.com', '0768544031', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `email`, `title`, `price`, `quantity`, `size`) VALUES
(43, 'indulaperera333@gmail.com', 'CERULEAN Long sleeved off shoulder crop top for casual wear', '1150', '1', '1'),
(44, 'admin@gmail.com', 'LUMI deep necked long frock for evening wear.', '2690', '1', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qtn` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `small` text NOT NULL,
  `medium` text NOT NULL,
  `large` text NOT NULL,
  `xl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `title`, `price`, `qtn`, `product_img`, `description`, `small`, `medium`, `large`, `xl`) VALUES
(79, 'EVENING COLLECTION / Frock', 'ROSABELLA off shoulder long sleeved frock for evening wear. ', 2650, 35, '../Images/product/new6.png', 'ROSABELLA off shoulder long sleeved frock for evening wear. \r\n\r\nBrand -  ROSABELLA \r\n\r\nNeck - Off shoulder \r\n\r\nMaterial - Georgette\r\n\r\nTexture - plain  \r\n\r\nSleeve – long sleeve \r\n\r\nColor – salmon pink \r\n\r\n*product color may slightly vary due to photograph', 'S', 'M', 'L', ''),
(80, 'EVENING COLLECTION / Frock', 'LUMI deep necked long frock for evening wear.', 2690, 75, '../Images/product/new8.png', 'LUMI deep necked long frock for evening wear.\r\n\r\nBrand -  LUMI\r\n\r\nNeck – Curved v \r\n\r\nMaterial - Cotton \r\n\r\nTexture - Printed \r\n\r\nSleeve -  elbow sleeve \r\n\r\nColor – Persian blue \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL'),
(81, 'CASUAL COLLECTION / Frock', 'SHINE Floral mini off shoulder frock with Flared Cuff sleeves for casual wear', 2390, 50, '../Images/product/pro8.png', 'Brand – SHINE \r\n\r\nNeck – Off shoulder  \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Printed \r\n\r\nSleeve – Flared Cuff \r\n\r\nColor – Ruby red \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', '', 'M', 'L', 'XL'),
(82, 'EVENING COLLECTION /  Skirt', 'GLOAMING Zig zag printed wrap around skirt for evening wear.', 1950, 45, '../Images/product/pro6.png', 'Brand – GLOAMING \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Printed    \r\n                                                               \r\nWaist – Low \r\n\r\nColor – Orange \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', ''),
(83, 'EVENING COLLECTION / Crop Top ', 'CERULEAN Long sleeved off shoulder crop top for casual wear', 1150, 25, '../Images/product/pro4.png', 'CERULEAN Long sleeved off shoulder crop top for casual wear.\r\n\r\nBrand -  LUMI\r\n\r\nNeck – Off shoulder  \r\n\r\nMaterial – Georgette\r\n\r\nTexture – Plain \r\n\r\nSleeve -  flounce\r\n\r\nColor – Amber  \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL'),
(84, 'EVENING COLLECTION / Frock', 'BlOSSOM sleeveless short frock for evening wear.', 2490, 55, '../Images/product/pro5.png', 'BlOSSOM sleeveless short frock for evening wear.\r\n\r\nBrand – BlOSSOM\r\n\r\nNeck – Crew  \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Printed \r\n\r\nSleeve – Sleeveless \r\n\r\nColor – Crimson \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL'),
(85, 'PARTY COLLECTION / Frock', 'SHINE high neck tail frock without sleeves for party wear.', 3590, 35, '../Images/product/n1.png', 'Brand – GLOAMING \r\n\r\nNeck – Crew\r\n\r\nMaterial – Cotton \r\n\r\nTexture – Plain  \r\n\r\nSleeve – Sleeveless \r\n\r\nColor – Plain black\r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', '', 'M', 'L', 'XL'),
(86, 'CASUAL COLLECTION / Mini Frock', 'GLOAMING Puffed sleeved mini frock with scoop neck for casual wear.', 2150, 40, '../Images/product/n2.png', 'GLOAMING Puffed sleeved mini frock with scoop neck for casual wear.\r\n\r\nBrand – GLOAMING \r\n\r\nNeck – Scoop\r\n\r\nMaterial – Cotton \r\n\r\nTexture – Plain  \r\n\r\nSleeve – Puffed  \r\n\r\nColor – Carnation pink \r\n\r\n*product color may slightly vary due to photograph light', 'S', 'M', 'L', 'XL'),
(87, 'CASUAL COLLECTION / Jump Suit ', 'GLOAMING sleeveless Tie up jump suit for casual wear', 2950, 100, '../Images/product/pro3.png', 'GLOAMING sleeveless Tie up jump suit for casual wear.\r\n\r\nBrand – GLOAMING\r\n\r\nMaterial – Cotton \r\n\r\nTexture – Plain  \r\n\r\nSleeve – Sleeveless \r\n\r\nColor – Rosewood \r\n\r\n*product color may slightly vary due to photograph lighting\r\n', 'S', 'M', 'L', 'XL'),
(88, 'EVENING COLLECTION / Frock', 'BlOSSOM Sleeveless long frock for evening wear.', 2490, 125, '../Images/product/n23.png', 'Brand – BlOSSOM\r\n\r\nNeck – Crew  \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Printed \r\n\r\nSleeve – Sleeveless \r\n\r\nColor – Black\r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL'),
(89, 'CASUAL COLLECTION  / Frock', 'GLOAMING Frilled cap sleeved mini frock for casual wear.', 2700, 160, '../Images/product/pro1.png', 'Brand – GLOAMING\r\n\r\nNeck – Crew  \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Plain \r\n\r\nSleeve – Frilled cap sleeve \r\n\r\nColor – Black \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL'),
(90, 'CASUAL COLLECTION / Frock', 'CERULEAN long frock with sleeves for casual wear.', 2690, 120, '../Images/product/pro2.png', 'Brand – CERULEAN\r\n\r\nNeck – V neck \r\n\r\nMaterial – Cotton \r\n\r\nTexture – Plain  \r\n\r\nSleeve – Cuff \r\n\r\nColor – Light cream \r\n\r\n*product color may slightly vary due to photograph lighting.\r\n', 'S', 'M', 'L', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(18, 'indula', 'indulaperera333@gmail.com', 768544031, 'Indula\"123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
