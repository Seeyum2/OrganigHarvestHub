-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 11:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organicharvesthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` enum('Male','Female','Other') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `current_password` varchar(255) DEFAULT NULL,
  `document_pdf` longblob DEFAULT NULL,
  `nid_number` varchar(20) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `user_id`, `full_name`, `date_of_birth`, `sex`, `address`, `phone_number`, `email`, `profile_picture`, `password`, `current_password`, `document_pdf`, `nid_number`, `bio`) VALUES
(1, 1001, 'Md. Abdullah Rahman', '1990-05-15', 'Male', 'Dhaka, Bangladesh', '018XXXXXXX', 'abdurahman@example.com', 'images/farmer/profile1.jpg', 'password123', 'password123', NULL, NULL, NULL),
(2, 1002, 'Fatima Begum', '1988-08-25', 'Female', 'Chittagong, Bangladesh', '019XXXXXXX', 'fatima@example.com', 'images/farmer/profile2.jpg', 'password456', 'password456', NULL, NULL, NULL),
(3, 1003, 'Ali Khan', '1992-02-10', 'Male', 'Sylhet, Bangladesh', '017XXXXXXX', 'alikhan@example.com', 'images/farmer/profile3.jpg', 'password789', 'password789', NULL, NULL, NULL),
(4, 1004, 'Nasrin Ahmed', '1995-11-02', 'Female', 'Khulna, Bangladesh', '015XXXXXXX', 'nasrin@example.com', 'images/farmer/profile4.jpg', 'passwordabc', 'passwordabc', NULL, NULL, NULL),
(5, 1005, 'Rahim Uddin', '1985-07-20', 'Male', 'Rajshahi, Bangladesh', '016XXXXXXX', 'rahim@example.com', 'images/farmer/profile5.jpg', 'passworddef', 'passworddef', NULL, NULL, NULL),
(6, 1007, 'Sumaiya Khan', '1991-09-12', 'Female', 'Barisal, Bangladesh', '018YYYYYYY', 'sumaiya@example.com', 'images/farmer/profile20.jpg', 'passwordxyz', 'passwordxyz', NULL, NULL, NULL),
(7, 1006, 'Didarul Islam', '1999-12-13', 'Male', '160/2 Kuril Flyover', '01756538544', 'didar131299@gmail.com', 'images/farmer/didar.jpg', 'didar', NULL, NULL, '12345678912', 'I love farming.'),
(9, NULL, 'Seeyum', NULL, NULL, NULL, '01756538588', NULL, NULL, 'llll', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Available','Out of Stock') NOT NULL,
  `available_date` date DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `status`, `available_date`, `product_description`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `user_id`) VALUES
(11, 'Organic Apples', '2.99', 'Available', '2023-08-05', 'Fresh organic apples from local orchards.', 'images/apple1.jpg', 'images/apple2.jpg', 'images/apple3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(12, 'Organic Bananas', '1.49', 'Available', '2023-08-07', 'Ripe and delicious organic bananas.', 'images/banana1.jpg', 'images/banana2.jpg', 'images/banana3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(13, 'Fresh Strawberries', '3.99', 'Available', '2023-08-06', 'Sweet and juicy organic strawberries.', 'images/strawberry1.png', 'images/strawberry2.jpg', 'images/strawberry3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:57:31', NULL),
(14, 'Organic Broccoli', '2.49', 'Available', '2023-08-05', 'Nutrient-rich organic broccoli florets.', 'images/broccoli1.jpg', 'images/broccoli2.jpg', 'images/broccoli3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(15, 'Organic Carrots', '1.99', 'Available', '2023-08-07', 'Fresh organic carrots perfect for snacking.', 'images/carrot1.jpg', 'images/carrot2.jpg', 'images/carrot3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(16, 'Organic Spinach', '2.79', 'Available', '2023-08-06', 'Tender organic spinach leaves for salads and smoothies.', 'images/spinach1.jpg', 'images/spinach2.jpg', 'images/spinach3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(17, 'Organic Oranges', '3.49', 'Available', '2023-08-08', 'Juicy and vitamin-rich organic oranges.', 'images/orange1.jpg', 'images/orange2.jpg', 'images/orange3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(18, 'Sweet Grapes', '4.99', 'Available', '2023-08-10', 'Plump and sweet organic grapes.', 'images/grape1.jpg', 'images/grape2.jpg', 'images/grape3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(19, 'Organic Tomatoes', '2.29', 'Available', '2023-08-09', 'Vibrant and flavorful organic tomatoes.', 'images/tomato1.jpg', 'images/tomato2.jpg', 'images/tomato3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(20, 'Fresh Cucumbers', '1.79', 'Available', '2023-08-11', 'Crisp and cool organic cucumbers.', 'images/cucumber1.jpg', 'images/cucumber2.jpg', 'images/cucumber3.jpg', '2023-08-08 21:56:35', '2023-08-08 21:56:35', NULL),
(21, 'Organic Peaches', '2.79', 'Available', '2023-08-12', 'Sweet and succulent organic peaches.', 'images/peach1.jpg', 'images/peach2.jpg', 'images/peach3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:22:08', NULL),
(22, 'Fresh Bell Peppers', '1.99', 'Available', '2023-08-14', 'Colorful and crisp organic bell peppers.', 'images/bell_pepper1.jpg', 'images/bell_pepper2.jpg', 'images/bell_pepper3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:31:31', NULL),
(23, 'Organic Blueberries', '3.99', 'Available', '2023-08-13', 'Plump and antioxidant-rich organic blueberries.', 'images/blueberry1.jpg', 'images/blueberry2.jpg', 'images/blueberry3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:31:54', NULL),
(24, 'Sweet Pineapples', '4.49', 'Available', '2023-08-15', 'Juicy and tropical organic pineapples.', 'images/pineapple1.jpg', 'images/pineapple2.jpg', 'images/pineapple3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:32:16', NULL),
(25, 'Fresh Avocados', '2.89', 'Available', '2023-08-16', 'Creamy and nutritious organic avocados.', 'images/avocado1.jpg', 'images/avocado2.jpg', 'images/avocado3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:32:35', NULL),
(26, 'Organic Watermelons', '5.99', 'Available', '2023-08-17', 'Sweet and hydrating organic watermelons.', 'images/watermelon1.jpg', 'images/watermelon2.jpg', 'images/watermelon3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:32:54', NULL),
(27, 'Juicy Mangoes', '3.49', 'Available', '2023-08-18', 'Ripe and tropical organic mangoes.', 'images/mango1.jpg', 'images/mango2.jpg', 'images/mango3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:33:12', NULL),
(28, 'Organic Lettuce', '2.29', 'Available', '2023-08-19', 'Crisp and fresh organic lettuce leaves.', 'images/lettuce1.jpg', 'images/lettuce2.jpg', 'images/lettuce3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:40:02', NULL),
(29, 'Fresh Zucchinis', '1.79', 'Available', '2023-08-20', 'Versatile and nutritious organic zucchinis.', 'images/zucchini1.jpg', 'images/zucchini2.jpg', 'images/zucchini3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:40:17', NULL),
(30, 'Organic Potatoes', '2.59', 'Available', '2023-08-21', 'Wholesome and hearty organic potatoes.', 'images/potato1.jpg', 'images/potato2.jpg', 'images/potato3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:40:33', NULL),
(31, 'Organic Raspberries', '3.79', 'Available', '2023-08-22', 'Delicious and antioxidant-rich organic raspberries.', 'images/raspberry1.jpg', 'images/raspberry2.jpg', 'images/raspberry3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:40:50', NULL),
(32, 'Fresh Cauliflower', '2.39', 'Available', '2023-08-23', 'Nutrient-packed organic cauliflower florets.', 'images/cauliflower1.jpg', 'images/cauliflower2.jpg', 'images/cauliflower3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:41:03', NULL),
(33, 'Sweet Cherries', '4.99', 'Available', '2023-08-24', 'Juicy and delectable organic cherries.', 'images/cherry1.jpg', 'images/cherry2.jpg', 'images/cherry3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:41:15', NULL),
(34, 'Organic Lemons', '1.89', 'Available', '2023-08-25', 'Bright and zesty organic lemons.', 'images/lemon1.jpg', 'images/lemon2.jpg', 'images/lemon3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:41:35', NULL),
(35, 'Fresh Kiwis', '2.49', 'Available', '2023-08-26', 'Tangy and exotic organic kiwis.', 'images/kiwi1.jpg', 'images/kiwi2.jpg', 'images/kiwi3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:41:47', NULL),
(36, 'Organic Eggplants', '2.79', 'Available', '2023-08-27', 'Rich and versatile organic eggplants.', 'images/eggplant1.jpg', 'images/eggplant2.jpg', 'images/eggplant3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:42:01', NULL),
(37, 'Sweet Plums', '3.29', 'Available', '2023-08-28', 'Juicy and flavorful organic plums.', 'images/plum1.jpg', 'images/plum2.jpg', 'images/plum3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:42:20', NULL),
(38, 'Fresh Nectarines', '2.99', 'Available', '2023-08-29', 'Sweet and aromatic organic nectarines.', 'images/nectarine1.jpg', 'images/nectarine2.jpg', 'images/nectarine3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:42:33', NULL),
(39, 'Organic Onions', '1.79', 'Available', '2023-08-30', 'Flavorful and versatile organic onions.', 'images/onion1.jpg', 'images/onion2.jpg', 'images/onion3.jpg', '2023-08-10 13:18:10', '2023-08-10 13:42:52', NULL),
(40, 'Juicy Pears', '3.49', 'Available', '2023-08-31', 'Sweet and juicy organic pears.', 'images/pear1.jpg', 'images/pear2.jpg', 'images/pear3.jpg', '2023-08-10 13:18:10', '2023-08-10 14:03:15', NULL),
(41, 'Kochu shakh', '10.00', 'Available', '0000-00-00', 'Onak valo khete khali gola chulkai', 'images/kochu1.jpg', NULL, NULL, '2023-08-13 21:30:03', '2023-08-13 22:19:13', '1006'),
(42, 'Pumpkin', '44.00', 'Available', '0000-00-00', 'Organic pumpkin', 'images/pumpkin1.jpg', NULL, NULL, '2023-08-13 22:16:56', '2023-08-13 22:16:56', '1006'),
(43, 'Dragon', '77.00', '', '2023-08-17', 'Organic Dragon', 'images/dragon1.jpg', NULL, NULL, '2023-08-14 05:52:27', '2023-08-14 05:52:27', '1006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
