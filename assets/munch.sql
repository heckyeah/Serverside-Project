-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 12:45 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munch`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_info`
--

CREATE TABLE IF NOT EXISTS `additional_info` (
  `additional_info_id` mediumint(8) unsigned NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_info`
--

INSERT INTO `additional_info` (`additional_info_id`, `first_name`, `last_name`, `gender`, `profile_image`, `cover_image`, `age`, `user_id`) VALUES
(2, 'Hekiera', 'Mareroa', 'M', 'default.jpg', 'placeholder_cover.jpg', '22', 1),
(3, 'Jack', 'Sparrow', 'M', 'default.jpg', 'placeholder_cover.jpg', '35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `beef`
--

CREATE TABLE IF NOT EXISTS `beef` (
  `meat_id` tinyint(3) unsigned NOT NULL,
  `meat_item` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beef`
--

INSERT INTO `beef` (`meat_id`, `meat_item`) VALUES
(1, 'Beef Patty'),
(2, 'Beef Steak'),
(3, 'Beef Mince');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comments_id` int(10) unsigned NOT NULL,
  `post` varchar(300) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `favorites_id` int(10) unsigned NOT NULL,
  `favorite` int(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredients_id` smallint(5) unsigned NOT NULL,
  `meat_id` tinyint(3) unsigned NOT NULL,
  `veges_id` tinyint(3) unsigned NOT NULL,
  `starch_id` tinyint(3) unsigned NOT NULL,
  `dairy_id` tinyint(3) unsigned NOT NULL,
  `spices_id` tinyint(3) unsigned NOT NULL,
  `etc_id` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meat`
--

CREATE TABLE IF NOT EXISTS `meat` (
  `chicken_id` tinyint(4) unsigned NOT NULL,
  `beef_id` tinyint(4) unsigned NOT NULL,
  `pork_id` tinyint(4) unsigned NOT NULL,
  `meat_id` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` smallint(5) unsigned NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(160) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `description`, `name`) VALUES
(1, 'Munch | Home Page', 'This is the homepage.', 'home'),
(2, 'Munch | About Us', 'This is the About Page.', 'about'),
(3, 'Munch | Contact Us', 'This is the Contact Page.', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `recipe_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `directions` varchar(2000) NOT NULL,
  `ingredients_id` smallint(10) unsigned NOT NULL,
  `recipe_image` varchar(100) NOT NULL,
  `cook_time` varchar(3) NOT NULL,
  `serves` enum('1-2','3-4','5+') NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `favorite_id` int(10) unsigned NOT NULL,
  `comments_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `directions`, `ingredients_id`, `recipe_image`, `cook_time`, `serves`, `user_id`, `favorite_id`, `comments_id`, `time`) VALUES
(4, 'Mac And Cheese', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam maximus molestie leo. Nulla facilisi. Nulla laoreet facilisis nisi. Mauris sit amet viverra sem. Curabitur feugiat, tortor id gravida auctor, nulla nunc pretium magna, consequat mollis sem leo non leo. Integer sed suscipit purus. Integer justo arcu, ultricies vitae tristique et, lacinia ac libero.\r\n\r\nAenean odio sapien, vestibulum vel dui sed, tincidunt viverra turpis. Aliquam suscipit leo sed volutpat pretium. Ut convallis tincidunt eros in sodales. Donec blandit, massa ac viverra commodo, quam diam eleifend lacus, in rutrum arcu urna vel risus. Integer vestibulum eros mi, a blandit arcu fermentum id. Sed sodales sem quis ante vehicula, sed suscipit nulla viverra. Duis at condimentum urna, et condimentum metus. Praesent leo erat, volutpat cursus nisi ut, mollis vestibulum orci. Nunc condimentum, turpis consectetur sagittis dignissim, magna turpis ultrices mi, eget auctor elit tellus vitae enim. Curabitur ac mi sapien. Etiam id maximus risus.\r\n\r\nSuspendisse imperdiet sollicitudin cursus. Etiam sagittis nulla vel est rutrum malesuada. Nulla quis lacus in sem commodo aliquam ut lacinia risus. Phasellus vitae diam maximus, porta felis vitae, suscipit ligula. In hac habitasse platea dictumst. In eleifend, metus eu cursus pellentesque, metus enim sollicitudin odio, vitae pretium arcu tellus eu mauris. Fusce non sollicitudin eros, sit amet iaculis orci. Praesent volutpat elit et nisl suscipit, ac iaculis arcu posuere. Phasellus in libero a dolor varius sagittis. Vestibulum pellentesque lectus eu ullamcorper condimentum. In convallis accumsan elit, eget iaculis nisi pulvinar eu.', 0, 'MacAndCheese.jpg', '15', '1-2', 1, 0, 0, '2015-07-31 11:22:04'),
(6, 'Spaghetti Bolognese', 'This is called spagbowl.', 0, 'spagBowl.jpg', '25', '3-4', 2, 0, 0, '2015-07-31 11:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@munch.co.nz'),
(2, 'user', 'user', 'user@munch.co.nz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD PRIMARY KEY (`additional_info_id`),
  ADD KEY `User_ID` (`user_id`);

--
-- Indexes for table `beef`
--
ALTER TABLE `beef`
  ADD PRIMARY KEY (`meat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorites_id`),
  ADD KEY `User_ID` (`user_id`),
  ADD KEY `Recipe_ID` (`recipe_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredients_id`);

--
-- Indexes for table `meat`
--
ALTER TABLE `meat`
  ADD PRIMARY KEY (`meat_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `User_ID` (`user_id`) USING BTREE,
  ADD KEY `Comments_ID` (`comments_id`),
  ADD KEY `Ingredients_ID` (`ingredients_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_info`
--
ALTER TABLE `additional_info`
  MODIFY `additional_info_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `beef`
--
ALTER TABLE `beef`
  MODIFY `meat_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorites_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meat`
--
ALTER TABLE `meat`
  MODIFY `meat_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD CONSTRAINT `additional_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
