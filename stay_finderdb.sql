-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 05:06 PM
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
('M6799f61b2', 'Aaqib', 'aaqib123@gmail.com', '$2y$10$Y37XhnvVg39cstksGiwkG.ybypZSrI9klnNHq.WgqrhNtWO58LbJu', 'H6799f61b2', 'Hotel Elysian Reside', 'Shahibaug | 6.9 km drive to Sardar Vallabhbhai Patel International Airport', '1234567890', 'Bank of India', '12345678910', 'ABCD123456800'),
('M6799f6f5a', 'Mihir', 'mihir123@gmail.com', '$2y$10$aZPBPOSLdfMcpmCAhxu3UuBMkaaugcoYMGXN4wdhzLyOItPXKxL5u', 'H6799f6f5a', ' Fairfield by Marrio', 'Ashram Road | 2.5 km drive to Sabarmati Ashram', '1234567890', 'State Bank of India', '12345678910', 'ABCD12136580200'),
('M6799f7bb1', 'Nadeem', 'nadeem123@gmail.com', '$2y$10$TYhCR5yx8ggfyuVXsiE5juI3VksOZey4rmsKf2pTlTYBdz3JGNtWm', 'H6799f7bb2', 'Grand Mercure, Ahmed', 'Gujarat International Finance Tec City | 12.4 km from city centre', '1234567890', 'ICICI', '12345678', 'ABCD12001300150'),
('M6799f8971', 'Meghal', 'meghal123@gmail.com', '$2y$10$chlFgD6CEgzdneaftsjrIe.2MLF8huPF82g9tzQQoRB4sLWtvz4qC', 'H6799f8972', 'The Eiffel Hotel & B', 'Gandhinagar | 10.4 km from city centre', '1234567890', 'ADC', '12345678910', 'ABCD14001500160'),
('M6799f94c2', 'Vraj', 'vraj123@gmail.com', '$2y$10$ShoDw8C0KDgGXLD5X5fnguRMlGsngD.mhstN.DTvq.UBjRjrWDVyq', 'H6799f94c3', 'The Fern Residency R', 'Near Rajkot Bus Stand', '1234567890', 'Bank of Baroda', '12345678910', 'ABCD15001600170'),
('M6799f9d8c', 'Pankaj', 'pankag123@gmail.com', '$2y$10$9ajteGm9DcpnyuJlD.oziu.Vi/A1SYbr0QdlAD1fozWVHbu2JpiMC', 'H6799f9d8d', 'Lords Eco Inn Shapar', 'Kotda Sangani | 16.5 km from Rajkot city centre', '1234567890', 'Dena Bank', '123455678910', 'ABCD16001700180'),
('M6799fab7b', 'Ramesh', 'ramesh123@gmail.com', '$2y$10$73Whdw2c3DejO.eh793te./z87RPvOJSL2ffJsQI2p34JdauyKGfi', 'H6799fab7c', 'Bhanu The Fern Fores', 'Alkapuri | 6 minutes walk to Vadodara Junction Railway Station', '1234567890', 'HDFC', '12345678910', 'ABCD18001900200');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `Room_id` varchar(10) NOT NULL,
  `Hotel_id` varchar(10) NOT NULL,
  `Room_type` varchar(20) NOT NULL,
  `AC / NOAC` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Room_capacity` varchar(30) NOT NULL,
  `Booking_status` varchar(10) NOT NULL,
  `Room_img1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`Room_id`, `Hotel_id`, `Room_type`, `AC / NOAC`, `Price`, `Room_capacity`, `Booking_status`, `Room_img1`) VALUES
('R679a4aaa1', 'H66ec1fc71', 'Standard Room', 'Non-Ac', 3000, 'Single Room', 'Open', 'Img679a4aaa1a35d8.51813075.png'),
('R679a4ae97', 'H6799f6f5a', 'Deluxe Room', 'AC', 5000, 'Twin Room', 'Open', 'Img679a4ae9779ff6.40108726.jpg'),
('R679a4fb52', 'H6799f6f5a', 'Standard Room', 'Non-Ac', 2000, 'Single Room', 'Open', 'Img679a4fb5085925.63314181.jpg'),
('R679a4fe24', 'H6799f6f5a', 'Family Room', 'AC', 5000, 'Family Room', 'Open', 'Img679a4fe24a2a87.39488249.jpg'),
('R679a503e8', 'H6799f61b2', 'Suite', 'Non-Ac', 4500, 'Twin Room', 'Open', 'Img679a503e7fb324.45596340.jpg');

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
