-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stay_finderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_register`
--

CREATE TABLE `a_register` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_register`
--

INSERT INTO `a_register` (`Username`, `Password`) VALUES
('adminstay', '$2y$10$GQWxLIQDoEg8PhwyJQ1bXeaOCMUfJGLKVxyrFHFczXyr6i2jX1zAy');

-- --------------------------------------------------------

--
-- Table structure for table `c_register`
--

CREATE TABLE `c_register` (
  `Uc_id` varchar(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(258) NOT NULL,
  `Mobile_no` char(15) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_register`
--

INSERT INTO `c_register` (`Uc_id`, `Username`, `Email`, `Mobile_no`, `Password`) VALUES
('C66eabd746', 'prakash', 'p@gmail.com', '9898457750', '$2y$10$..sp31T/frOrxhrvhQ1vveBYCnANxsrgm3CYZmO18OkkhJ9KsWNGO'),
('C66f7f42d5', 'kushal', 'k@gmail.com', '9898457750', '$2y$10$qIhp9xocPOtob4yU7i45DeRCRDsbA0OQmmgaWgovjssFPt8omQI.m'),
('C66fd388f3', 'adminstay', 'a@gmail.com', '12344567890', '$2y$10$GQWxLIQDoEg8PhwyJQ1bXeaOCMUfJGLKVxyrFHFczXyr6i2jX1zAy');

-- --------------------------------------------------------

--
-- Table structure for table `m_register`
--

CREATE TABLE `m_register` (
  `Um_id` varchar(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Hotel_id` varchar(10) NOT NULL,
  `Hotel_Name` varchar(20) NOT NULL,
  `Hotel_Address` text NOT NULL,
  `Hotel_Mobileno` char(15) NOT NULL,
  `Hotel_Bname` varchar(50) NOT NULL,
  `Hotel_AccountNo` char(20) NOT NULL,
  `Hotel_IFSCcode` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_register`
--

INSERT INTO `m_register` (`Um_id`, `Username`, `Email`, `Password`, `Hotel_id`, `Hotel_Name`, `Hotel_Address`, `Hotel_Mobileno`, `Hotel_Bname`, `Hotel_AccountNo`, `Hotel_IFSCcode`) VALUES
('M66ec1fc6c', 'prakash', 'n@gmail.com', '$2y$10$wyBlaAQIHoSgWy/lm/kQz.q2iD7Ft/xHDuL6rm4jhIowY9E76RLEC', 'H66ec1fc71', 'natraj', 'lodra,382835', '98998457750', 'Bank of Baroda', '101710100014574', 'BARB0LODRA'),
('M66ec2285c', 'kushal', 'k@gmail.com', '$2y$10$4ihJ8qzKqgCcyqUzWdSq4urRy4M2uL2du7YZ5myzJYz0VU.dCH4Zq', 'H66ec22861', 'natraj', 'lodre', '98998457750', 'Bank of Baroda', '101710100014574', 'BARB0LODRA'),
('M66ec27ba3', 'om', 'o@gmai.com', '$2y$10$/hm.gE6GAbZmtCYcYqLUfunHJrcakDd2Boo23rytRveWAei0vc33O', 'H66ec27baa', 'sdfg', 'sdfgdsg', 'sdgds', 'dsg', 'sdgsd', 'sdg'),
('M66f7e81e5', '', '', '$2y$10$ZzyeT4G/9vr/Ikt8mRf.lu9qlvIfOMalNXzWYwjacHBQ47P7Jbnsi', 'H66f7e81e6', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_register`
--
ALTER TABLE `c_register`
  ADD PRIMARY KEY (`Uc_id`);

--
-- Indexes for table `m_register`
--
ALTER TABLE `m_register`
  ADD PRIMARY KEY (`Um_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
