-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2021 at 07:13 AM
-- Server version: 8.0.25
-- PHP Version: 7.4.20RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indianbrasserie`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` float(5,3) NOT NULL,
  `product_description` varchar(255) COLLATE utf8_bin NOT NULL,
  `suspend` varchar(255) COLLATE utf8_bin NOT NULL,
  `cid` int NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `product_description`, `suspend`, `cid`, `url`) VALUES
(1, 'Onion Bhajia', 6.900, 'Onion rings coated in a spice chickpea batter, fried until crisp and served with tamarind sauce.', 'Active', 1, 'onion_bhaji.jpg'),
(2, 'Vegetables Pakoras', 6.900, 'Seasonal vegetables coated in chickpea flour batter blended with ground whole spice and fried, served with tamarind sauce.', 'Active', 1, 'vegetables_pakoras.jpg'),
(3, 'Vegetarian Samosa', 7.500, 'Homemade crispy pastry jacket filled with spiced potatoes, mixed fruit and green peas, served with tamarind sauce', 'Active', 1, 'vegetarian_samosa.jpg'),
(4, 'Cheese Pakora', 7.900, 'Homemade cheese coated in chickpea flour with herbs & spices, deep fried and served with a Tamarind Chutney', 'Active', 1, 'cheese_pakora.jpg'),
(5, 'Mixed Vegetarian Entree', 9.900, 'One piece of each: Vegetarian Pakora, Samosa, Cheese Pakora and Onion Bhajia, served with tamarind sauce', 'Active', 1, ''),
(6, 'Tandoori Chicken', 8.500, 'Chicken marinated in yoghurt, various herbs and spice, barbequed in the tandoor, served with mint sauce', 'Active', 1, 'tandoori_chicken.jpg'),
(7, 'Fish Tikka', 11.900, 'Fish fillets marinated with Indian spices and yogurt, grilled in tandoor.', 'Active', 1, 'fish_tikka.jpg'),
(8, 'Chicken Tikka', 8.500, 'Chicken pieces marinated in fresh yoghurt, herbs and mild spices barbequed in the tandoor, served with mint sauce.', 'Active', 2, ''),
(9, 'Mix Non Veg Platter', 13.500, 'One piece each of chicken tikka, garlic chicken tikka ,Seekh kabab and fish tikka served with mint sauce', 'Active', 2, ''),
(10, 'Tandoori Prawns', 13.500, 'King prawns marinated in yoghurt & mild spices, lemon juice barbecued in tandoor, served with mint sauce.', 'Active', 2, ''),
(11, 'Garlic Prawns', 13.500, 'King prawns marinated with garlic, cream & other mild spices, roasted in tandoor', 'Active', 2, ''),
(12, 'Garlic Tikka', 9.000, 'Chicken marinated in roasted garlic, cream & mild spices, barbecued in Tandoor & served with salad & mint sauce.', 'Active', 2, ''),
(13, 'Goan Fish Curry', 15.500, 'A specialty Of Goa, cooked in kashmiri chilli, turmeric, coconut, curry leaves and tamarind in satin smooth gravy from Western India.', 'Active', 3, ''),
(14, 'Prawn Taka Tak', 19.900, 'ing Prawns cooked with garlic, onion and capsicum with a touch of cr�me and herbs.', 'Active', 3, ''),
(15, 'Prawn Masala', 19.900, 'King Prawns cooked with curry leaves, mustard seeds, coconut and a dash of cream.', 'Active', 3, ''),
(16, 'Prawn Madras', 19.900, 'King Prawns cooked with curry leaves, mustard seeds, coconut and a dash of cream.', 'Active', 3, ''),
(17, 'Prawn Korma', 19.900, 'Prawns cooked in a rich cashew nut gravy with mild spices and a dash of cream', 'Active', 3, ''),
(18, 'Prawn Vindaloo', 19.900, 'Prawns cooked in a hot sauce with spices and a dash of lemon juice. Can be served Medium.', 'Active', 3, ''),
(19, 'Fish Korma', 15.500, 'Tender pieces of fish cooked in cashew nut gravy sauce with mild spices and a dash of cream.', 'Active', 3, ''),
(20, 'Fish Vindaloo', 14.900, '', 'Active', 3, ''),
(21, 'Butter Chicken', 14.500, 'boneless pieces of chicken tikka cooked in a tomato based gravy, flavoured with cardamom and cashew nut sauce', 'Active', 4, ''),
(22, 'Chicken Vindaloo', 14.500, 'boneless chicken cooked in ginger, a selection of freshly ground spices, red chillies and a dash of vinegar', 'Active', 4, ''),
(23, 'Chicken Korma', 14.500, 'boneless pieces of chicken prepared in cashew nuts gravy and combined with mild aromatic spices. This dish is smooth & mild', 'Active', 4, ''),
(24, 'Chicken Saagwala', 14.500, 'chicken cooked with garlic & mustard seeds with various homemade spices with fresh spinach & a dash of cream', 'Active', 4, ''),
(25, 'Chicken Kadai', 14.500, 'boneless pieces of chicken saut� with tomato, onions, capsicum,pepper and fresh herbs, cooked in masala gravy', 'Active', 4, ''),
(26, 'Mango Chicken', 14.500, 'boneless chicken pieces cooked in tomato based gravy, cashew nuts, mango and a dash of cream', 'Active', 4, ''),
(27, 'Chick Tikka Masala', 14.500, 'chicken tikka pieces tossed with capsicum and onion, mixed with an onion and tomato gravy, with a dash of cream (contains cashew nuts)', 'Active', 4, ''),
(28, 'Chicken Madras', 14.500, 'chicken cooked in a coconut based gravy, with mustard seeds &curry leaves, mixed with a special Masala sauce', 'Active', 4, ''),
(29, 'Lamb Rara Punjabi', 14.900, 'lamb mixed with lamb mince, cumin, tomato & onion with a touch of lemon & spices.', 'Active', 5, ''),
(30, 'Lamb Roganjosh', 14.900, 'lamb pieces cooked in rich gravy of tomato and onion with various spices for a magnificent flavour', 'Active', 5, ''),
(31, 'Lamb Vindaloo', 14.900, 'cubes of lamb cooked in ginger, a selection of freshly groundspices, red chillies, and a dash of vinegar... this hot dish is well known to hot food lovers', 'Active', 5, ''),
(32, 'Lamb Shanks', 19.900, 'Shanks cooked in tomato and onion gravy, mixedwith various home make spices', 'Active', 5, ''),
(33, 'Lamb Korma', 14.900, 'a creamy dish of lamb cubes braised with rich almond gravy with a touch of saffron and mild spices', 'Active', 5, ''),
(34, 'Lamb Saagwala', 14.900, 'pure fresh spinach cooked with cubes of lamb, onions, tomatoes and a selection of spices including roasted mustard seeds to produce this unforgettable dish', 'Active', 5, ''),
(35, 'Beef Vindaloo', 14.800, 'cubes of beef cooked in ginger, a selection of freshly ground spices, red chillies, and a dash of vinegar... this hot dish is well known to hot food lovers', 'Active', 6, ''),
(36, 'Beef Roganjosh', 14.800, 'beef pieces cooked in rich gravy of tomato and onion with various spices for a magnificent flavour', 'Active', 6, ''),
(37, 'Beef Korma', 14.800, 'a creamy dish of beef cubes braised in rich almond gravy with a touch of saffron and mild spices', 'Active', 6, ''),
(39, 'Beef Madras', 14.800, 'beef cooked with curry leaf, mustard seeds & coconut cream with rich madras flavours', 'Active', 6, ''),
(40, 'Daal Makhani', 11.500, 'north India specialty from punjab. A selection of lentils cooked with ginger and coriander combined with home style spices', 'Active', 7, ''),
(41, 'Shahi Paneer', 11.900, 'cottage cheese cooked to perfection in a cashew nut and tomato based gravy', 'Active', 7, ''),
(42, 'Channa Masala', 11.500, 'chick pea and potato in a tomato based masala sauce', 'Active', 7, ''),
(43, 'Saag Paneer', 11.900, 'cheese in a sauce of spinach, mixed with garlic & mustard seeds and a dash of cream', 'Active', 7, ''),
(44, 'Saag Aloo', 11.500, 'potato mixed with garlic & mustard seeds tossed with fresh spinach with a dash of cream', 'Active', 7, ''),
(45, 'Aloo Gobhi', 11.500, 'a punjabi favourite of cauliflower and spiced potatoes, wok fried with onions, fresh herbs and spices', 'Active', 7, ''),
(47, 'Navratan Korma', 11.900, 'mixed vegetables tossed in butter, cooked in rich cashew nut gravy combined with dried fruit.', 'Active', 7, ''),
(48, 'Vegetable Korma', 11.900, 'mixed vegetables tossed in butter, cooked in rich cashew nut gravy combined with dried fruit.', 'Active', 7, ''),
(49, 'Mixed Veg Curry', 10.900, 'combination of seasonal vegetables cooked in fresh herbs, garlic, tomatoes with a blend of unique spices with a dash of cream', 'Active', 7, ''),
(50, 'Matter Paneer', 11.900, 'peas & cheese cooked in a homemade style with masala gravy and a dash of cream.', 'Active', 7, ''),
(51, 'Kadai Paneer', 11.900, '', 'Active', 7, ''),
(52, 'Malai Kofta', 11.900, '', 'Active', 7, ''),
(53, 'Plain Naan', 2.500, 'fine plain flour bread baked in tandoor', 'Active', 8, ''),
(54, 'Butter Naan', 2.600, 'fine butter flour bread baked in tandoor', 'Active', 8, ''),
(55, 'Garlic Naan', 3.000, 'buttered naan dressed in garlic and baked in tandoor', 'Active', 8, ''),
(56, 'Keema Naan', 3.900, 'naan stuffed with spiced mince lamb and herbs baked in tandoor', 'Active', 8, ''),
(57, 'Tandoori Roti', 2.900, 'whole meal tandoori baked bread', 'Active', 8, ''),
(58, 'Stuffed Kulcha', 3.500, 'naan stuffed with onion & spiced potato baked in tandoor', 'Active', 8, ''),
(59, 'Kashmiri Naan', 3.900, 'naan stuffed with dried fruit and nuts baked in tandoor', 'Active', 8, ''),
(60, 'Vindaloo Naan', 3.500, 'naan with vindaloo sauce topping', 'Active', 8, ''),
(61, 'Cheese Naan', 4.000, 'naan stuffed with cheese, baked in tandoor', 'Active', 8, ''),
(62, 'Garlic Cheese Naan', 4.200, 'naan stuffed with cheese & top coated with roasted garlic', 'Active', 8, ''),
(63, 'Cheese Chilly Garli Naan', 4.500, 'cheese stuffed naan & top coated with roasted chilli garlic', 'Active', 8, ''),
(64, 'Naan Basket', 8.500, '', 'Active', 8, ''),
(65, 'Kashmiri Pulao', 8.900, 'various vegetables � peas, carrots, broccoli, cauliflower, capsicum, mixed with cashews, fruit mix & almond flakes', 'Active', 9, ''),
(66, 'Saffron Rice', 3.600, 'aromatic rice with roasted cumin and saffron', 'Active', 9, ''),
(67, 'Steamed Rice', 2.900, '', 'Active', 9, ''),
(68, 'Fried Rice - Indian Style', 9.900, 'with chicken & vegetables', 'Active', 9, ''),
(69, 'Vegetable Plao', 8.000, 'Rice cooked with seasonal vegetables & combined with various spices.', 'Active', 9, ''),
(70, 'Green Salad', 5.900, 'a selection of greens including cucumber, tomatoes and spinach onion with a vinaigrette dressing.', 'Active', 10, ''),
(71, 'Kachumber Salad', 5.900, 'diced salad of cucumber, onion & tomato mixed with a vinaigrette dressing and salad spices', 'Active', 10, ''),
(72, 'Papadums', 3.000, '', 'Active', 11, ''),
(73, 'Mixed Pickles', 2.500, '', 'Active', 11, ''),
(74, 'Vindaloo Chutney', 2.500, '', 'Active', 11, ''),
(75, 'Raita', 2.500, 'natural homemade cucumber yoghurt', 'Active', 11, ''),
(76, 'Mango Chutney', 2.500, '', 'Active', 11, ''),
(77, 'Gulab Jamun', 6.900, 'milk dumplings made from evaporated milk, fried and dipped inflavoured sugar syrup', 'Active', 11, ''),
(78, 'Nutella Naan', 4.900, '', 'Active', 11, ''),
(79, 'Nuggets with Chips', 9.900, '', 'Active', 13, ''),
(80, 'Spring Rolls with Chips', 9.900, '', 'Active', 13, ''),
(81, 'Kids Chicken Tikka', 9.900, '', 'Active', 13, ''),
(82, 'Fish & Chips', 9.900, '', 'Active', 13, ''),
(83, 'Chips', 5.000, '', 'Active', 13, ''),
(84, 'Butter Chicken (Kids)', 9.900, '', 'Active', 13, ''),
(85, 'Mango Lassi', 3.500, '', 'Active', 14, ''),
(86, 'Iced Tead', 3.500, '', 'Active', 14, ''),
(87, '2 Liter Soft Drink', 5.900, '', 'Active', 14, ''),
(88, 'Sparkling Water', 4.500, '', 'Active', 14, ''),
(89, 'Kids Drinks', 3.000, 'Various flavours.', 'Active', 14, ''),
(90, 'Mountain Fresh Juices', 4.000, 'various flavours.', 'Active', 14, ''),
(92, 'Red bull', 4.000, 'Gives you Wings', 'Active', 14, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
