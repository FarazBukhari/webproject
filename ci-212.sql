-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2013 at 12:19 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci-212`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_key`
--

CREATE TABLE IF NOT EXISTS `tbl_key` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(255) DEFAULT NULL,
  `name` VARCHAR(255) DEFAULT NULL,
  `value` VARCHAR(255) DEFAULT NULL,
  `userid` INT(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `tbl_key`
--

INSERT INTO `tbl_key` (`id`, `type`, `name`, `value`, `userid`) VALUES
(110, 'MF', 'filename', 'HEROES', 3),
(111, 'MF', 'filename', 'CB', 2),
(114, 'MC', 'key', 'f0b2c40dff0dcc632215804f8c5a82b6-us5', NULL),
(115, 'MC', 'list', '932f4e7a80', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `username`, `password`) VALUES
(2, 'admin', 'admin', 'admin', 'admin'),
(3, 'shani', 'jahania', 'shani', 'shani');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


DELIMITER $$
 
CREATE PROCEDURE GetCustomers()
BEGIN
    SELECT fname, lname
    FROM users;
    END$$

DELIMITER ;

DELIMITER $$
CREATE PROCEDURE M
		@f VARCHAR(250) output, 
		@username VARCHAR(250)
		AS
		BEGIN
		SELECT @fname = fname
		FROM users
		WHERE username = @username
		END
		
DELIMITER ;