-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 09:21 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `login_id` varchar(45) NOT NULL,
  `pass_key` varchar(45) NOT NULL,
  `security` varchar(45) NOT NULL,
  `level` int(3) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `login_id`, `pass_key`, `security`, `level`, `name`) VALUES
(1, 'admin', 'admin', 'admin', 5, 'admin'),
(2, 'member', 'member', 'member', 5, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `idcard` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `card_state` varchar(9) NOT NULL,
  `members_MemberID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `ClassType` varchar(45) DEFAULT NULL,
  `ClassSize` int(11) DEFAULT NULL,
  `Cost` float DEFAULT NULL,
  `Time` time NOT NULL,
  `Signed_Up` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassType`, `ClassSize`, `Cost`, `Time`, `Signed_Up`) VALUES
(1, 'Body Combat', 20, 6, '05:53:00', 0),
(2, 'Spin', 25, 3.5, '15:00:00', 0),
(3, 'Spin', 30, 5.5, '20:00:00', 0),
(4, 'Spin', 30, 5.5, '22:00:00', 0),
(5, 'Pilates', 20, 2, '10:00:00', 0),
(6, 'Pilates', 25, 2, '15:00:00', 0),
(7, 'Pilates', 30, 3.5, '20:00:00', 0),
(8, 'Pilates', 30, 3.5, '22:00:00', 0),
(9, 'Body Combat', 20, 5, '10:00:00', 0),
(11, 'Body Combat', 30, 6.5, '20:00:00', 0),
(12, 'Body Combat', 30, 6.5, '22:00:00', 0),
(13, 'Grappling', 20, 1.5, '10:00:00', 0),
(14, 'Grappling', 25, 1.5, '15:00:00', 0),
(15, 'Grappling', 30, 3.5, '20:00:00', 0),
(16, 'Grappling', 30, 3.5, '22:00:00', 0),
(17, 'Boxing', 20, 5, '10:00:00', 0),
(19, 'Wrestling', 20, 8, '10:49:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_reserve`
--

CREATE TABLE `class_reserve` (
  `Member_MemberID` int(3) NOT NULL,
  `Class_ClassID` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `EquipmentID` int(11) NOT NULL,
  `EquipmentName` varchar(45) DEFAULT NULL,
  `EquipmentType` varchar(45) DEFAULT NULL,
  `Available` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`EquipmentID`, `EquipmentName`, `EquipmentType`, `Available`) VALUES
(1, 'Bench', 'Weights', 'yes'),
(2, 'Rowing Machine', 'Cardio', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Date_Joined` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Address` varchar(45) DEFAULT NULL,
  `Postcode` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Membership_MembershipID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Name`, `DOB`, `Date_Joined`, `Address`, `Postcode`, `Phone`, `email`, `Membership_MembershipID`) VALUES
(1, 'Khalid Bin Waleed', '1990-02-02', '2018-03-06 23:16:13', '6 Carlton Crescent', 'LU3 1EN', '01582451116', 'abc@yahoo.co.uk', 1),
(2, 'Barry Johnson', '1970-02-01', '2017-12-14 00:00:00', '2 Blenheim Crescent', 'LU3 1HA', '01582720742', 'qwerty@hotmail.co.uk', NULL),
(4, 'Abul Hasan', '1981-12-02', '2018-02-07 00:00:00', '7 Carlton Crescent', 'LU3 1EN', '01582391429', 'gafag@yahoo.co.uk', NULL),
(5, 'Faheem Hasan', '2018-03-06', '2018-03-06 22:28:13', '3 Dane Road', 'LU3 1JW', '01582391429', 'ab@hotmail.co.uk', NULL),
(6, 'Joe Blog', '1985-12-09', '2018-02-23 14:14:02', '7 Carlton Crescent', 'LU3 1EN', '01582391429', 'faheem.hasan95@googlemail.com', NULL),
(9, 'Ezio Auditore', '1989-02-20', '2018-02-20 12:04:56', '3 Dane Road', 'LU3 1EQ', '01582391429', 'ezio@yahoo.com', NULL),
(10, 'James Howard', '1989-12-17', '2018-02-20 12:37:53', '3 Dane Road', 'LU3 1JW', '01582391429', 'james@aol.com', NULL),
(11, 'Sadah Singh', '1996-03-21', '2018-02-25 20:12:49', '31 Singhers Way', 'SN3 1GH', '01582391429', 'kirpan@gmail.com', NULL),
(13, 'Gareth Bale', '1970-10-16', '2018-02-20 13:23:33', '5 The Ridings', 'LU3 1JW', '01582564743', 'absim.bus@gmail.com', NULL),
(14, 'Gareth Bale', '2018-02-20', '2018-02-20 18:18:41', '11 Carlton Crescent', 'LU3 1EN', '01582391429', 'ab@hotmail.co.uk', NULL),
(16, 'Mohammed Salah', '2018-03-06', '2018-03-06 22:29:01', '11 Carlton Crescent', 'LU3 1E8', '01582451116', 'ab@hotmail.co.uk', NULL),
(17, 'Christiano Ronaldiniho', '2018-03-06', '2018-03-06 23:17:09', '31 manton drive', 'LU3 1EQ', '01582564743', 'ab@hotmail.co.uk', NULL),
(18, 'Paul Pogba', '2018-03-13', '2018-03-13 19:37:10', '31 Singhers Way', 'LU3 1EN', '01582451116', 'ab@hotmail.co.uk', NULL),
(19, 'bsdjh sabdhkas', '2018-03-13', '2018-03-13 19:43:51', '3 Dane Road', 'LU3 1E8', '01582391429', 'ab@hotmail.co.uk', NULL),
(20, 'kasoxkask', '2018-03-13', '2018-03-13 19:44:23', '3 Dane Road', 'LU3 1E8', '01582451116', 'ab@hotmail.co.uk', NULL);

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `createHistory` AFTER UPDATE ON `members` FOR EACH ROW BEGIN 
INSERT INTO members_backup(MemberID,Name,DOB,Date_Joined,Address,Postcode,Phone,email)
VALUES (OLD.MemberID, OLD.Name, OLD.DOB, OLD.Date_Joined, OLD.Address, OLD.Postcode, OLD.Phone, OLD.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `MembershipID` int(11) NOT NULL,
  `Membership_Length` varchar(45) DEFAULT NULL,
  `Date_Created` date DEFAULT NULL,
  `Expiry_Date` date DEFAULT NULL,
  `Memebrship_Level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`MembershipID`, `Membership_Length`, `Date_Created`, `Expiry_Date`, `Memebrship_Level`) VALUES
(1, '12 months', '2018-02-13', '2019-02-13', 'Gold'),
(2, '12 months', '2018-03-03', '2018-03-13', 'GOLD'),
(5, '12 months', '2018-03-05', '2019-03-03', 'GOLD');

--
-- Triggers `membership`
--
DELIMITER $$
CREATE TRIGGER `expdate` BEFORE INSERT ON `membership` FOR EACH ROW BEGIN
SET NEW.Expiry_Date = DATE_ADD(Current_Date, INTERVAL 1 YEAR);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `members_backup`
--

CREATE TABLE `members_backup` (
  `MemberID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `DOB` date NOT NULL,
  `Date_Joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Address` varchar(45) NOT NULL,
  `Postcode` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_backup`
--

INSERT INTO `members_backup` (`MemberID`, `Name`, `DOB`, `Date_Joined`, `Address`, `Postcode`, `Phone`, `email`) VALUES
(11, 'Sadah Singh', '1996-03-21', '2018-02-20 13:16:50', '31 Singhers Way', 'SN3 1GH', '01582391429', 'kirpan@gmail.com'),
(11, 'Sadah Singher', '1996-03-21', '2018-02-25 19:07:02', '31 Singhers Way', 'SN3 1GH', '01582391429', 'kirpan@gmail.com'),
(15, 'Christiano Ronaldo', '1985-02-25', '2018-02-25 20:16:03', '11 Carlton Crescent', 'LU3 1EN', '01582391429', 'abc@yahoo.co.uk'),
(1, 'Khalid Bin Waleed', '1990-02-02', '2018-02-20 18:17:59', '7 Carlton Crescent', 'LU3 1EN', '01582451116', 'abc@yahoo.co.uk'),
(5, 'Faheem Hasan', '1995-04-05', '2018-02-07 11:34:26', '7 Carlton Crescent', 'LU3 1EN', '07578924005', 'faheem.hasan@hotmail.co.uk'),
(5, 'faheem Hasan', '1995-04-05', '2018-03-06 21:25:12', '7 Carlton Crescent', 'LU3 1E8', '07578924005', 'faheem.hasan@hotmail.co.uk'),
(1, 'Khalid Bin Waleed', '1990-02-02', '2018-03-03 18:13:44', '5 Carlton Crescent', 'LU3 1EN', '01582451116', 'abc@yahoo.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `members_has_class`
--

CREATE TABLE `members_has_class` (
  `Members_MemberID` int(11) NOT NULL,
  `Class_ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_has_class`
--

INSERT INTO `members_has_class` (`Members_MemberID`, `Class_ClassID`) VALUES
(1, 1),
(1, 2),
(1, 13);

--
-- Triggers `members_has_class`
--
DELIMITER $$
CREATE TRIGGER `Sign up` AFTER INSERT ON `members_has_class` FOR EACH ROW BEGIN
UPDATE class SET Signed_Up = Signed_Up +1 where ClassID = NEW.Class_ClassID;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `unsign` AFTER DELETE ON `members_has_class` FOR EACH ROW BEGIN
UPDATE class SET Signed_Up = Signed_Up -1 where ClassID = OLD.Class_ClassID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `members_has_equipment`
--

CREATE TABLE `members_has_equipment` (
  `Members_MemberID` int(11) NOT NULL,
  `Equipment_EquipmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_has_equipment`
--

INSERT INTO `members_has_equipment` (`Members_MemberID`, `Equipment_EquipmentID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repairlog`
--

CREATE TABLE `repairlog` (
  `LogID` int(11) NOT NULL,
  `EquipmentID` int(11) NOT NULL,
  `EquipmentName` varchar(45) DEFAULT NULL,
  `DamageDetails` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairlog_has_equipment`
--

CREATE TABLE `repairlog_has_equipment` (
  `RepairLog_LogID` int(11) NOT NULL,
  `Equipment_EquipmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Postcode` varchar(45) NOT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `Trainer` varchar(3) DEFAULT NULL,
  `Class_ClassID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `DOB`, `Address`, `Postcode`, `Phone`, `email`, `Trainer`, `Class_ClassID`) VALUES
(2, 'Faheem Hasan', '1991-10-03', '7 Carlton Crescent', 'LU3 1EN', '01582391429', 'faheem.hasan95@googlemail.com', 'yes', NULL),
(6, 'Ezio Auditore', '2018-02-20', '5 The Ridings', 'LU3 1EQ', '01582391429', 'ezio@yahoo.com', 'Yes', NULL),
(7, 'Gareth Bale', '2018-02-20', '3 Dane Road', 'SN3 1GH', '01582391429', 'ab@hotmail.co.uk', 'No', NULL),
(8, 'Barry Johnson', '2018-03-06', '5 The Ridings', 'LU3 1EN', '01582391429', 'ab@hotmail.co.uk', 'No', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`idcard`),
  ADD KEY `fk_Members_Card1_idx` (`members_MemberID`) USING BTREE;

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`EquipmentID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `fk_Members_Membership1_idx` (`Membership_MembershipID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MembershipID`);

--
-- Indexes for table `members_has_class`
--
ALTER TABLE `members_has_class`
  ADD PRIMARY KEY (`Members_MemberID`,`Class_ClassID`),
  ADD KEY `fk_Members_has_Class_Class1_idx` (`Class_ClassID`),
  ADD KEY `fk_Members_has_Class_Members1_idx` (`Members_MemberID`);

--
-- Indexes for table `members_has_equipment`
--
ALTER TABLE `members_has_equipment`
  ADD PRIMARY KEY (`Members_MemberID`,`Equipment_EquipmentID`),
  ADD KEY `fk_Members_has_Equipment_Equipment1_idx` (`Equipment_EquipmentID`),
  ADD KEY `fk_Members_has_Equipment_Members1_idx` (`Members_MemberID`);

--
-- Indexes for table `repairlog`
--
ALTER TABLE `repairlog`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `repairlog_has_equipment`
--
ALTER TABLE `repairlog_has_equipment`
  ADD PRIMARY KEY (`RepairLog_LogID`,`Equipment_EquipmentID`),
  ADD KEY `fk_RepairLog_has_Equipment_Equipment1_idx` (`Equipment_EquipmentID`),
  ADD KEY `fk_RepairLog_has_Equipment_RepairLog1_idx` (`RepairLog_LogID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `fk_Staff_Class1_idx` (`Class_ClassID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `EquipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `repairlog`
--
ALTER TABLE `repairlog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_Members_Membership1` FOREIGN KEY (`Membership_MembershipID`) REFERENCES `membership` (`MembershipID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `members_has_class`
--
ALTER TABLE `members_has_class`
  ADD CONSTRAINT `fk_Members_has_Class_Class1` FOREIGN KEY (`Class_ClassID`) REFERENCES `class` (`ClassID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Members_has_Class_Members1` FOREIGN KEY (`Members_MemberID`) REFERENCES `members` (`MemberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `members_has_equipment`
--
ALTER TABLE `members_has_equipment`
  ADD CONSTRAINT `fk_Members_has_Equipment_Equipment1` FOREIGN KEY (`Equipment_EquipmentID`) REFERENCES `equipment` (`EquipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Members_has_Equipment_Members1` FOREIGN KEY (`Members_MemberID`) REFERENCES `members` (`MemberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repairlog_has_equipment`
--
ALTER TABLE `repairlog_has_equipment`
  ADD CONSTRAINT `fk_RepairLog_has_Equipment_Equipment1` FOREIGN KEY (`Equipment_EquipmentID`) REFERENCES `equipment` (`EquipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RepairLog_has_Equipment_RepairLog1` FOREIGN KEY (`RepairLog_LogID`) REFERENCES `repairlog` (`LogID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_Staff_Class1` FOREIGN KEY (`Class_ClassID`) REFERENCES `class` (`ClassID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
