-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2012 at 08:13 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctors_project`
--
CREATE DATABASE `doctors_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `doctors_project`;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE IF NOT EXISTS `degrees` (
  `degree_id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_title` varchar(100) NOT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `doctor_email` varchar(200) NOT NULL,
  `doctor_pass` varchar(200) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `doctor_email`, `doctor_pass`) VALUES
(1, 'Niaz', 'Morshed', 'abc@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_degree`
--

CREATE TABLE IF NOT EXISTS `doctors_degree` (
  `id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `description`) VALUES
(1, 'Napa', 'For fever'),
(2, 'antazol', 'cold'),
(3, 'flagil', 'loose motion'),
(4, 'Orsaline', 'loose motion'),
(5, 'test', 'this is test'),
(6, 'another test', 'another test'),
(7, 'another test', 'another test'),
(8, 'this is only test', 'test description'),
(9, 'med', 'med'),
(10, 'New medicine', 'New medicine description');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `blood_group` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_pass` varchar(200) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `age`, `gender`, `blood_group`, `phone`, `address`, `patient_email`, `patient_pass`) VALUES
(1, 'Adib', 50, 'male', 'B+', '01671712214', 'uttara', 'gr8adib@gmail.com', 'abc'),
(2, 'Leon', 70, 'male', 'O+', '0167533456', 'Mouchak', '', ''),
(3, 'Anik', 10, 'male', 'A+', '01934151225', 'Mohammadpur', '', ''),
(4, 'Human', 10, 'female', 'A-', '1230', 'Somewhere', '', ''),
(5, 'Male person', 100, 'male', 'AB+', '87654', 'Dont know', '', ''),
(6, 'Anik Hasan', 0, 'male', 'A+', '123', 'Mohammadpur', 'stackoverflow789@hotmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `PersonId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Age` int(10) unsigned NOT NULL,
  `RecordDate` datetime NOT NULL,
  `pokpok` varchar(255) NOT NULL,
  PRIMARY KEY (`PersonId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`PersonId`, `Name`, `Age`, `RecordDate`, `pokpok`) VALUES
(2, 'Douglas Adams', 42, '2011-12-26 00:00:00', ''),
(4, 'Thomas More', 61, '2011-12-27 00:00:00', ''),
(7, 'Anik Hasan', 45, '2012-11-28 10:03:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicine`
--

CREATE TABLE IF NOT EXISTS `prescribed_medicine` (
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `condition` varchar(45) NOT NULL,
  `times` int(11) NOT NULL,
  KEY `fk_prescribed_medicine_prescription1` (`prescription_id`),
  KEY `fk_prescribed_medicine_medicine1` (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribed_medicine`
--

INSERT INTO `prescribed_medicine` (`prescription_id`, `medicine_id`, `condition`, `times`) VALUES
(1, 1, 'This is first medicine', 4),
(1, 2, 'This second medicine', 3),
(2, 3, 'This is first medicine', 4),
(2, 2, 'This second medicine', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_test`
--

CREATE TABLE IF NOT EXISTS `prescribed_test` (
  `prescription_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  KEY `fk_prescribed_test_prescription1` (`prescription_id`),
  KEY `fk_prescribed_test_test1` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribed_test`
--

INSERT INTO `prescribed_test` (`prescription_id`, `test_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pres_date` datetime NOT NULL,
  PRIMARY KEY (`prescription_id`),
  KEY `fk_prescription_patient` (`patient_id`),
  KEY `patient_id` (`patient_id`),
  KEY `case_id` (`patient_id`),
  KEY `case_id_2` (`patient_id`),
  KEY `case_id_3` (`patient_id`),
  KEY `case_id_4` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `description`, `patient_id`, `pres_date`) VALUES
(1, 'This is first prescription', 1, '2012-12-09 00:00:00'),
(2, 'This is second prescription', 6, '2012-12-17 00:00:00'),
(3, 'This is third prescription', 6, '2012-12-13 00:00:00'),
(4, 'This is another fever prescription for anik', 6, '2012-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_type`
--

CREATE TABLE IF NOT EXISTS `prescription_type` (
  `prescription_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`prescription_type_id`),
  KEY `case_id` (`prescription_id`),
  KEY `type_id` (`type_id`),
  KEY `case_id_2` (`prescription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prescription_type`
--

INSERT INTO `prescription_type` (`prescription_type_id`, `prescription_id`, `type_id`, `description`) VALUES
(1, 1, 1, 'Fever added for adib'),
(2, 2, 2, 'Cancer added for anik hasan'),
(3, 3, 1, 'Fever added for anik hasan'),
(4, 4, 1, 'Fever added for anik hasan');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `name`, `description`) VALUES
(1, 'another test', 'another test'),
(2, 'hiv test', 'hiv test description'),
(3, 'blood test', 'blood test description'),
(4, '', ''),
(5, 'Test', 'description'),
(6, 'Test', 'description'),
(7, 'Test', 'description'),
(8, 'Test', 'description'),
(9, 'Test', 'description'),
(10, 'Test', 'description'),
(11, 'sample', 'sample'),
(12, 'sample', 'sample'),
(13, 'sample', 'sample'),
(14, 'sample', 'sample'),
(15, 'sample', 'sample'),
(16, 'sample', 'sample'),
(17, 'sample', 'sample'),
(18, 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `description`) VALUES
(1, 'Fever', 'This is fever description'),
(2, 'Cancer', 'This is cancer description');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescribed_medicine`
--
ALTER TABLE `prescribed_medicine`
  ADD CONSTRAINT `fk_prescribed_medicine_medicine1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prescribed_medicine_prescription1` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescribed_test`
--
ALTER TABLE `prescribed_test`
  ADD CONSTRAINT `fk_prescribed_test_prescription1` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prescribed_test_test1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription_type`
--
ALTER TABLE `prescription_type`
  ADD CONSTRAINT `prescription_type_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_type_ibfk_3` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
