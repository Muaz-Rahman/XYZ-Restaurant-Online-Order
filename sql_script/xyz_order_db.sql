-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 11:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz_order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'abcd@abcd.com', '12341234');

-- --------------------------------------------------------

--
-- Table structure for table `menu_table`
--

CREATE TABLE `menu_table` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_pic` text NOT NULL,
  `item_description` text DEFAULT NULL,
  `item_price` int(11) NOT NULL,
  `item_available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_table`
--

INSERT INTO `menu_table` (`item_id`, `item_name`, `item_pic`, `item_description`, `item_price`, `item_available`) VALUES
(1, 'Pizza', '\'../assets/menu/pizza.jpg\'', 'All of the Italian goodness. Comes with olive oil, tomatoes, and mozzarella cheese and beef included in it as well.', 300, 1),
(2, 'Burger', '\'../assets/menu/burger.jpg\'', 'Our menu features burgers that are hand crafted with 100% Angus beef. Always fresh, never frozen. Tasty, delicious, and everything you\'d ever want to savor.', 200, 1),
(3, 'Spaghetti', '\'../assets/menu/spaghetti.jpg\'', 'Our long and thin pasta is carefully prepared with garlic, olive oil, tomato sauce and basil with minced meat sauce and topped with grated hard cheese. ', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages_table`
--

CREATE TABLE `messages_table` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(40) NOT NULL,
  `message_phone` varchar(20) NOT NULL,
  `message_email` varchar(50) NOT NULL,
  `message_content` text NOT NULL,
  `message_type` tinyint(1) NOT NULL DEFAULT 0,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages_table`
--

INSERT INTO `messages_table` (`message_id`, `message_name`, `message_phone`, `message_email`, `message_content`, `message_type`, `message_time`) VALUES
(1, 'Arif Khan', '123455', 'tgh@sd', 'A very good service', 0, '2022-12-02 02:34:35'),
(2, 'Aard Kahn', '123455', 'tgh@sd ', 'This is a support message', 1, '2022-12-02 02:36:43'),
(5, 'Rayshell Billinge', '420-878-5977	', 'rbillinge0@gizmodo.com', 'blandit mi in porttitor pede justo eu massa donec dapibus duis', 0, '2022-12-05 03:02:13'),
(7, 'Gan Beattie', '420-878-5934', 'gbeattie2@moonfruit.com', 'amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices', 0, '2022-12-05 03:05:53'),
(9, 'Bettina Waggett', '420-878-5934', 'bwaggett6@nbcnews.com', 'viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus', 1, '2022-12-05 03:14:49'),
(10, 'Arty', '2346284', 'arty@arty', 'The service doesn\'t work properly lol.', 1, '2022-12-06 21:19:25'),
(11, 'Bettina Waggett', '4208785934', 'bwaggett6@nbcnews.com', 'The food was delicious, and the order was fast as well.', 0, '2022-12-06 21:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_amount` smallint(6) NOT NULL,
  `order_address` text NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `user_id`, `food_id`, `order_date`, `order_amount`, `order_address`, `order_status`, `order_total`) VALUES
(1, 1, 1, '2022-12-01 21:40:14', 2, 'Middle of nowhere', 1, 500),
(2, 1, 3, '2022-12-01 21:40:14', 3, 'Also middle of nowhere', 0, 400),
(5, 1, 2, '2022-12-03 12:02:29', 2, 'gdf', 1, 4509),
(24, 2, 1, '2022-12-05 22:35:00', 10, '7 downing streets', 0, 3000),
(26, 5, 2, '2022-12-06 21:15:00', 6, 'Road 52, Amsterdam', 1, 1200),
(27, 5, 3, '2022-12-06 21:15:00', 3, 'Road 52, Amsterdam', 1, 600);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_email`, `user_password`, `user_phone`) VALUES
(1, 'mrf@mrf.com', 'abcd', '+88123456'),
(2, 'artwe@asdf', 'abcd', '12345'),
(3, 'kblowes1@loc.gov', '3YtiXXsh', '9942400199'),
(5, 'bemmert5@ask.com', 'abcd', '145-738-5548');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages_table`
--
ALTER TABLE `messages_table`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages_table`
--
ALTER TABLE `messages_table`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `menu_table` (`item_id`),
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
