-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 12:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shanuka`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE `add_item` (
  `id` int(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `manufacturing` date NOT NULL,
  `expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_item`
--

INSERT INTO `add_item` (`id`, `item_id`, `item_name`, `category`, `brand`, `quantity`, `price`, `manufacturing`, `expire`) VALUES
(20, 'P001', 'Pendol', 'tablet', 'SPC', '100', '10', '2021-08-02', '2021-10-02'),
(21, 'M0001', 'Metformin', 'tablet', 'SPC', '50', '13', '2021-08-02', '2021-12-20'),
(22, 'V0001', 'Vitamin C', 'capsules', 'SPC', '65', '5', '2021-08-03', '2021-10-21'),
(29, 'ssss', 'ss', 'tablet', '', '', '', '0000-00-00', '0000-00-00'),
(30, 'sss', '', 'tablet', 'dasd', 'asd', '', '0000-00-00', '0000-00-00'),
(32, 's', 'as', 'liquid', '', '', 'd', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `buy_item`
--

CREATE TABLE `buy_item` (
  `id` int(20) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `sup_id` varchar(20) NOT NULL,
  `sup_name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `expire_date` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_item`
--

INSERT INTO `buy_item` (`id`, `item_id`, `item_name`, `sup_id`, `sup_name`, `price`, `quantity`, `total`, `expire_date`, `date`) VALUES
(8, 'P001', 'pandol', 'SUP-1', 'Shanuka', 50, 10, 500, '2021-11-23', '2021-11-02 05:18:13'),
(9, 'P001', 'pandol', 'SUP-3', 'Sadun', 50, 14, 700, '2021-11-30', '2021-10-06 06:47:59'),
(10, 'P001', 'pandol', 'SUP-3', 'Sadun', 50, 5, 250, '2021-11-26', '2021-09-15 03:09:47'),
(11, 'P001', 'pandol', 'SUP-1', 'Shanuka', 50, 22, 1100, '2021-12-01', '2021-11-08 10:09:31'),
(12, 'P001', 'pandol', 'SUP-4', 'Sanju', 50, 14, 700, '2022-01-12', '2021-11-11 12:08:41'),
(13, 'M001', 'Metformin', 'SUP-2', 'Kasun', 50, 20, 1000, '2022-01-25', '2021-11-11 14:17:32'),
(14, 'C002', 'Clogard Toothpaste', 'SUP-3', 'Sadun', 50, 14, 700, '2022-05-25', '2021-11-11 14:18:04'),
(15, 'PH-1', 'IODEX 45G', 'SUP-1', 'Shanuka', 385, 50, 19250, '2022-05-25', '2021-11-12 18:10:51'),
(16, 'PH-2', 'VICKS VAPORUB 25G', 'SUP-3', 'Sadun', 240, 70, 16800, '2022-02-24', '2021-11-12 18:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `ip_add` varchar(200) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `total_amt` int(20) NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_name`, `product_image`, `qty`, `price`, `total_amt`, `state`) VALUES
(44, '7', '0', '5', 'Betadine', 'image/c673a020e3929e0924919db215d676c14c19acb6283f9a53e5a9c61b1337a5d0b.jpg', 1, 100, 100, 'pending'),
(45, '5', '0', '5', 'cetirizine', 'image/145140ddfde07529959b1e8e9996e194cetrizine.jpg', 1, 20, 20, 'pending'),
(59, '9', '0', '4', 'Metformin', 'image/8623d02e65f587024f92934cd3c814d776c7fa1dba6f8dad785105c2fc477921metformin.jpg', 4, 50, 200, 'done'),
(60, '5', '0', '4', 'cetirizine', 'image/145140ddfde07529959b1e8e9996e194cetrizine.jpg', 1, 20, 20, 'done'),
(67, '10', '0', '5', 'Clogard Toothpaste', './image/c32ab27577db423307255dc9f8d57ba1clogard.png', 1, 50, 50, 'pending'),
(68, '12', '0', '5', 'IODEX 45G', './image/07f2ab5d6060021483830f000380adf1iodex.jpg', 1, 385, 385, 'pending'),
(69, '13', '0', '5', 'VICKS VAPORUB 25G', './image/ac73eddd95f310c89b2fb1c96f2b52b4vicks.jpg', 1, 240, 240, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Tablet'),
(2, 'Liquid'),
(3, 'Cream'),
(4, 'Capsules'),
(5, 'Drops'),
(6, 'Inhalers'),
(15, 'Balm'),
(16, 'Pain and Fever'),
(17, 'Mother and Baby'),
(18, 'Covid Essentials');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(20) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `cmt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `f_name`, `l_name`, `cmt`) VALUES
(1, 'shanuka.nadeeshan2014@gmail.com', 'Nadeeshan', 'aaa'),
(2, 'sdfasa', 'dasd', 'asdas'),
(4, 'Shanuka', 'Nadeeshan', 'sdas');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(33, 'shanuk', '2021-08-14', 600, 20, 580, 580, 0, 'Cash'),
(34, 'Nadeeshan', '2021-08-14', 200, 0, 200, 200, 0, 'Cash'),
(35, 'Randu', '2021-08-16', 50, 0, 50, 50, 0, 'Cash'),
(36, 'sanju', '2021-10-13', 100, 0, 100, 100, 0, 'Cash'),
(37, 'sadun', '2021-11-10', 50, 0, 50, 50, 0, 'Cash'),
(67, 'Kamal', '2021-11-11', 650, 0, 650, 700, -50, 'Cash'),
(68, 'sadun', '2021-11-16', 50, 0, 50, 50, 0, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `item_name`, `price`, `qty`) VALUES
(35, 33, 'pandol', 50, 10),
(36, 33, 'cetirizine', 20, 5),
(37, 34, 'Betadine', 100, 2),
(72, 67, 'pandol', 50, 1),
(73, 67, 'Betadine', 100, 1),
(74, 67, 'Clogard Toothpaste', 50, 10),
(75, 68, 'pandol', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(20) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `item_image` varchar(500) NOT NULL,
  `qty` int(30) NOT NULL,
  `re_order_qty` int(20) NOT NULL,
  `brand` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_id`, `item_name`, `category`, `description`, `price`, `item_image`, `qty`, `re_order_qty`, `brand`) VALUES
