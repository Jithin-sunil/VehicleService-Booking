-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 12:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(60) NOT NULL,
  `booking_todate` varchar(60) NOT NULL,
  `booking_amount` int(60) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_todate`, `booking_amount`, `booking_status`, `user_id`) VALUES
(1, '2025-07-30', '2025-07-31', 100, 1, 3),
(4, '2025-07-30', '2025-07-31', 100, 1, 3),
(5, '2025-07-30', '2025-07-31', 100, 1, 3),
(6, '2025-07-30', '2025-07-30', 100, 1, 3),
(7, '2025-07-30', '2025-07-31', 100, 2, 3),
(8, '2025-07-30', '', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(60) NOT NULL,
  `complaint_content` varchar(60) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `complaint_date` varchar(61) NOT NULL,
  `complaint_reply` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `complaint_date`, `complaint_reply`, `user_id`) VALUES
(1, 'rdefeg', 'fgertgvrth', 1, '2025-07-30', 'rgttrh', 3),
(4, 'erfeg', 'rfertgtr5h', 1, '2025-07-30', 'ergtfrh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'Ernakulam'),
(3, 'Idukki'),
(4, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(60) NOT NULL,
  `feedback_date` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`) VALUES
(2, 'gvbgtnjy', '2025-07-30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_description` varchar(60) NOT NULL,
  `package_amount` varchar(60) NOT NULL,
  `package_photo` varchar(200) NOT NULL,
  `servicecenter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_description`, `package_amount`, `package_photo`, `servicecenter_id`) VALUES
(2, 'Heloo', '100', 'Screenshot (2).png', 1),
(3, 'ed3fer', '12000', '38680618_8664875.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagebooking`
--

CREATE TABLE `tbl_packagebooking` (
  `packagebooking_id` int(11) NOT NULL,
  `packagebooking_date` varchar(60) NOT NULL,
  `packagebooking_todate` varchar(60) NOT NULL,
  `packagebooking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packagebooking`
--

INSERT INTO `tbl_packagebooking` (`packagebooking_id`, `packagebooking_date`, `packagebooking_todate`, `packagebooking_status`, `user_id`, `package_id`) VALUES
(6, '2025-07-30', '2025-07-31', 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(2, 'Aluva', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_content` varchar(60) NOT NULL,
  `review_count` varchar(60) NOT NULL,
  `review_datetime` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `servicecenter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serviceamount`
--

CREATE TABLE `tbl_serviceamount` (
  `serviceamount_id` int(11) NOT NULL,
  `serviceamount_price` int(50) NOT NULL,
  `servicecenter_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_serviceamount`
--

INSERT INTO `tbl_serviceamount` (`serviceamount_id`, `serviceamount_price`, `servicecenter_id`, `servicetype_id`) VALUES
(2, 100, 1, 2),
(3, 1000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicecenter`
--

CREATE TABLE `tbl_servicecenter` (
  `servicecenter_id` int(11) NOT NULL,
  `servicecenter_name` varchar(60) NOT NULL,
  `servicecenter_status` int(11) NOT NULL DEFAULT 0,
  `servicecenter_email` varchar(60) NOT NULL,
  `servicecenter_contact` varchar(60) NOT NULL,
  `servicecenter_address` varchar(200) NOT NULL,
  `place_id` int(11) NOT NULL,
  `servicecenter_logo` varchar(60) NOT NULL,
  `servicecenter_proof` varchar(60) NOT NULL,
  `servicecenter_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_servicecenter`
--

INSERT INTO `tbl_servicecenter` (`servicecenter_id`, `servicecenter_name`, `servicecenter_status`, `servicecenter_email`, `servicecenter_contact`, `servicecenter_address`, `place_id`, `servicecenter_logo`, `servicecenter_proof`, `servicecenter_password`) VALUES
(1, 'Center', 1, 'center@gmail.com', '9078563412', 'Hloo', 2, 'Screenshot (2).png', 'Screenshot (4).png', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicetype`
--

CREATE TABLE `tbl_servicetype` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_servicetype`
--

INSERT INTO `tbl_servicetype` (`servicetype_id`, `servicetype_name`) VALUES
(2, 'Water Service');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_singleservice`
--

CREATE TABLE `tbl_singleservice` (
  `singleservice_id` int(11) NOT NULL,
  `singleservice_status` int(11) NOT NULL DEFAULT 0,
  `booking_id` int(11) NOT NULL,
  `serviceamount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_singleservice`
--

INSERT INTO `tbl_singleservice` (`singleservice_id`, `singleservice_status`, `booking_id`, `serviceamount_id`) VALUES
(1, 1, 1, 2),
(2, 0, 2, 2),
(3, 0, 3, 2),
(4, 1, 4, 2),
(5, 1, 5, 2),
(6, 1, 6, 2),
(7, 1, 7, 2),
(8, 0, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_photo` varchar(200) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `user_photo`, `user_password`, `place_id`) VALUES
(3, 'Sreekanth ', 'sreekanth4926@gmail.com', '9875464656', 'ennazhiyi (H) pallapram ponnani', 'Screenshot (1).png', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_packagebooking`
--
ALTER TABLE `tbl_packagebooking`
  ADD PRIMARY KEY (`packagebooking_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_serviceamount`
--
ALTER TABLE `tbl_serviceamount`
  ADD PRIMARY KEY (`serviceamount_id`);

--
-- Indexes for table `tbl_servicecenter`
--
ALTER TABLE `tbl_servicecenter`
  ADD PRIMARY KEY (`servicecenter_id`);

--
-- Indexes for table `tbl_servicetype`
--
ALTER TABLE `tbl_servicetype`
  ADD PRIMARY KEY (`servicetype_id`);

--
-- Indexes for table `tbl_singleservice`
--
ALTER TABLE `tbl_singleservice`
  ADD PRIMARY KEY (`singleservice_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_packagebooking`
--
ALTER TABLE `tbl_packagebooking`
  MODIFY `packagebooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_serviceamount`
--
ALTER TABLE `tbl_serviceamount`
  MODIFY `serviceamount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_servicecenter`
--
ALTER TABLE `tbl_servicecenter`
  MODIFY `servicecenter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_servicetype`
--
ALTER TABLE `tbl_servicetype`
  MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_singleservice`
--
ALTER TABLE `tbl_singleservice`
  MODIFY `singleservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
