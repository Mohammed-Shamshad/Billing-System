-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 05:40 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `37aaecg7865n1ztbill`
--

CREATE TABLE `37aaecg7865n1ztbill` (
  `recipt` char(50) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `37aaecg7865n1ztbill`
--

INSERT INTO `37aaecg7865n1ztbill` (`recipt`, `order_id`, `product_name`, `quantity`, `price`, `discount`, `gst`, `amount`) VALUES
('cssmurty@gmail.com', 16, 'FRENCH FRIES', 1, 115, 0, 5.75, 115),
('cssmurty@gmail.com', 17, 'FRENCH FRIES', 1, 115, 0, 5.75, 115),
('cssmurty@gmail.com', 18, 'PANEER BUTTER MASALA', 1, 260, 0, 13, 260),
('cssmurty@gmail.com', 19, 'ROTI', 1, 40, 0, 2, 40),
('cssmurty@gmail.com', 20, 'FRENCH FRIES', 1, 115, 0, 5.75, 115),
('cssmurty@gmail.com', 21, 'PANEER BUTTER MASALA', 1, 260, 0, 13, 260),
('cssmurty@gmail.com', 22, 'ROTI', 1, 40, 0, 2, 40),
('cssmurty@gmail.com', 23, 'FRENCH FRIES', 1, 115, 0, 5.75, 115),
('cssmurty@gmail.com', 24, 'PANEER BUTTER MASALA', 1, 260, 0, 13, 260),
('cssmurty@gmail.com', 25, 'ROTI', 1, 40, 0, 2, 40),
('cssmurty@gmail.com', 26, 'PANEER BUTTER MASALA', 1, 260, 0, 13, 260),
('cssmurty@gmail.com', 27, 'RUMALI ROTI', 5, 50, 0, 12.5, 250),
('cssmurty@gmail.com', 28, 'PANEER BIRYANI', 1, 220, 0, 11, 220),
('cgprasad69@gmail.com', 29, 'FRENCH FRIES', 1, 115, 0, 5.75, 115),
('cgprasad69@gmail.com', 30, 'VEG MANCHURIAN', 1, 205, 0, 10.25, 205),
('cgprasad69@gmail.com', 31, 'PANEER BUTTER MASALA', 1, 260, 0, 13, 260),
('cgprasad69@gmail.com', 32, 'NAAN', 5, 40, 0, 10, 200),
('cgprasad69@gmail.com', 33, 'RUMALI ROTI', 5, 50, 0, 12.5, 250),
('cgprasad69@gmail.com', 34, 'VEG BURGER', 1, 110, 0, 5.5, 110),
('cssmurty@gmail.com', 35, 'FRENCH FRIES', 10, 115, 0, 57.5, 1150),
('cssmurty@gmail.com', 36, 'CORN SALT AND PEPPER', 50, 190, 0, 475, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `37aaecg7865n1ztmenu`
--

CREATE TABLE `37aaecg7865n1ztmenu` (
  `productid` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `gst` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `37aaecg7865n1ztmenu`
--

INSERT INTO `37aaecg7865n1ztmenu` (`productid`, `pname`, `price`, `gst`) VALUES
(1, 'FRENCH FRIES', 115, 5),
(2, 'CORN SALT AND PEPPER', 190, 5),
(3, 'VEG MANCHURIAN', 205, 5),
(4, 'PLAIN PALAK', 185, 5),
(5, 'DAL FRY', 185, 5),
(6, 'EGG CURRY', 140, 5),
(7, 'GONGURA CHICKEN', 360, 5),
(8, 'BUTTER CHICKEN', 290, 5),
(9, 'PANEER BUTTER MASALA', 260, 5),
(10, 'ROTI', 40, 5),
(11, 'NAAN', 40, 5),
(12, 'RUMALI ROTI', 50, 5),
(13, 'PANEER BIRYANI', 220, 5),
(14, 'CHICKEN DUM BIRIYAN', 255, 5),
(15, 'VEG MEALS', 125, 5),
(16, 'VEG BURGER', 110, 5),
(17, 'NON VEG PIZZA', 190, 5),
(18, 'VEG DUM BIRYANI', 210, 5),
(19, 'VEG FRIED RICE', 120, 5);

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `gstno` varchar(20) NOT NULL,
  `latest` date NOT NULL,
  `previovs` date NOT NULL,
  `previovs1` date NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`gstno`, `latest`, `previovs`, `previovs1`, `remarks`) VALUES
('37AAECG7865N1ZT', '2017-02-01', '0000-00-00', '0000-00-00', 'FOOD NOT GOOD');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` char(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `message`) VALUES
('sai', 'cssmurty@yahoo.com', 'hi'),
('sai', 'sai@gmail', 'ss'),
('sai', 'sumanthp11@gmail.com', 'iam gay');

-- --------------------------------------------------------

--
-- Table structure for table `gst_returns`
--

CREATE TABLE `gst_returns` (
  `gstno` varchar(20) NOT NULL,
  `fileddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gst_returns`
--

INSERT INTO `gst_returns` (`gstno`, `fileddate`) VALUES
('37AAECG7865N1ZT', '2017-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('cssmurty@gmail.com', '43661240310e8ee768fe3d39bfa57e06', 'org'),
('cssmurty@yahoo.com', '43661240310e8ee768fe3d39bfa57e06', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `officer_details`
--

CREATE TABLE `officer_details` (
  `officer_id` varchar(10) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `salary` float(20,2) NOT NULL,
  `el` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `designation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer_details`
--

INSERT INTO `officer_details` (`officer_id`, `name`, `email`, `salary`, `el`, `cl`, `designation`) VALUES
('1', 'Sai Sadguru Murty', 'cssmurty@yahoo.com', 1000000.00, 10, 5, 'inspeter'),
('2', 'cgprasad', 'cgprasad69@gmail.com', 100000.00, 5, 10, 'ACP');

-- --------------------------------------------------------

--
-- Table structure for table `orgdetails`
--

CREATE TABLE `orgdetails` (
  `name` char(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `city` char(40) DEFAULT NULL,
  `adder` varchar(50) DEFAULT NULL,
  `pan` varchar(30) DEFAULT NULL,
  `npan` char(30) DEFAULT NULL,
  `gstno` varchar(20) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `comm` varchar(30) DEFAULT NULL,
  `taxa` varchar(30) DEFAULT NULL,
  `gstper` float(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orgdetails`
--

INSERT INTO `orgdetails` (`name`, `email`, `password`, `contact`, `city`, `adder`, `pan`, `npan`, `gstno`, `type`, `comm`, `taxa`, `gstper`) VALUES
('GOUTHAM GRAND HOTAL', 'cssmurty@gmail.com', '43661240310e8ee768fe3d39bfa57e06', 8644236555, 'tenali,guntur', 'railway station road tenali 522202', 'AAECG7865N1ZT', 'GOUTHAM GRAND HOTAL', '37AAECG7865N1ZT', 'MULTIPLEPRODUCTS', 'guntur ', 'food parcle', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_name` varchar(100) NOT NULL,
  `Gst` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `Gst`) VALUES
('agarbatti', 0.25),
('air craft tyres', 0.25),
('aluminium foil', 18),
('ayurvedic', 0.25),
('bags', 12),
('bangles \r\nkajal\r\n', 0),
('bangles', 0),
('batters', 12),
('bells', 12),
('besan', 0),
('bidis', 18),
('bindi', 0),
('bindi,sindoor', 0),
('bio gas', 0.25),
('biscuits', 18),
('bone_grist', 0),
('bone_meal', 0),
('bread ', 0),
('bricks', 0.25),
('bussiness class tickets', 12),
('butter', 12),
('cashew nuts', 0.25),
('cctv', 18),
('chicken', 0),
('choclates', 18),
('coal', 0.25),
('coffee', 0.25),
('coir products', 0.25),
('corals', 0.25),
('cotton quills >1000', 0.25),
('cotton quills>1000rs', 12),
('cotton seed oil\r\n', 0),
('cotton_seed_oil', 0),
('cream\r\n', 0.25),
('deodrants', 18),
('diabetic food', 12),
('diagnostics kits', 12),
('diamond unsorted rough', 0.25),
('diamonds unsorted rough\r\n', 0.25),
('drawing books\r\ncolor books\r\n', 0),
('drawing/coloring_book', 0),
('dried tamarind', 0.25),
('dry fruits packed', 12),
('electrical transformer', 18),
('envelope', 18),
('fertilizers', 12),
('fiber products', 0.25),
('fish', 0),
('fish,chicken,eggs\r\n', 0),
('fish,chicken,eggs', 0),
('fishiong net and hook', 0.25),
('flour', 0),
('flour,besan', 0),
('food parcle', 0.25),
('foot ware <500/-', 0.25),
('foot wear>500rs', 12),
('footware lessthan 500', 0.25),
('footwear less than 500', 0.25),
('footwear>500', 18),
('fresh fruits , vegetables', 0),
('fresh meat', 0),
('fresh_fruits', 0),
('frozen meat products', 12),
('frozen vegetables', 0.25),
('furniture', 12),
('gaming indoor', 12),
('ghee', 12),
('handloom cloths', 0),
('handloom_cloth', 0),
('homeopathi medecine', 0.25),
('hoof_meal\r\n', 0),
('hoof_meal', 0),
('horn_meal', 0),
('ice and snow', 0.25),
('instant food', 18),
('insulin', 0.25),
('jaggery\r\n', 0),
('jaggery', 0),
('jam', 18),
('judicial_papers', 0),
('Jute', 0),
('kajal', 0),
('kerosene', 0.25),
('ketchup/sauces', 12),
('kitchen ware', 12),
('kites', 0.25),
('knifes', 12),
('leather', 0.25),
('life boats', 0.25),
('marble idols', 12),
('medicines', 0.25),
('milk condensed', 12),
('milk powder', 0.25),
('milk,butter milk,curd', 0),
('mineral water', 18),
('natural honey', 0),
('natural_honey', 0),
('news_paper', 0),
('non ac hotels', 12),
('note books', 12),
('optical fiber', 18),
('ornamental articles', 12),
('paints/vanishes', 18),
('paneer', 0.25),
('pastries/cakes', 18),
('pizza', 0.25),
('postage', 0.25),
('prayer beads', 0.25),
('printed  books\r\nnewspapers\r\n', 0),
('printed_books', 0),
('raisin', 0.25),
('real zari', 0.25),
('refined sugar', 12),
('restraunts/hotels <7500', 0.25),
('roasaries', 0.25),
('roasted gram', 0.25),
('rubber band', 12),
('rusk', 0.25),
('salt', 0),
('salt,', 0),
('sauces', 18),
('seweing machine', 12),
('siddha', 0.25),
('sindoor', 0),
('skimmers', 12),
('soaps', 18),
('software', 18),
('spectacles', 12),
('spices', 0.25),
('spoon/fork', 12),
('stamp post', 0.25),
('stamps', 0),
('stamps,judicial paper\r\n', 0),
('steel product', 18),
('stone metal', 12),
('tea', 0.25),
('tongs', 12),
('tooth powder', 12),
('tractor parts', 18),
('transport service', 0.25),
('umbrella', 12),
('unani', 0.25),
('vegetables ', 0),
('wal nuts', 0.25),
('washing powder', 18),
('wastes', 0.25),
('wood', 12);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Address` varchar(50) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Rid` int(15) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Address`, `Email`, `Message`, `Rid`, `status`) VALUES
('tenali', 'gireeshmakomaraneni@gmail.com', 'welcome ', 6, 'active'),
('asdasda', 'cssmurty@gmail.com', 'hi', 8, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `37aaecg7865n1ztbill`
--
ALTER TABLE `37aaecg7865n1ztbill`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `37aaecg7865n1ztmenu`
--
ALTER TABLE `37aaecg7865n1ztmenu`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`gstno`,`latest`) USING BTREE;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`name`,`email`);

--
-- Indexes for table `gst_returns`
--
ALTER TABLE `gst_returns`
  ADD PRIMARY KEY (`gstno`,`fileddate`) USING BTREE;

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`role`);

--
-- Indexes for table `officer_details`
--
ALTER TABLE `officer_details`
  ADD PRIMARY KEY (`officer_id`,`email`) USING BTREE;

--
-- Indexes for table `orgdetails`
--
ALTER TABLE `orgdetails`
  ADD PRIMARY KEY (`email`,`gstno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `37aaecg7865n1ztbill`
--
ALTER TABLE `37aaecg7865n1ztbill`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `37aaecg7865n1ztmenu`
--
ALTER TABLE `37aaecg7865n1ztmenu`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Rid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
