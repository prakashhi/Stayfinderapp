-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 04:51 PM
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
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `Payment_id` varchar(20) NOT NULL,
  `Room_id` varchar(20) NOT NULL,
  `Customer_id` varchar(20) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Hotel_id` varchar(30) NOT NULL,
  `Numberof_Memeber` int(11) NOT NULL,
  `Checkin_Date` varchar(20) NOT NULL,
  `Checkout_Date` varchar(20) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Transaction_Date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`Payment_id`, `Room_id`, `Customer_id`, `Customer_name`, `Hotel_id`, `Numberof_Memeber`, `Checkin_Date`, `Checkout_Date`, `Amount`, `Transaction_Date`) VALUES
('Pay67b71b482f3385.01', 'R67b71a87a', 'C66eabd746', 'Prakash', 'H6799f7bb2', 2, '2025-02-21', '2025-02-22', 7500, '2025-02-20 13:08:45'),
('Pay67bec4ced0c299.32', 'R67b09f461', 'C66eabd746', 'Prakash Prajapati', 'H6799f61b2', 4, '2025-02-27', '2025-03-01', 15798, '2025-02-26 08:37:56');

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
('C66eabd746', 'prakash', 'prakash398prajapati@gmail.com', '9898457750', '$2y$10$hhAao7TsDTOxtvqxASoFL.cH68py30DIBvEfMdKufb6wF2kf1gQbK'),
('C66f7f42d5', 'kushal', 'k@gmail.com', '9898457750', '$2y$10$qIhp9xocPOtob4yU7i45DeRCRDsbA0OQmmgaWgovjssFPt8omQI.m'),
('C66fd388f3', 'adminstay', 'a@gmail.com', '12344567890', '$2y$10$GQWxLIQDoEg8PhwyJQ1bXeaOCMUfJGLKVxyrFHFczXyr6i2jX1zAy'),
('C67bc67c95', 'suresh', 's@gmail.com', '1234567890', '$2y$10$1a7VVjEBbfyzfk73zITD7OD3MFCLlLtwGV4XaOvshBYWwArVxrnfy');

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
  `Hotel_IFSCcode` char(15) NOT NULL,
  `Verify_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_register`
--

INSERT INTO `m_register` (`Um_id`, `Username`, `Email`, `Password`, `Hotel_id`, `Hotel_Name`, `Hotel_Address`, `Hotel_Mobileno`, `Hotel_Bname`, `Hotel_AccountNo`, `Hotel_IFSCcode`, `Verify_status`) VALUES
('M6799f61b2', 'Aaqib', 'aaqib123@gmail.com', '$2y$10$Y37XhnvVg39cstksGiwkG.ybypZSrI9klnNHq.WgqrhNtWO58LbJu', 'H6799f61b2', 'Hotel Elysian Reside', 'Shahibaug | 6.9 km drive to Sardar Vallabhbhai Patel International Airport', '1234567890', 'Bank of India', '12345678910', 'ABCD123456800', ''),
('M6799f6f5a', 'Mihir', 'mihir123@gmail.com', '$2y$10$aZPBPOSLdfMcpmCAhxu3UuBMkaaugcoYMGXN4wdhzLyOItPXKxL5u', 'H6799f6f5a', ' Fairfield by Marrio', 'Ashram Road | 2.5 km drive to Sabarmati Ashram', '1234567890', 'State Bank of India', '12345678910', 'ABCD12136580200', ''),
('M6799f7bb1', 'Nadeem', 'nadeem123@gmail.com', '$2y$10$TYhCR5yx8ggfyuVXsiE5juI3VksOZey4rmsKf2pTlTYBdz3JGNtWm', 'H6799f7bb2', 'Grand Mercure, Ahmed', 'Gujarat International Finance Tec City | 12.4 km from city centre', '1234567890', 'ICICI', '12345678', 'ABCD12001300150', ''),
('M6799f8971', 'Meghal', 'ecommerce3112003+me@gmail.com', '$2y$10$chlFgD6CEgzdneaftsjrIe.2MLF8huPF82g9tzQQoRB4sLWtvz4qC', 'H6799f8972', 'The Eiffel Hotel & B', 'Gandhinagar | 10.4 km from city centre', '1234567890', 'ADC', '12345678910', 'ABCD14001500160', ''),
('M6799f94c2', 'Vraj', 'vraj123@gmail.com', '$2y$10$ShoDw8C0KDgGXLD5X5fnguRMlGsngD.mhstN.DTvq.UBjRjrWDVyq', 'H6799f94c3', 'The Fern Residency R', 'Near Rajkot Bus Stand', '1234567890', 'Bank of Baroda', '12345678910', 'ABCD15001600170', ''),
('M6799f9d8c', 'Pankaj', 'pankag123@gmail.com', '$2y$10$9ajteGm9DcpnyuJlD.oziu.Vi/A1SYbr0QdlAD1fozWVHbu2JpiMC', 'H6799f9d8d', 'Lords Eco Inn Shapar', 'Kotda Sangani | 16.5 km from Rajkot city centre', '1234567890', 'Dena Bank', '123455678910', 'ABCD16001700180', ''),
('M6799fab7b', 'Ramesh', 'ramesh123@gmail.com', '$2y$10$73Whdw2c3DejO.eh793te./z87RPvOJSL2ffJsQI2p34JdauyKGfi', 'H6799fab7c', 'Bhanu The Fern Fores', 'Alkapuri | 6 minutes walk to Vadodara Junction Railway Station', '1234567890', 'HDFC', '12345678910', 'ABCD18001900200', ''),
('M67b9c40f8', 'prakash', 'p@gmail.com', '$2y$10$RDRYMa8q5U8aj.ppthY2Vu3.lfJ3R.Tb1yHBxGU0Hv8qlkOA3NYPu', 'H67b9c40f9', 'fsdfds', 'fdsfsdf', 'asfsadfds', 'fsdfsdfds', '101710100014574', 'fsdfsdf', ''),
('M67bef7d5a', 'heloo', 'prakash398prajapati@gmail.com', '$2y$10$Lfc7q2UxdsWLiUzZ/yTkZO2OsbmdfkFhQWgVzZDOmaDETSHP/SOuK', 'H67bef7d5e', 'hotel heloo', 'lodra', '1234567890', 'bob', '1234567895123311', 'dsfsdhgdf5654', 'Verified');

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
  `Room_img1` varchar(100) NOT NULL,
  `Room_img2` varchar(100) NOT NULL,
  `Room_img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`Room_id`, `Hotel_id`, `Room_type`, `AC / NOAC`, `Price`, `Room_capacity`, `Booking_status`, `Room_img1`, `Room_img2`, `Room_img3`) VALUES
