-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 05:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `puidUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `puidUsers`) VALUES
(1, '123', '123@gmail.com', '$2y$10$/uEH3RfLHo1t7Hy88aePLOLyhstVQp3VwIxLbueDKU/CiuprjLcry'),
(2, 'mysql', 'mysql@gmail.com', '$2y$10$yukgBZfvwDL1./NFLr34zO7DzuURzsS8EvvOlsvVu4M2f.I2NCQbe'),
(3, '12345', '123456@gmail.com', '$2y$10$wO4HW6VJ9dtPNWho6KP0i.NambQBIz/.yEdW0FthWCMssdECJMkmC'),
(4, 'test', 'test@gmail.com', '$2y$10$4OLUz63Y.UthK3CynrESS.PCAziNTy5X6XbuPEPSc8OcE7XGb783m'),
(5, 'test1', 'test1@gmail.com', '$2y$10$2ImYNUTVqDn1eImtpBZO7.H0IdKcboI47UwhfyC1QYK1QbtQ4ejWO'),
(6, 'newadmin', 'newadmin@gmail.com', '$2y$10$3mlba9TZArS4aLKtUjT5sehHnX.MlJfBUDOt2CQkvYEf0mlzw/wGu'),
(7, 'momo', 'momo@gmail.com', '$2y$10$zU6.lDuJIZ.9r5BbnwYn.OsCQUxF0UKqXsFMV5pNI0saRASAsVvua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
