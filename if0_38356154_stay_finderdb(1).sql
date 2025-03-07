-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql303.infinityfree.com
-- Generation Time: Mar 07, 2025 at 07:53 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38356154_stay_finderdb`
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
('Pay67c3f7906a7302.34', 'R67c02ee27', 'C67c3f6e50', 'Ansari Zafar ', 'H67c02e4ee', 2, '2025-03-04', '2025-03-05', 3600, '2025-03-02 01:15:46'),
('Pay67ca7e2c289be7.61', 'R67c031829', 'C67c02bfde', 'Nadeem', 'H67c030a06', 1, '2025-03-08', '2025-03-10', 50000, '2025-03-07 00:03:40');

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
('C67c02be73', 'prakash', 'prakash398prajapati@gmail.com', '1234567890', '$2y$10$rDNbgcygfOWswLoxRCSd8uXMtTQBdWR1wrnu4i.tPWP2Tn212tJ/O'),
('C67c02bfde', 'Nadeem26', 'makwananadeem0@gmail.com', '8849742758', '$2y$10$LJEOEPNHUV8tAj5KEpgx4eXl5bmX9oPXi.XSK3G.Oksynwqc6VCjq'),
('C67c02c2ba', 'meghal', 'meghal7310@gmail.com', '1234567890', '$2y$10$9iLw2Te5dosBuPylhXPXNOXr63JD/vI6ifNhi4T4Oi.Gx77AVRHGq'),
('C67c02c53b', 'Om', 'kadiaom30@gmail.com', '1234567890', '$2y$10$DUjKNzcORwBaoXABS9PNtO0BKZ529z5o1lk2wqyoagL2UTLptWLC2'),
('C67c15623c', 'Sohel', 'sohelkhan133@gmail.com', '9714501908', '$2y$10$OcYYzcCfP.5TyoH4ve4D9.O9LOXfYWAS1.3dIW7cthdotsd4jerHS'),
('C67c3f6e50', 'Zafar', 'qansarizafar8866@gmail.com', '8866365214', '$2y$10$4r9xUTwSvaoZ17iw9KDg1O.3zDceK8W5mqfE9AdauOVIeKpnxehsy');

-- --------------------------------------------------------

--
-- Table structure for table `discount_list`
--

CREATE TABLE `discount_list` (
  `Discount_id` varchar(50) NOT NULL,
  `Room_id` varchar(50) NOT NULL,
  `Percentage` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_list`
--