('R67b09bde7', 'H6799f61b2', 'Suite', 'AC', 6500, 'Single Room', 'Open', 'Img67b09bde7b16c1.77339027.webp', 'Img67b09bde7b5545.51224826.avif', 'Img67b09bde7b93c2.29257404.jpg'),
('R67b09f461', 'H6799f61b2', 'Deluxe Room', 'Non-Ac', 7899, 'Twin Room', 'Booked', 'Img67b09f461e0923.88556909.avif', 'Img67b09f461e47a0.03285091.webp', 'Img67b09f461e8627.60266160.avif'),
('R67b5b8eb4', 'H6799f8972', 'Standard Room', 'AC', 25002, 'Twin Room', 'Open', 'Img67b5b8eb4148b9.58453092.webp', 'Img67b5b8eb4242b5.03423745.jpg', 'Img67b5b8eb428139.82681318.webp'),
('R67b5b9196', 'H6799f8972', 'Suite', 'Non-Ac', 3000, 'Single Room', 'Open', 'Img67b5b919697ab7.93210179.avif', 'Img67b5b91969b937.29184353.webp', 'Img67b5b91969f7b4.05506901.avif'),
('R67b71a87a', 'H6799f7bb2', 'Suite', 'AC', 7500, 'Twin Room', 'Booked', 'Img67b71a879f80b7.63815752.avif', 'Img67b71a879fbf36.04663663.avif', 'Img67b71a879ffdb3.44771901.avif'),
('R67bef8217', 'H67bef7d5e', 'Deluxe Room', 'AC', 5200, 'Twin Room', 'Open', 'Img67bef821769824.43442058.webp', 'Img67bef82176d6a1.21368541.avif', 'Img67bef821771525.32602121.jpg');

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