(3, 'P001', 'pandol', 'Tablet', '50mg', '50', 'image/8793c354bf6cddcb81ee8b8fc00bf4c0aa.jpg', 10, 20, 'SPC'),
(5, 'C001', 'cetirizine', 'Tablet', '10mg', '20', 'image/145140ddfde07529959b1e8e9996e194cetrizine.jpg', 188, 10, 'ROST 20'),
(7, 'B001', 'Betadine', 'Tablet', '100mg', '100', 'image/c673a020e3929e0924919db215d676c14c19acb6283f9a53e5a9c61b1337a5d0b.jpg', 44, 10, 'KLODIC'),
(9, 'M001', 'Metformin', 'Tablet', '500mg , 28 tablet', '50', 'image/8623d02e65f587024f92934cd3c814d776c7fa1dba6f8dad785105c2fc477921metformin.jpg', 200, 20, 'Spmc '),
(10, 'C002', 'Clogard Toothpaste', 'cream', '40G', '50', './image/c32ab27577db423307255dc9f8d57ba1clogard.png', 52, 15, 'Clogard'),
(12, 'PH-1', 'IODEX 45G', 'Balm', 'Unlike headache, pain in other parts of the body is caused due to muscular inflammation & hence needs a specialist solution that can help reduce inflammation & relieve pain.', '385', './image/07f2ab5d6060021483830f000380adf1iodex.jpg', 50, 20, 'Iodex'),
(13, 'PH-2', 'VICKS VAPORUB 25G', 'Balm', 'Helps in clearing your nasal package and removes clogging of nose. Temporarily provides relief to chest and throat.', '240', './image/ac73eddd95f310c89b2fb1c96f2b52b4vicks.jpg', 70, 20, 'Iodex'),
(14, 'PH-3', 'JOVEES PAPAYA AND HONEY MUD SCRUB 100G', 'Cream', 'A unique formulation that helps to discover a new kind of luminosity day after day.', '890', './image/f24b70dd1c873719775e2f906f5bb9ebjavees.jpg', 50, 20, 'Javees'),
(15, 'PH-4', 'BABY CHERAMY BABY REGULAR TALC 100G', 'Cream', 'Reduce the extra moisture on your babyÃ¢â‚¬â„¢s skin. Keeps baby dry & happy.', '120', './image/7d7664ff0600b6e924a1ccea548dbb63babay cream.jpg', 60, 20, 'Baby Cheramy'),
(16, 'PH-5', 'SOFTA COTTON BALLS', 'Mother and Baby', 'The price shown is the per tablet/capsule price', '40', './image/31a5468b330424c01136a5fd4e232852softa_cotton_balls_1.jpg', 85, 20, 'Soft care'),
(17, 'PH-6', 'Anchor PediaPro 2-5 Years 1kg', 'Mother and Baby', '100% pure and delicious Natural goodness Suitable for 1-2 years babies Rich and moisturized Deliciously creamy During the first 2000 days of life, rapid physical and mental growth take place.', '1700', './image/dfb3b295e942fe3591481553505e2fb5611d62317be0a.png', 45, 20, 'Anchor'),
(18, 'PH-7', 'Sanitizer 5L can', 'Covid Essentials', 'Sanitizer 5L can', '3750', './image/b9a23a1f25aaf639bd703838a58d978a6138af6c46d61.jpg', 90, 20, 'Super'),
(19, 'PH-8', 'Dettol Hand Sanitizer', 'Covid Essentials', 'Dettol Hand Sanitizer - 50ml', '240', './image/80a9fea36ddbf657cc6819898ee8dbef610d07bac7fd6.jpg', 66, 20, 'Dettol');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_no` int(20) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_no`, `u_id`, `f_name`, `l_name`, `email`, `tel`, `address`, `total_price`, `state`, `date`) VALUES
(33, '4', 'Sadun', 'Perera', 'shanuka.nadeeshan2014@gmail.com', '0714525411', '10/A , Gampaha', 220, 'pending', '2021-11-17'),
(34, '4', 'Sadun', 'Perera', 'shanuka.nadeeshan2014@gmail.com', '0714525411', '10/A , Gampaha', 220, 'pending', '2021-11-17'),
(35, '4', 'Sadun', 'Perera', 'shanuka.nadeeshan2014@gmail.com', '0714525411', '10/A , Gampaha', 220, 'pending', '2021-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) NOT NULL,
  `order_no` int(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_no`, `item_name`, `qty`, `price`) VALUES
(28, 33, 'Metformin', 4, 200),
(29, 33, 'cetirizine', 1, 20),
(30, 34, 'Metformin', 4, 200),
(31, 34, 'cetirizine', 1, 20),
(32, 35, 'Metformin', 4, 200),
(33, 35, 'cetirizine', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pris`
--

CREATE TABLE `pris` (
  `id` int(20) NOT NULL,
  `cus_id` varchar(50) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `ms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pris`
--

INSERT INTO `pris` (`id`, `cus_id`, `cus_name`, `address`, `image`, `email`, `status`, `date`, `ms`) VALUES
(44, '4', 'Sadun', '10/A , Gampaha', '../Admin/priscription/6d8bcaddd2f297f2254ec37d5c777e1bgym.jpg', 'shanuka.nadeeshan2014@gmail.com', 'delivered', '2021-11-15', 'Your order is now processing'),
(54, '5', 'Kasun', 'No,17/A,Mirigama', '../Admin/priscription/de.jpg', 'shanukaict4.2019@gmail.com', 'pending', '2021-11-16', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(20) NOT NULL,
  `supid` varchar(20) NOT NULL,
  `supname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `company` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supid`, `supname`, `address`, `contact`, `company`) VALUES
(27, 'SUP-1', 'Shanuka', 'Mirigama', '0214748364', 'SPC'),
(31, 'SUP-2', 'Kasun', 'Gampaha', '0718745332', 'SPC'),
(32, 'SUP-3', 'Sadun', 'Colombo', '0714524855', 'MDB'),
(36, 'SUP-4', 'Sanju', 'mathara', '0715682455', 'SPC');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verify_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `verify_token`) VALUES
(1, 'Shanuka', 'Nadeeshan', 'shanuka', '77cbc257e66302866cf6191754c0c8e3', 'shanuka.nadeeshan2014@gmail.com', '1ded5d872048b627610c91f7f410f683');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `verify_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `verify_token`) VALUES
(4, 'Sadun', 'Perera', 'shanuka.nadeeshan2014@gmail.com', '0f7e44a922df352c05c5f73cb40ba115', '0714525411', '10/A , Gampaha', '9a0ea3d130734deff87d94a115dafd93'),
(5, 'nirmal', 'Perera', 'shanukaict4.2019@gmail.com', '0f7e44a922df352c05c5f73cb40ba115', '0716524811', 'No,17/A,Mirigama', '4898e74c37afe744e3772d1cf637bcdb'),
(7, 'sanju', 'Sadun', 'lakshitha.96.nirmal@gmail.com', '0f7e44a922df352c05c5f73cb40ba115', '0717525411', 'adasdas', '31d926e36df5a6c2e5336a6f6d387991');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_item`
--
ALTER TABLE `add_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_item`
--
ALTER TABLE `buy_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_no` (`order_no`);

--
-- Indexes for table `pris`
--
ALTER TABLE `pris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_item`
--
ALTER TABLE `add_item`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `buy_item`
--
ALTER TABLE `buy_item`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pris`
--
ALTER TABLE `pris`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `order` (`order_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