INSERT INTO `discount_list` (`Discount_id`, `Room_id`, `Percentage`) VALUES
('D67c458735a63d6.28017806', 'R67c439add', 20);

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
  `Hotel_Name` varchar(100) NOT NULL,
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
('M67c02ce79', 'Omk', 'kadiaom30@gmail.com', '$2y$10$huT72l1kErBiTdp7t1WkiOXIghXMg3C3XP9mvsOiDzyl9Pl3kItaW', 'H67c02ce7a', 'Patang Hotel', 'Near , Gandhinagar', '1234567890', 'HDFC', '0', '516516565151651', 'Verified'),
('M67c02e4ed', 'prakash', 'prakash398prajapati@gmail.com', '$2y$10$EKsjnpp.MSe4uh8KUhbFUe.e9CGYEGmSjfrj.owH49g5F/jHHM9xW', 'H67c02e4ee', 'Hotel Sapphire', 'Balotra | 990 m drive to Junagadh Junction Railway Station', '1234567890', 'Bank of Baroda', '12345678902524', 'HelooBPOB13345', 'Verified'),
('M67c030942', 'meghal', 'meghal7310@gmail.com', '$2y$10$NqQDXfZvNOj.oyUJhhM6y.98rrqnzHPOyuR/DHmo8ILGZloq9GnkS', 'H67c030943', 'Hotel Shreeji', 'Central Navsari', '1234567890', 'sbi', '1234567881', '1234', 'Verified'),
('M67c030a05', 'Nadeem26', 'makwananadeem3@gmail.com', '$2y$10$q6R6X4Ht3Lj7TsEVIQCcKOQQDPJ6hf2eOt3ff6YaxSGuE1VOFc2gy', 'H67c030a06', 'The Leela', 'The Leela, above Railway Station, off Ahmedabad state highway, Sector 14, Gandhinagar, Airspace, Gujarat 382014', '8849742758', 'BOB', '123456789101112', 'BOB12345678', 'Verified'),
('M67c032f21', 'meghal2', 'meghal7310@gmail.com', '$2y$10$MEt0gqkeqIQW55kWAio2WuFYxRyoKhLQSdvgi3EUqG5Go3zdn0z12', 'H67c032f22', 'Ramada by Wyndham', ' Ramada by Wyndham, Ranjit Baugh, Alkapuri Road, Godhra, Panchmahal â€“ 389001, Gujarat, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c033d8a', 'Nadeem261', 'makwananadeem3@gmail.com', '$2y$10$55QE7aUHCn5iY0oIt8/sWeSBTVTnuqpvQQm1wu1oXygCI3ugIWvP2', 'H67c033d8b', 'Shanti Resorts', 'GJ SH 6, Tithal, Valsad, Tithal, Gujarat 396001', '8849742758', 'BOB', '123456789112', 'BOB12345678', 'Verified'),
('M67c034046', 'prakash2', 'prakash398prajapati@gmail.com', '$2y$10$nn8Ri1hNUQWp4sDQNQ770OyRH9af35ziyGYIyaya1.GN21pRSvTe6', 'H67c034048', 'Kheda Heritage Inn', '123, Kheda Bazar Road, Kheda, Gujarat, 387411, India', '1234567890', 'Bank of Baroda', '123456789254154', 'HelooBPOB13345', 'Verified'),
('M67c0344e2', 'Omk2', 'kadiaom30@gmail.com', '$2y$10$4xcprzd81KblE5SGJMWayu1ziFEmbcoquKyEcUUNTRiXLdPQj/5H2', 'H67c0344e3', 'The Blueivy Hotel', 'Hotel Blueivy, 80 Feet Rd, opposite Patcon House, Rajiv Nagar, Patel Chokdi, Vivekanand Wadi, Anand, Gujarat.', '1234567890', 'HDFC', '3', '123456789101010', 'Verified'),
('M67c03465d', 'meghal3', 'meghal7310@gmail.com', '$2y$10$cDaqpLvyX.D.5PUlqF1EvepgGJ8iK6wmb4br.DxkjfYs9aEUTElhu', 'H67c034660', 'Hotel Patan Palace', ' Hotel Patan Palace, Near Rani-ki-Vav, Moti Chowk, Patan â€“ 384265, Gujarat, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c0368be', 'meghal4', 'meghal7310@gmail.com', '$2y$10$aiTFUNZucldgcJF4eKDcIeQ8pdFTnYDg9VnwyVEUkPomhoBOR1inq', 'H67c0368c0', ' The Zuberi Hotel', 'Zuberi Hotel, Near Sudama Chowk, Porbandar, Gujarat, 360575, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c038021', 'meghal5', 'meghal7310@gmail.com', '$2y$10$52k8bNIq7rFapF1zKD/WcevjvOB.Z1HLWMG47pMXSx/CGcAC71UOS', 'H67c038022', 'The Grand Regency', 'The Grand Regency, Dhebar Road, Near Gajarawadi, Rajkot, Gujarat, 360001, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c039200', 'meghal6', 'meghal7310@gmail.com', '$2y$10$xZH2/M58JOGFlRc6RE7gyeSALxv83NE2dMiRQzUFo1i.IF.hiZIz2', 'H67c039201', 'Hotel Shreenath', 'Hotel Shreenath, Opposite S.T. Stand, Himmatnagar, Sabarkantha, Gujarat, 383001, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c03a178', 'meghal7', 'meghal7310@gmail.com', '$2y$10$n5dI6ZVlK4RsKdtiKvMBreBSEMy7WC/eHfHsMrbO2b2UDpKPMfncm', 'H67c03a179', 'The Gateway Hotel Su', 'the Gateway Hotel Surat, Dumas Road, Surat, Gujarat, 395007, India', '1234567890', 'sbi', '123456789090', '12345', 'Verified'),
('M67c1af78d', 'prakash3', 'prakash398prajapati@gmail.com', '$2y$10$edyV0K6G8R45pL70PHCPM.dNbWgsvenMRy4N6JdicyJaPJeAo6Qgu', 'H67c1af78f', 'Hotel Prince Residency', 'Plot No. 87 to 98, Prince Residency, Giriraj Nagar, College Road, Bhuj, Kutch, Gujarat, 370001, India', '1234567890', 'BOB', '0123456789451', 'BODE4566444', 'Verified'),
('M67c1e9bd9', 'Omk3', 'kadiaom30@gmail.com', '$2y$10$kgTSvnMyi1CqfrY2M5AAHOcVLQ1.N.llQUA.q0UwPpwCY34Z0a/MW', 'H67c1e9bda', 'Aravali Villas', 'Near, Villiteray Resorts, India', '8799062611', 'BOB', '2712222222222', '98889745612', 'Verified'),
('M67c1edcd5', 'Omk4', 'kadiaom30@gmail.com', '$2y$10$mfhlmMvNYduNIwVbW8wYmeFHRaPXk6g7Uu200h/BTYj8gKMgEt44q', 'H67c1edcd6', 'Banaskantha', 'Address: 1, Mohanpura, Main Road', '8799062611', 'HDFC', '789456123456789', '98889745612', 'Verified'),
('M67c29f680', 'Omk5', 'kadiaom30@gmail.com', '$2y$10$qAT.pymtA0uPtWBMbxjuVOSCEwWokH0RetVMtKkWUznsbCxYy/zx2', 'H67c29f681', 'Regenta Harimangla Hotel', 'BC Circle, Old NH 8, Bholav ,  BharÅ«ch,Gujarat', '8799062611', 'HDFC', '789456123456789', '98889745612', 'Verified'),
('M67c2a5742', 'Omk6', 'kadiaom30@gmail.com', '$2y$10$4he7VH0LdEPlwKRE1yaH2erTzyBgie.ECOiDwEcMCYJs2Cjt5aUHK', 'H67c2a5744', 'The Fern Bhavnagar', 'Iscon Club, Nr. Moti Talav, Bhavnagar 364001, Gujarat', '8799062611', 'HDFC', '789456123456789', '98889745612', 'Verified'),
('M67c2a856c', 'Omk7', 'kadiaom30@gmail.com', '$2y$10$e.0T2JohTBC9Be1arDvu3uyL4pr4FqGZxxleaGWGu9E.jUkI7ILMq', 'H67c2a856d', 'Hotel Nakul Residency', 'Near Sardar Patel Circle, Botad 364710, Gujarat', '8799062611', 'SBI', '789456123456789', '98889745612', 'Verified'),
('M67c57172d', 'sohel', 'pathansohel9252@gmail.com', '$2y$10$yrZNjHra/Dr2YozGnDl/Q..4GG0g8TsSQpy3X2/5YQKTwN5E2ddNC', 'H67c57172e', 'Hotel Silver Residency', 'Opp. R.T.O OFFICE, Gurukrupa Society, Chhota Udepur - 391165', '1234567890', 'BOI', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c572e23', 'sohel1', 'pathansohel9252@gmail.com', '$2y$10$zt2RwT5CP/U94pf0paTaxeJmOhNYvp1OIX/TroNCsqjTlAOSdIn/G', 'H67c572e24', 'Hotel Shree Ram', 'Near Bus Stand, Dahod, Gujarat', '1234567890', 'ICICI', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c573d8a', 'sohel2', 'pathansohel9252@gmail.com', '$2y$10$hmFsD1/8kE/wnyVZL11U4evvUHfpFEnAGsk7hTyyMXiZ2NJWAO3te', 'H67c573d8c', 'The Deltin', ' Nani Daman, Daman, Gujarat', '1234567890', 'HDFC', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c574f86', 'sohel3', 'pathansohel9252@gmail.com', '$2y$10$8Z0HvbiKU295px7znvwy8OeC2iKrpY5DmxfqMFSXJao7R5ajf8svC', 'H67c574f87', 'Vananchal Resort', 'Near Saputara, Dang, Gujarat', '1234567890', 'HDFC', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c576257', 'sohel4', 'pathansohel9252@gmail.com', '$2y$10$01jHtnowsNr2jrPaAf4g4.JkdlzFjcUjYhioM5GbJdohWxz9mv35C', 'H67c576259', 'The Fern Gir Forest Resort', ' Sasan Gir, Gir Somnath, Gujarat', '1234567890', 'HDFC', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c57703d', 'sohel5', 'pathansohel9252@gmail.com', '$2y$10$urj02Wfsm75.pvDVqCa.Te6VsAbYE0Vvwem0FqdpbggnJlNOF4HCu', 'H67c57703e', 'Hotel Aram', 'Near Patel Circle, Jamnagar, Gujarat', '1234567890', 'HDFC', '210022002300', 'ABCD1200121', 'Not Verify'),
('M67c6f7ad9', 'prakash4', 'prakash398prajapati@gmail.com', '$2y$10$9O2mucfGlB2wa7PNYig9DO7geboO/tWTDVBgQYNl8ucA/5gTi2rWa', 'H67c6f7ada', 'Hotel Mahisagar', 'Near S.T. Bus Stand, Godhra Road, Lunawada, Mahisagar District, Gujarat - 389230, India', '1234567890', 'SBI', '012345678952', 'ADDFFGCFGGH', 'Verified'),
('M67cae679a', 'prakash5', 'prakash398prajapati@gmail.com', '$2y$10$eOqTWi7JsXkYG0VYIaBKcOiolKP59TfOcFzU1.XwyrymF2xxvqT4e', 'H67cae679b', 'Hotel Royal Meadows', '123, Shankar Bazar Road, Mehsana-384002, Gujarat, India', '1234567890', 'HDFC', '0123456789523', 'GJHJHGCD455', 'Not Verify');

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
('R67c02ee27', 'H67c02e4ee', 'Deluxe Room', 'AC', 3600, 'Twin Room', 'Booked', 'Img67c02ee26f7f00.80625885.avif', 'Img67c02ee26f7fd6.75426416.avif', 'Img67c02ee26f7ff1.77769439.webp'),
('R67c02f88c', 'H67c02e4ee', 'Standard Room', 'Non-Ac', 900, 'Twin Room', 'Open', 'Img67c02f88c88938.74303649.avif', 'Img67c02f88c889d7.84448837.avif', 'Img67c02f88c889f4.94205487.avif'),
('R67c031431', 'H67c030943', 'Family Room', 'AC', 5000, 'Family Room', 'Open', 'Img67c0314311f540.67019589.avif', 'Img67c0314311f5f7.69873070.avif', 'Img67c0314311f626.47123059.jpg'),
('R67c031829', 'H67c030a06', 'Deluxe Room', 'AC', 25000, 'Quard Room', 'Booked', 'Img67c031829c46d3.91114246.jfif', 'Img67c031829c4796.36839876.webp', 'Img67c031829c47a9.18614666.jfif'),
('R67c031e5b', 'H67c030943', 'Suite', 'AC', 3500, 'Twin Room', 'Open', 'Img67c031e5b0d4f1.56227099.avif', 'Img67c031e5b0d5d3.36169315.avif', 'Img67c031e5b0d612.95245254.avif'),
('R67c03271d', 'H67c02ce7a', 'Standard Room', 'AC', 1000, 'Triple Room', 'Open', 'Img67c03271d61544.72515747.jpg', 'Img67c03271d61673.88501835.jpg', 'Img67c03271d616b6.50325992.jpg'),
('R67c0327c4', 'H67c030a06', 'Family Room', 'AC', 30000, 'Family Room', 'Open', 'Img67c0327c3f5f12.48834590.jfif', 'Img67c0327c3f5fd8.73188482.jfif', 'Img67c0327c3f6000.66507892.jfif'),
('R67c032fad', 'H67c02ce7a', 'Standard Room', 'AC', 1500, 'Twin Room', 'Open', 'Img67c032facf3410.62757224.jpg', 'Img67c032facf3566.39081079.jpg', 'Img67c032facf35b7.20127657.avif'),
('R67c033761', 'H67c032f22', 'Standard Room', 'AC', 4000, 'Twin Room', 'Open', 'Img67c03376119772.30151582.avif', 'Img67c03376119b08.47510921.avif', 'Img67c03376119b69.07974080.avif'),
('R67c034035', 'H67c032f22', 'Family Room', 'AC', 2500, 'Triple Room', 'Open', 'Img67c0340359ed06.74962107.avif', 'Img67c0340359ee12.01844440.avif', 'Img67c0340359ee63.70874942.avif'),
('R67c034cf4', 'H67c0344e3', 'Standard Room', 'AC', 2500, 'Twin Room', 'Open', 'Img67c034cf468b65.56366892.webp', 'Img67c034cf468c36.58511737.webp', 'Img67c034cf468c42.23937920.jpg'),
('R67c034d47', 'H67c034660', 'Deluxe Room', 'AC', 3000, 'Triple Room', 'Open', 'Img67c034d47ed693.09256214.avif', 'Img67c034d47ed751.23204792.avif', 'Img67c034d47ed770.50263024.avif'),
('R67c034e5a', 'H67c034048', 'Suite', 'AC', 4620, 'Triple Room', 'Open', 'Img67c034e59dd625.65002500.avif', 'Img67c034e59dd739.99651357.avif', 'Img67c034e59dd772.48663067.avif'),
('R67c034f0b', 'H67c033d8b', 'Standard Room', 'Non-Ac', 3000, 'Twin Room', 'Open', 'Img67c034f0b4c798.53665818.avif', 'Img67c034f0b4c837.12045930.avif', 'Img67c034f0b4c852.35169312.avif'),
('R67c035139', 'H67c034660', 'Deluxe Room', 'AC', 3000, 'Triple Room', 'Open', 'Img67c03513973c55.78689349.avif', 'Img67c03513973cf2.23831902.avif', 'Img67c03513973d13.45670596.avif'),
('R67c03533e', 'H67c0344e3', 'Standard Room', 'AC', 2000, 'Twin Room', 'Open', 'Img67c03533edd893.90163826.webp', 'Img67c03533edd954.70201084.jfif', 'Img67c03533edd971.37410693.jpg'),
('R67c0372f5', 'H67c0368c0', 'Standard Room', 'AC', 2000, 'Triple Room', 'Open', 'Img67c0372f574362.71270478.avif', 'Img67c0372f574458.55057189.avif', 'Img67c0372f574487.38746425.avif'),
('R67c0376a5', 'H67c034048', 'Standard Room', 'AC', 2500, 'Twin Room', 'Open', 'Img67c0376a52a3c7.93549054.jfif', 'Img67c0376a52a462.89386557.jfif', 'Img67c0376a52a482.14270283.jfif'),
('R67c037aee', 'H67c0368c0', 'Deluxe Room', 'AC', 3500, 'Triple Room', 'Open', 'Img67c037aee8cc42.65949920.avif', 'Img67c037aee8cd06.80322617.avif', 'Img67c037aee8cd40.12435379.avif'),
('R67c038677', 'H67c038022', 'Standard Room', 'AC', 3000, 'Triple Room', 'Open', 'Img67c038677bf336.84504153.avif', 'Img67c038677bf3e7.58864813.avif', 'Img67c038677bf418.07581241.avif'),
('R67c038eab', 'H67c038022', 'Deluxe Room', 'AC', 10000, 'Twin Room', 'Open', 'Img67c038eaa10e53.07901159.jpg', 'Img67c038eaa10f70.81183888.avif', 'Img67c038eaa10fc9.88982446.jpg'),
('R67c0399aa', 'H67c039201', 'Deluxe Room', 'AC', 2000, 'Triple Room', 'Open', 'Img67c0399a9f2ef9.66167135.avif', 'Img67c0399a9f3000.12339537.avif', 'Img67c0399a9f3044.54389825.avif'),
('R67c039e21', 'H67c039201', 'Deluxe Room', 'AC', 4000, 'Single Room', 'Open', 'Img67c039e21c0a06.32009319.avif', 'Img67c039e21c0ac3.11999307.avif', 'Img67c039e21c0ae7.65739648.avif'),
('R67c03a69c', 'H67c03a179', 'Deluxe Room', 'AC', 5000, 'Triple Room', 'Open', 'Img67c03a69c6cdc4.76413037.avif', 'Img67c03a69c6ce42.90223019.avif', 'Img67c03a69c6ce66.65803757.avif'),
('R67c03a6fb', 'H67c033d8b', 'Deluxe Room', 'AC', 6000, 'Twin Room', 'Open', 'Img67c03a6fb10023.53992461.jpg', 'Img67c03a6fb10118.92402899.jpg', 'Img67c03a6fb10150.05032403.jpg'),
('R67c03ad0d', 'H67c03a179', 'Suite', 'AC', 5000, 'Triple Room', 'Open', 'Img67c03ad0dd41c3.29202682.avif', 'Img67c03ad0dd4290.48094129.avif', 'Img67c03ad0dd42d8.09420550.avif'),
('R67c05a23e', 'H67c030a06', 'Family Room', 'AC', 15000, 'Quard Room', 'Open', 'Img67c05a23e6dc66.67597415.jpg', 'Img67c05a23e6dd45.64867130.jpg', 'Img67c05a23e6dd88.00035832.jpg'),
('R67c1b0776', 'H67c1af78f', 'Standard Room', 'AC', 2500, 'Triple Room', 'Open', 'Img67c1b0775f5832.92121891.jpg', 'Img67c1b0775f5950.27031682.jpg', 'Img67c1b0775f5990.23296603.jpg'),
('R67c1eb611', 'H67c1e9bda', 'Standard Room', 'AC', 4500, 'Twin Room', 'Open', 'Img67c1eb61166140.15017812.webp', 'Img67c1eb61166211.21057607.jpg', 'Img67c1eb61166244.99805253.webp'),
('R67c1ef3fe', 'H67c1edcd6', 'Deluxe Room', 'AC', 5000, 'Triple Room', 'Open', 'Img67c1ef3fdc94d7.35812762.png', 'Img67c1ef3fdc95c2.25953355.png', 'Img67c1ef3fdc9609.45280399.webp'),
('R67c2a3d09', 'H67c29f681', 'Standard Room', 'AC', 4500, 'Twin Room', 'Open', 'Img67c2a3d09e4689.37115230.jpg', 'Img67c2a3d09e4739.52814306.jpg', 'Img67c2a3d09e4751.91632606.jpg'),
('R67c2a46f7', 'H67c29f681', 'Deluxe Room', 'AC', 5000, 'Twin Room', 'Open', 'Img67c2a46f6fd843.75690554.jpg', 'Img67c2a46f6fd936.10914586.jpg', 'Img67c2a46f6fd959.24146731.jpg'),
('R67c2a682e', 'H67c2a5744', 'Standard Room', 'AC', 3500, 'Twin Room', 'Open', 'Img67c2a682e40f69.41359362.jpg', 'Img67c2a682e41039.14863259.webp', 'Img67c2a682e41054.88644859.jpg'),
('R67c2a7db0', 'H67c2a5744', 'Standard Room', 'AC', 5000, 'Twin Room', 'Open', 'Img67c2a7db0605f7.20911993.jpg', 'Img67c2a7db060692.66844129.jpg', 'Img67c2a7db0606b3.61914016.jpg'),
('R67c2ad8de', 'H67c2a856d', 'Family Room', 'AC', 5000, 'Family Room', 'Open', 'Img67c2ad8de7f023.86025356.jpg', 'Img67c2ad8de7f0f8.51547948.jpg', 'Img67c2ad8de7f119.01461605.jpg'),
('R67c2aeaae', 'H67c2a856d', 'Deluxe Room', 'AC', 3500, 'Twin Room', 'Open', 'Img67c2aeaae0da58.41819603.jpg', 'Img67c2aeaae0db22.65730667.jpg', 'Img67c2aeaae0db57.14069755.jpg'),
('R67c5720f0', 'H67c57172e', 'Standard Room', 'AC', 3200, 'Twin Room', 'Open', 'Img67c5720f09c918.90337358.webp', 'Img67c5720f09c9a0.59995277.avif', 'Img67c5720f09c9d1.95180991.avif'),
('R67c572a16', 'H67c57172e', 'Family Room', 'AC', 15000, 'Family Room', 'Open', 'Img67c572a16abf96.27167983.avif', 'Img67c572a16ac036.56042948.avif', 'Img67c572a16ac051.86817491.webp'),
('R67c5734c8', 'H67c572e24', 'Suite', 'AC', 3500, 'Twin Room', 'Open', 'Img67c5734c8b9db7.03860979.avif', 'Img67c5734c8ba4d2.61319000.avif', 'Img67c5734c8ba665.02115315.avif'),
('R67c573928', 'H67c572e24', 'Deluxe Room', 'AC', 9500, 'Twin Room', 'Open', 'Img67c57392885fa9.36770601.avif', 'Img67c57392886054.50506677.avif', 'Img67c57392886075.36437115.webp'),
('R67c574359', 'H67c573d8c', 'Standard Room', 'AC', 8500, 'Triple Room', 'Open', 'Img67c574359b05e4.22977051.webp', 'Img67c574359b06a8.24914127.webp', 'Img67c574359b06c5.17577171.avif'),
('R67c5748eb', 'H67c573d8c', 'Deluxe Room', 'AC', 15000, 'Quard Room', 'Open', 'Img67c5748eb6c008.47415189.webp', 'Img67c5748eb6c0c2.84702069.avif', 'Img67c5748eb6c0e3.81142866.webp'),
('R67c57587a', 'H67c574f87', 'Family Room', 'AC', 8500, 'Quard Room', 'Open', 'Img67c57587a953e5.92125615.webp', 'Img67c57587a954a8.50893720.avif', 'Img67c57587a954c7.58874359.avif'),
('R67c575f30', 'H67c574f87', 'Standard Room', 'AC', 8500, 'Twin Room', 'Open', 'Img67c575f308ac76.35954009.avif', 'Img67c575f308ad44.24034834.avif', 'Img67c575f308ad62.83135716.avif'),
('R67c576792', 'H67c576259', 'Suite', 'Non-Ac', 4500, 'Triple Room', 'Open', 'Img67c576792a09f4.74703755.avif', 'Img67c576792a0b13.31854254.avif', 'Img67c576792a0b46.03415907.avif'),
('R67c576c87', 'H67c576259', 'Family Room', 'AC', 12000, 'Quard Room', 'Open', 'Img67c576c8706045.76536249.avif', 'Img67c576c8706156.14902996.avif', 'Img67c576c87061a9.37276325.avif'),
('R67c577796', 'H67c57703e', 'Standard Room', 'AC', 15000, 'Twin Room', 'Open', 'Img67c577795f39f1.88758631.avif', 'Img67c577795f3ae4.92701956.avif', 'Img67c577795f3b34.06182232.avif'),
('R67c577d89', 'H67c57703e', 'Deluxe Room', 'AC', 20000, 'Twin Room', 'Open', 'Img67c577d89ddbc4.59289564.avif', 'Img67c577d89ddc42.55686126.avif', 'Img67c577d89ddc64.33136638.avif'),
('R67c6f66f3', 'H67c1af78f', 'Deluxe Room', 'AC', 4500, 'Triple Room', 'Open', 'Img67c6f66f361653.92508906.jpg', 'Img67c6f66f361772.74742726.jpg', 'Img67c6f66f3617c4.62550142.jpg'),
('R67c70c8a1', 'H67c6f7ada', 'Suite', 'AC', 5000, 'Twin Room', 'Open', 'Img67c70c8a0db432.20724713.jpg', 'Img67c70c8a0db505.53497480.jpg', 'Img67c70c8a0db522.74373831.jpg'),
('R67c70d116', 'H67c6f7ada', 'Family Room', 'AC', 6000, 'Quard Room', 'Open', 'Img67c70d116ab0f9.46636996.jpg', 'Img67c70d116ab1e2.01961924.jpg', 'Img67c70d116ab229.03437009.jpg'),
('R67cae7036', 'H67cae679b', 'Standard Room', 'AC', 1500, 'Twin Room', 'Open', 'Img67cae7036985a5.42760948.jpg', 'Img67cae703698625.85949857.jpg', 'Img67cae703698659.33201726.jpg');

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
