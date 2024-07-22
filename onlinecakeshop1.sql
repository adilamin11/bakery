-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecakeshop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_admin_registrations1`
--

CREATE TABLE `cake_shop_admin_registrations1` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_admin_registrations1`
--

INSERT INTO `cake_shop_admin_registrations1` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'ad@cake.com', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_category1`
--

CREATE TABLE `cake_shop_category1` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_category1`
--

INSERT INTO `cake_shop_category1` (`category_id`, `category_name`, `category_image`) VALUES
(8, 'Cakes', '240304022418.jpg'),
(9, 'Pastries', '240304023329.jpg'),
(10, 'Biscuits', '240304024034.jpg'),
(11, 'Desserts', '240304064826.jpg'),
(12, 'Daily Stuff', '240304071220.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders1`
--

CREATE TABLE `cake_shop_orders1` (
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_orders1`
--

INSERT INTO `cake_shop_orders1` (`orders_id`, `users_id`, `delivery_date`, `payment_method`, `total_amount`) VALUES
(32, 1, '2024-05-20', 'Card', '470'),
(33, 1, '2024-07-14', 'Cash', '300');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders_detail1`
--

CREATE TABLE `cake_shop_orders_detail1` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_orders_detail1`
--

INSERT INTO `cake_shop_orders_detail1` (`orders_detail_id`, `orders_id`, `product_name`, `quantity`) VALUES
(71, 32, 'Chocolate Cake', 1),
(72, 32, 'Mince tarts', 1),
(73, 32, 'Fresh Milk', 1),
(74, 33, 'Chocolate Cake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_product1`
--

CREATE TABLE `cake_shop_product1` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_product1`
--

INSERT INTO `cake_shop_product1` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`) VALUES
(17, 'Chocolate Cake', 8, '300', 'Our chocolate cake is infused with premium cocoa, delivering an intense chocolate experience with every bite', '2403040225350.jpg'),
(18, 'Strawberry Cake', 8, '250', 'Our Strawberry Cake is made with the freshest strawberries, ensuring each bite bursts with vibrant, natural flavor', '2403040226260.jpg'),
(19, 'Birthday Cake', 8, '300', 'Indulge in a celebration of sweetness with our exquisite Birthday Cake,to make your special day  memorable. ', '2403040227040.jpg'),
(20, 'Chewy Fudgy Cake', 8, '050', 'Bite into layers of chewy, fudgy goodness that melt in your mouth with every bite.', '2403040227530.jpg'),
(21, 'Cup Cake', 8, '060', 'Choose from a variety of irresistible flavors, including classic vanilla, rich chocolate, zesty lemon, and more.', '2403040228260.jpg'),
(22, 'Mince tarts', 9, '100', 'our heavenly Mince Tarts, a delightful treat that embodies the essence of tradition and taste.', '2403040234160.jpg'),
(23, 'Chocolate tarts', 9, '120', ' Each bite is a symphony of flavors, as the intense cocoa notes mingle with the subtle sweetness of the pastry ', '2403040234470.jpg'),
(24, 'Mille-feuille', 9, '080', 'Indulge in the delicate layers of our exquisite Mille-feuille Pastries, crafted with precision and passion in every bite. ', '2403040235250.jpg'),
(25, 'Macaron', 9, '110', 'Available in an array of tantalizing flavors, from classic favorites like vanilla and chocolate ', '2403040236090.jpg'),
(26, 'Baklava', 9, '120', 'Contains nuts (pistachios, walnuts, almonds) and wheat (phyllo dough).', '2403040236440.jpg'),
(27, 'Chocolate Biscuit', 10, '110', 'Indulge your senses with our Chocolate Biscuit Biscuits, a delightful treat that combines the rich flavors of chocolate  crunch of a biscuit. ', '2403040241360.jpg'),
(28, 'Wallnut Biscuit', 10, '120', 'Packaged in convenient portions for on-the-go enjoyment or sharing with friends and family.', '2403040242040.jpg'),
(29, 'Salted Biscuit', 10, '080', 'Salted Biscuit boasts a delicate crumb and a satisfying crunch, making it the ideal companion for your morning coffee', '2403040242440.jpg'),
(30, 'Butter Cookies', 10, '090', 'Presented in elegant packaging, our Butter Cookies make for an exquisite gift for loved ones or a delightful addition to any occasion.', '2403040243590.jpg'),
(31, 'Crispy Cookies', 10, '050', 'Experience the satisfying crunch with every bite, providing a delightful chocolate chips or chunks scattered throughout.', '2403040244380.jpg'),
(32, 'Candy Cookies', 11, '080', 'Our Candy Cookies combine classic cookie goodness with the irresistible allure of candy. ', '2403040641340.jpg'),
(33, 'Chill Delight', 11, '400', 'Dive into a world of indulgence with our rich and flavorful desserts, meticulously crafted to tantalize your taste buds.', '2403040650020.jpg'),
(34, 'Cone Carnival', 11, '250', 'Dive into a world of indulgence with our rich and flavorful desserts, meticulously crafted to tantalize your taste buds.', '2403040650510.jpg'),
(35, 'Creamy Dream', 11, '350', 'Dive into a world of indulgence with our rich and flavorful desserts, meticulously crafted to tantalize your taste buds.', '2403040652510.jpg'),
(36, 'Carmel Crunch Cake', 8, '500', 'Dive into a world of indulgence with our rich and flavorful desserts, meticulously crafted to tantalize your taste buds.', '2403040656320.jpg'),
(37, 'Fresh Milk', 12, '070', 'Packed with essential nutrients like calcium and vitamin D, our Fresh Milk is not only delicious but also nourishing.', '2403040730020.jpg'),
(38, 'Pure Butter', 12, '080', 'our butter boasts a luxuriously smooth texture and a rich, full-bodied flavor that elevates any culinary creation.', '2403040730450.jpg'),
(39, 'Fresh Bread', 12, '040', 'Our Fresh Bread boasts a soft, pillowy interior and a golden, crusty exterior that is simply irresistible.', '2403040731390.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_users_registrations1`
--

CREATE TABLE `cake_shop_users_registrations1` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_email` varchar(150) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_mobile` varchar(50) NOT NULL,
  `users_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_users_registrations1`
--

INSERT INTO `cake_shop_users_registrations1` (`users_id`, `users_username`, `users_email`, `users_password`, `users_mobile`, `users_address`) VALUES
(1, 'user', 'user@gmail.com', '987654', '1234567890', 'Azam campus camp,pune'),
(4, 'ayaz', 'ayaz@gmail.com', '12', '1234567890', 'kashewadi'),
(6, '1234', '1234@.com', '1234', 'onetwothr', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_shop_admin_registrations1`
--
ALTER TABLE `cake_shop_admin_registrations1`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cake_shop_category1`
--
ALTER TABLE `cake_shop_category1`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cake_shop_orders1`
--
ALTER TABLE `cake_shop_orders1`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `cake_shop_orders_detail1`
--
ALTER TABLE `cake_shop_orders_detail1`
  ADD PRIMARY KEY (`orders_detail_id`);

--
-- Indexes for table `cake_shop_product1`
--
ALTER TABLE `cake_shop_product1`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cake_shop_users_registrations1`
--
ALTER TABLE `cake_shop_users_registrations1`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake_shop_admin_registrations1`
--
ALTER TABLE `cake_shop_admin_registrations1`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cake_shop_category1`
--
ALTER TABLE `cake_shop_category1`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cake_shop_orders1`
--
ALTER TABLE `cake_shop_orders1`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cake_shop_orders_detail1`
--
ALTER TABLE `cake_shop_orders_detail1`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `cake_shop_product1`
--
ALTER TABLE `cake_shop_product1`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cake_shop_users_registrations1`
--
ALTER TABLE `cake_shop_users_registrations1`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
