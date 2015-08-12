-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2015 at 05:30 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `bio` varchar(400) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `additional_info`
--

INSERT INTO `additional_info` (`additional_info_id`, `first_name`, `last_name`, `bio`, `gender`, `profile_image`, `cover_image`, `age`, `user_id`) VALUES
(2, 'Hekiera', 'Mareroa', '', 'M', '55caa7b6609cc7.60093089Untitled-1.jpg', '55c823b922e416.21415171SpiderMan.jpg', '22', 1),
(3, 'Jack', 'Sparrow', '', 'M', 'default.jpg', 'placeholder_cover.jpg', '35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comments_id` int(10) unsigned NOT NULL,
  `post` varchar(300) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
`favorites_id` int(10) unsigned NOT NULL,
  `favorite` int(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
`ingredients_id` smallint(5) unsigned NOT NULL,
  `ingredient_name` varchar(40) NOT NULL,
  `type` enum('meat','vegetable','dairy','starch','fruit','etc') NOT NULL,
  `alpha_order` enum('a','b','c','d','e') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredients_id`, `ingredient_name`, `type`, `alpha_order`) VALUES
(1, 'Beef Steak', 'meat', 'a'),
(2, 'Beef Patty', 'meat', 'a'),
(3, 'Carrot', 'vegetable', 'b'),
(4, 'Bread', 'starch', 'c'),
(5, 'Pasta', 'starch', 'c'),
(6, 'Milk', 'dairy', 'd'),
(7, 'Creame', 'dairy', 'd'),
(8, 'Cheese', 'dairy', 'd'),
(9, 'Tomato Sauce', 'etc', 'e'),
(10, 'Olive Oil', 'etc', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`page_id` smallint(5) unsigned NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(160) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  `recipe_image` varchar(100) NOT NULL,
  `cook_time` varchar(3) NOT NULL,
  `serves` enum('1-2','3-4','5+') NOT NULL,
  `recipe_video` varchar(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `favorite_id` int(10) unsigned NOT NULL,
  `comments_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `directions`, `recipe_image`, `cook_time`, `serves`, `recipe_video`, `user_id`, `favorite_id`, `comments_id`, `time`) VALUES
(23, 'Mac And Cheese', 'This is a mac and cheese recipe', '55c9570268a799.08300378SpiderMan.jpg', '32', '3-4', 'NNudfQuu9qI', 1, 0, 0, '2015-08-11 01:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipe_ingredients` (
`recipe_ingredients_id` int(10) unsigned NOT NULL,
  `ingredients_id` smallint(6) unsigned NOT NULL,
  `recipe_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipe_ingredients_id`, `ingredients_id`, `recipe_id`) VALUES
(115, 4, 23),
(116, 5, 23),
(117, 6, 23),
(118, 8, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` mediumint(8) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privilege` enum('admin','user') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('enabled','disabled') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `privilege`, `creation_date`, `active`) VALUES
(1, 'admin', '$2y$10$ldjZoQrSDpHLkkX0cYObUuN01yIQJUS5Xy0w09DUeMG/c13xqFj8q', 'admin@munch.co.nz', 'admin', '2015-08-03 00:23:48', 'enabled'),
(2, 'user', '$2y$10$9nbE5hHwactVfijPvt/mfeh1cc9F1CF4HYuQ618WCVMyWO5bBkdii', 'user@munch.co.nz', 'user', '2015-08-03 00:23:48', 'enabled'),
(3, 'Hekiera', '$2y$10$wxRS.hdJEIcX/b0eS3yriOeUsQFV3HDzLsAUMfEP65HHIYsl/j19.', 'h@h.com', 'user', '2015-08-03 01:28:56', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_info`
--
ALTER TABLE `additional_info`
 ADD PRIMARY KEY (`additional_info_id`), ADD KEY `User_ID` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comments_id`), ADD KEY `User_ID` (`user_id`), ADD KEY `Recipe_ID` (`recipe_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
 ADD PRIMARY KEY (`favorites_id`), ADD KEY `User_ID` (`user_id`), ADD KEY `Recipe_ID` (`recipe_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
 ADD PRIMARY KEY (`ingredients_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
 ADD PRIMARY KEY (`recipe_id`), ADD KEY `User_ID` (`user_id`) USING BTREE, ADD KEY `Comments_ID` (`comments_id`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
 ADD PRIMARY KEY (`recipe_ingredients_id`), ADD KEY `ingredients_id` (`ingredients_id`), ADD KEY `recipe_id` (`recipe_id`);

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
MODIFY `ingredients_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `page_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
MODIFY `recipe_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
MODIFY `recipe_ingredients_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_info`
--
ALTER TABLE `additional_info`
ADD CONSTRAINT `additional_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
ADD CONSTRAINT `recipe_ingredients_ibfk_1` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`ingredients_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `recipe_ingredients_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
