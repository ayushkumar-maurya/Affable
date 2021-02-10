-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 06:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sme_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryName` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryName`, `description`) VALUES
('Entrepreneurship', 'Company laws, Legal matters, Mentorship'),
('Health and Fitness', 'Physical Health, Mental Health, Therapies'),
('IT', 'Software, Hardware, Training'),
('Others', 'Psychology, art, sports'),
('RealEstate', 'Civil, Construction, Land Disputes, Residential Complex');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consultationId` int(11) NOT NULL,
  `clientEmailId` varchar(100) DEFAULT NULL,
  `smeEmailId` varchar(100) DEFAULT NULL,
  `questionId` int(11) DEFAULT NULL,
  `mode` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fromTime` time DEFAULT NULL,
  `toTime` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation_slots`
--

CREATE TABLE `consultation_slots` (
  `ID` int(11) NOT NULL,
  `sme_email` varchar(255) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `questionid` int(11) DEFAULT NULL,
  `mode_of_cons` text DEFAULT NULL,
  `slot1_date` date DEFAULT NULL,
  `slot1_from_time` time DEFAULT NULL,
  `slot1_to_time` time DEFAULT NULL,
  `slot2_date` date DEFAULT NULL,
  `slot2_from_time` time DEFAULT NULL,
  `slot2_to_time` time DEFAULT NULL,
  `slot3_date` date DEFAULT NULL,
  `slot3_from_time` time DEFAULT NULL,
  `slot3_to_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `email` varchar(200) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sme_answer`
--

CREATE TABLE `sme_answer` (
  `id` int(11) NOT NULL,
  `questionid` int(11) DEFAULT NULL,
  `answered_by` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sme_profile`
--

CREATE TABLE `sme_profile` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(1) NOT NULL,
  `vkey` varchar(255) DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `postal_addr` varchar(200) DEFAULT NULL,
  `categoryname` varchar(100) DEFAULT NULL,
  `experience` int(2) DEFAULT NULL,
  `skillset` varchar(200) DEFAULT NULL,
  `sme_cert` text DEFAULT NULL,
  `sme_language` text DEFAULT NULL,
  `webinars` varchar(5) DEFAULT NULL,
  `sme_fees` int(11) DEFAULT NULL,
  `mode_of_cons` text DEFAULT NULL,
  `photo_loc` text DEFAULT NULL,
  `resume_loc` text DEFAULT NULL,
  `review_rating` double DEFAULT NULL,
  `ID` int(5) NOT NULL,
  `sme_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sme_profile`
--

INSERT INTO `sme_profile` (`name`, `email`, `phone`, `password`, `verified`, `vkey`, `pincode`, `postal_addr`, `categoryname`, `experience`, `skillset`, `sme_cert`, `sme_language`, `webinars`, `sme_fees`, `mode_of_cons`, `photo_loc`, `resume_loc`, `review_rating`, `ID`, `sme_code`) VALUES
('pavansme', 'pavanadhao685@gmail.com', 9763243782, '$2y$10$TW7Jk4jBM07b1WxlcDtTq.EdhQxCPmSxLEqKhhkzEqbcuoggB4SQC', 1, 'd796f66605147f8de7079c00b49969f3', NULL, '', 'IT', 0, '', '', '', 'Yes', 0, 'Chat,Email,', '', '', 4, 65, 'SME000065'),
('sme1', 'sme1@gmail.com', 9983634262, '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL, '435675', '12, kothrud,pune, maharashtra', 'Entrepreneurship', 4, 'Java, Python,C++', 'Google cloud, Linux unhatched', 'English, hindi', 'No', 700, 'Chat,', '', '', 4, 1, 'SME00001'),
('sme2', 'sme2@gmail.com', 4567234567, '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL, '563213', 'At. Nandura, Maharashtra,12', 'Entrepreneurship', 2, 'Digital Marketing', 'Google Digital Marketing', 'Marathi, Hindi, English', 'Yes', 600, 'Chat,Call,Email', NULL, NULL, 4, 2, 'SME00002'),
('sme3', 'sme3@gmail.com', 9876535463, '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL, '443456', '34,laxmi nagar, kondhawa, pune', 'RealEstate', 12, 'Knowledge about Economics', 'Real Estate Broker', 'Hindi, English', 'No', 1000, 'Chat,Email', NULL, NULL, 4, 3, 'SME00003');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(1) NOT NULL,
  `vkey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `phoneNumber`, `password`, `verified`, `vkey`) VALUES
('pavanadhao685@gmail.com', 'pavanuser', '9763243782', '$2y$10$xbBRUb97m7lGWKNwN.k8bOZeaIeQK1508kHJ46cOhK8QgVBKUDG9u', 1, '18f87314d3c73bb61818a21edd719f83'),
('user1@gmail.com', 'user1', '9876524367', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user2@gmail.com', 'user2', '7638647364', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user3@gmail.com', 'user3', '9873654632', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user4@gmail.com', 'user4', '8765345223', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user5@gmail.com', 'user5', '7638965463', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user6@gmail.com', 'user6', '8762987364', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user7@gmail.com', 'user7', '9837654263', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL),
('user8@gmail.com', 'user8', '9876374653', '$2y$10$mLyNeSjU9OVHbNMIDdgNceFQPhnMeyyqKae5GsUviZHO8Pf5S2MnS', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userquestion`
--

CREATE TABLE `userquestion` (
  `questionid` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `topic` text NOT NULL,
  `question` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryName`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consultationId`),
  ADD KEY `clientEmailId` (`clientEmailId`),
  ADD KEY `smeEmailId` (`smeEmailId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD KEY `forget_password_ibfk_1` (`email`);

--
-- Indexes for table `sme_answer`
--
ALTER TABLE `sme_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sme_profile`
--
ALTER TABLE `sme_profile`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `categoryname` (`categoryname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `userquestion`
--
ALTER TABLE `userquestion`
  ADD PRIMARY KEY (`questionid`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `consultationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `sme_answer`
--
ALTER TABLE `sme_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `sme_profile`
--
ALTER TABLE `sme_profile`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `userquestion`
--
ALTER TABLE `userquestion`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`clientEmailId`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`smeEmailId`) REFERENCES `sme_profile` (`email`),
  ADD CONSTRAINT `consultation_ibfk_3` FOREIGN KEY (`questionId`) REFERENCES `userquestion` (`questionid`);

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`email`) REFERENCES `sme_profile` (`email`);

--
-- Constraints for table `sme_profile`
--
ALTER TABLE `sme_profile`
  ADD CONSTRAINT `sme_profile_ibfk_1` FOREIGN KEY (`categoryname`) REFERENCES `category` (`categoryName`);

--
-- Constraints for table `userquestion`
--
ALTER TABLE `userquestion`
  ADD CONSTRAINT `userquestion_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`categoryName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
