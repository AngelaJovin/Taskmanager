-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 08:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `passresets`
--

CREATE TABLE `passresets` (
  `ID` int(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passresets`
--

INSERT INTO `passresets` (`ID`, `Email`, `Token`) VALUES
(NULL, 'angelamwemezi@gmail.com', 'e5e378c298e5ccdf8905bcd20ef7a002e337ff9683a32e5fd6826f1abf3f6dba633fb50b0513871de51f121053f8c3697343');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `AssignedTo` varchar(40) NOT NULL,
  `AssignedBy` varchar(40) DEFAULT NULL,
  `Owner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `Title`, `AssignedTo`, `AssignedBy`, `Owner`) VALUES
(1, 'df', 'jm@gmail.com', 'com@gmail.com', 'james@code.com'),
(2, 'ioj', 'jm@gmail.com', 'com@gmail.com', 'james@code.com'),
(3, 'ioj', 'jm@gmail.com', 'com@gmail.com', 'james@code.com'),
(5, 'hiuyhi', 'jm@gmail.com', 'com@gmail.com', '4@a.c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Privilege` int(2) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`, `Privilege`) VALUES
(1, 'angelamwemezi@gmail.com', '12345', 0),
(2, 'epicjovin@gmail.com', '12345', 0),
(4, 'n@a.c', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(5, 'james@code.com', 'b4cc344d25a2efe540adbf2678e2304c', 0),
(6, 'a@a.c', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(7, 'n2@a.c', 'c81e728d9d4c2f636f067f89cc14862c', 0),
(8, '1@a.c', 'e1d2c5c77d78e2673ad981373b954e6a', 0),
(9, '4@a.c', 'a87ff679a2f3e71d9181a67b7542122c', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passresets`
--
ALTER TABLE `passresets`
  ADD PRIMARY KEY (`Token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
