-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2018 at 09:20 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superdating`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `superhero_from` int(11) NOT NULL,
  `superhero_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `superhero_from`, `superhero_to`) VALUES
(17, 'Hey T\'challa.. You look really cool.. and sexy ;)', 1, 2),
(18, 'Hulk, I didn\'t know you where also here..', 1, 3),
(19, 'Woa, that nature in your picture is just stunning.. ', 1, 4),
(20, 'Nice underwear ;) ', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(6) NOT NULL,
  `to_name` varchar(60) NOT NULL,
  `from_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `age` int(6) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `superpower` varchar(100) NOT NULL,
  `location` varchar(60) NOT NULL,
  `description` varchar(150) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superheroes`
--

INSERT INTO `superheroes` (`id`, `name`, `age`, `gender`, `superpower`, `location`, `description`, `image`) VALUES
(1, 'Wonder Woman', 900, 'Female', 'Super strength, invulnerability, superhuman agility, healing factor, magic weaponry - you name it!', 'USA', 'If you need a strong woman in your life, Im the one you are looking for. I haven\'t been dating for a while, but now Im ready to find love again.', 'https://i.ytimg.com/vi/pi-W2UYaD9o/hqdefault.jpg'),
(2, 'Black Panther', 29, 'Male', 'I have superman powers every since I ate the heart-shaped herb! also have a lot of awesome gadges.', 'Wakanda', 'I am the king of Wakanda but you can just call me T\'challa. I like action but I have a gentle heart, and I promise I will treat you as a queen. ', 'https://longreadsblog.files.wordpress.com/2018/02/black-panther.jpg?w=1680'),
(3, 'Hulk', 35, 'male', 'Superstrength when I become very angry - then I can do nealy everything and never really get hurt.', 'USA', 'Call me Bruce.Im looking for that someone who can make the sun shine on my cloudy days. In return I will give you endless love and always protect you.', 'https://i.ytimg.com/vi/fNGSHrQDuA8/hqdefault.jpg'),
(4, 'Aquaman', 41, 'Male', 'Super strength, control over sea life, exceptional swimming ability, ability to breathe underwater.', 'Iceland', 'I want to settle down and Im looking for someone who wants to share the great nature of Iceland.', 'http://static.dnaindia.com/sites/default/files/styles/full/public/2017/10/15/617285-jason-momoa-aquaman-justice-league.jpg'),
(5, 'The Flash', 28, 'Male', '\r\nsuper speed, intangibility, superhuman agility', 'Central City', 'Im fast, really fast.. But dont worry, I have learned to controle it ;) ', 'https://i.kinja-img.com/gawker-media/image/upload/t_original/ygd8ibbtaoee9fbr3vda.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_from` (`superhero_from`),
  ADD KEY `superhero_to` (`superhero_to`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
