-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2025 at 10:54 AM
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
-- Database: `registered_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(32) NOT NULL,
  `LastName` varchar(32) NOT NULL,
  `AM` varchar(13) NOT NULL,
  `CoursesPassed` double NOT NULL,
  `Score` varchar(3) NOT NULL,
  `EngLvl` varchar(2) NOT NULL,
  `MoreLng` varchar(3) DEFAULT NULL,
  `FirstUni` varchar(128) NOT NULL,
  `SecondUni` varchar(128) DEFAULT NULL,
  `ThirdUni` varchar(128) DEFAULT NULL,
  `GradeFile` text NOT NULL,
  `EngCert` text NOT NULL,
  `OthrCert` text DEFAULT NULL,
  `Accepted` varchar(3) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ID`, `FirstName`, `LastName`, `AM`, `CoursesPassed`, `Score`, `EngLvl`, `MoreLng`, `FirstUni`, `SecondUni`, `ThirdUni`, `GradeFile`, `EngCert`, `OthrCert`, `Accepted`, `UserID`) VALUES
(6, 'test', 'test', '2022202100000', 0, '6.9', 'C2', 'no', 'University of Bologna, Italy', 'University of Lisbon, Portugal', 'University of Vienna, Austria', 'D:xampphtdocserasmus-projectscripts/../uploads/test1/Placeholder-PDF.pdf', 'D:xampphtdocserasmus-projectscripts/../uploads/test1/Placeholder-PDF.pdf/', '', NULL, 2),
(7, 'test', 'test', '2022202100000', 0.5, '6.9', 'C2', 'no', 'University of Bologna, Italy', 'University of Lisbon, Portugal', 'University of Vienna, Austria', 'D:xampphtdocserasmus-projectscripts/../uploads/test1/Placeholder-PDF.pdf', 'D:xampphtdocserasmus-projectscripts/../uploads/test1/Placeholder-PDF.pdf/', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Username` varchar(40) DEFAULT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `University` varchar(50) NOT NULL,
  `AM` varchar(13) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Username`, `Email`, `PhoneNumber`, `University`, `AM`, `Password`, `Birthdate`, `Gender`) VALUES
(1, 'admin', 'admin', 'root', 'admin@root.com', '0000000000', 'localhost', '0000000000000', 'admin.', '9999-12-30', 'male'),
(2, 'test', 'test', 'test1', 'test1@testing.com', '1234567890', 'testing', '2022202100000', '1234.', '2025-05-26', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
