-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 03:56 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(12) NOT NULL,
  `department` text NOT NULL,
  `batch` text NOT NULL,
  `section` text NOT NULL,
  `no_of_student` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `department`, `batch`, `section`, `no_of_student`) VALUES
(3, 'CSE', 'L4T3', 'A', 32),
(6, 'CSE', 'L4T2', 'A', 35),
(9, 'CSE', 'L4T1', 'A', 35),
(12, 'CSE', 'L3T3', 'A', 38),
(16, 'CSE', '23', 'A', 40),
(17, 'CSE', '24', 'A', 40),
(18, 'CSE', '25', 'A', 40),
(19, 'CSE', '21', 'A', 35),
(20, 'CSE', '22', 'A', 35),
(21, 'CSE', '26', 'A', 40),
(22, 'CSE', '27', 'A', 45),
(23, 'CSE', '28', 'A', 40),
(25, 'CSE', '29', 'A', 35),
(26, 'CSE', '29', 'B', 35),
(27, 'CSE', 'L1T1', 'A', 35),
(28, 'CSE', 'L1T1', 'B', 35),
(29, 'CSE', 'L1T1', 'C', 35),
(30, 'CSE', 'L1T1', 'D', 35),
(32, 'CSE', 'L1T2', 'A', 35),
(33, 'CSE', 'L1T2', 'B', 35),
(34, 'CSE', 'L1T2', 'C', 35),
(35, 'CSE', 'L1T3', 'A', 35),
(36, 'CSE', 'L1T3', 'B', 35),
(37, 'CSE', 'L1T3', 'C', 40),
(39, 'CSE', 'L2T1', 'A', 35),
(40, 'CSE', 'L2T1', 'B', 35),
(41, 'CSE', 'L2T1', 'C', 35),
(42, 'CSE', 'L2T2', 'A', 35),
(43, 'CSE', 'L2T2', 'B', 35),
(45, 'CSE', 'L2T3', 'A', 35),
(46, 'CSE', 'L2T3', 'B', 35),
(48, 'CSE', 'L3T1', 'A', 35),
(49, 'CSE', 'L3T1', 'B', 35),
(51, 'CSE', 'L3T2', 'A', 35),
(52, 'CSE', 'L3T2', 'B', 35);

-- --------------------------------------------------------

--
-- Table structure for table `col`
--

CREATE TABLE IF NOT EXISTS `col` (
  `id` int(12) NOT NULL,
  `room_number` text NOT NULL,
  `col` int(12) NOT NULL,
  `capacity` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `col`
--

INSERT INTO `col` (`id`, `room_number`, `col`, `capacity`) VALUES
(6, '101CSEB', 2, 8),
(7, '101CSEB', 3, 8),
(8, '101CSEB', 4, 8),
(9, '101CSEB', 5, 8),
(10, '101CSEB', 6, 8),
(11, '101CSEB', 7, 6),
(12, '102CSEB', 1, 10),
(13, '102CSEB', 2, 12),
(14, '102CSEB', 3, 12),
(15, '102CSEB', 4, 12),
(16, '102CSEB', 5, 12),
(17, '102CSEB', 6, 12),
(18, '102CSEB', 7, 12),
(19, '102CSEB', 8, 12),
(20, '102CSEB', 9, 12),
(21, '102CSEB', 10, 10),
(22, '601CSEB', 1, 6),
(23, '601CSEB', 2, 7),
(24, '601CSEB', 3, 7),
(25, '601CSEB', 4, 7),
(26, '601CSEB', 5, 7),
(27, '601CSEB', 6, 3),
(28, '601CSEB', 7, 3),
(29, '601CSEB', 8, 2),
(30, '602CSEB', 1, 4),
(31, '602CSEB', 2, 4),
(32, '602CSEB', 3, 4),
(33, '602CSEB', 4, 4),
(34, '602CSEB', 5, 4),
(35, '602CSEB', 6, 6),
(36, '602CSEB', 7, 7),
(37, '602CSEB', 8, 7),
(38, '602CSEB', 9, 7),
(39, '701CSEB', 1, 6),
(40, '701CSEB', 2, 7),
(41, '701CSEB', 3, 7),
(42, '701CSEB', 4, 7),
(43, '701CSEB', 5, 7),
(44, '701CSEB', 6, 3),
(45, '701CSEB', 7, 3),
(46, '701CSEB', 8, 2),
(47, '702CSEB', 1, 4),
(48, '702CSEB', 2, 4),
(49, '702CSEB', 3, 4),
(50, '702CSEB', 4, 4),
(51, '702CSEB', 5, 4),
(52, '702CSEB', 6, 6),
(53, '702CSEB', 7, 7),
(54, '702CSEB', 8, 7),
(55, '702CSEB', 9, 7),
(56, '801CSEB', 1, 6),
(57, '801CSEB', 2, 7),
(58, '801CSEB', 3, 7),
(59, '801CSEB', 4, 7),
(60, '801CSEB', 5, 7),
(61, '801CSEB', 6, 3),
(62, '801CSEB', 8, 2),
(63, '801CSEB', 7, 3),
(64, '802CSEB', 1, 4),
(65, '802CSEB', 2, 4),
(66, '802CSEB', 3, 4),
(67, '802CSEB', 4, 4),
(68, '802CSEB', 5, 4),
(69, '802CSEB', 6, 6),
(70, '802CSEB', 7, 7),
(71, '802CSEB', 8, 7),
(72, '802CSEB', 9, 7),
(73, '901CSEB', 1, 7),
(74, '901CSEB', 2, 8),
(75, '901CSEB', 3, 8),
(76, '901CSEB', 4, 8),
(77, '901CSEB', 5, 8),
(78, '901CSEB', 6, 8),
(79, '901CSEB', 7, 6),
(80, '902CSEB', 1, 7),
(81, '902CSEB', 2, 7),
(82, '902CSEB', 3, 7),
(83, '902CSEB', 4, 7),
(84, '902CSEB', 5, 7),
(85, '902CSEB', 6, 7),
(86, '902CSEB', 7, 7),
(87, '902CSEB', 8, 7),
(89, '902CSEB', 9, 7),
(90, '101CSEB', 1, 7),
(91, '903CSEB', 1, 10),
(92, '903CSEB', 2, 12),
(93, '903CSEB', 3, 12),
(94, '903CSEB', 4, 12),
(95, '903CSEB', 5, 5),
(96, '903CSEB', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(12) NOT NULL,
  `department` text NOT NULL,
  `course_id` text NOT NULL,
  `course_name` text NOT NULL,
  `batch` text NOT NULL,
  `shift` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department`, `course_id`, `course_name`, `batch`, `shift`) VALUES
(2, 'CSE', 'CSE498', 'Social and Professional Issues in Computing', 'L4T3', 0),
(3, 'CSE', 'CSE421', 'Computer Graphics', 'L4T2', 0),
(4, 'CSE', 'CSE423', 'Embedded System', 'L4T2', 0),
(5, 'CSE', 'CSE450', 'Data Mining', 'L4T2', 0),
(7, 'CSE', 'CSE414', 'Simulation and Modeling', 'L4T1', 0),
(8, 'CSE', 'CSE417', 'Web Engineering', 'L4T1', 0),
(9, 'CSE', 'CSE331', 'Compiler Design', 'L3T3', 0),
(11, 'CSE', 'CSE334', 'Wireless Programming', 'L3T3', 0),
(12, 'CSE', 'ACT301', 'Financial and Managerial Accounting', 'L3T3', 0),
(14, 'CSE', 'CSE322', 'Computer Architecture and Organization', '25', 1),
(16, 'CSE', 'CSE331', 'Compiler Design', '24', 1),
(17, 'CSE', 'CSE321', 'System Analysis and Design', '23', 1),
(18, 'CSE', 'CSE312', 'Numerical Methods', '25', 1),
(20, 'CSE', 'CSE433', 'Digital Image Processing', 'L4T3', 0),
(25, 'CSE', 'CSE333', 'Software Engineering', 'L3T3', 0),
(26, 'CSE', 'CSE321', 'System Analysis and Design', 'L3T2', 0),
(27, 'CSE', 'CSE322', 'Computer Architecture and Organization', 'L3T2', 0),
(28, 'CSE', 'CSE323', 'Operating System', 'L3T2', 0),
(29, 'CSE', 'ECO314', 'Economics', 'L3T2', 0),
(30, 'CSE', 'CSE311', 'Database Manaagement System', 'L3T1', 0),
(31, 'CSE', 'CSE313', 'Computer Network', 'L3T1', 0),
(32, 'CSE', 'GED321', 'Art of Living', 'L3T1', 0),
(33, 'CSE', 'CSE112', 'Computer Fundamentals', 'L1T1', 0),
(34, 'CSE', 'MAT111', 'Mathematics - I: Differential & Integral Calculus', 'L1T1', 0),
(35, 'CSE', 'ENG113', 'Basic Functional English and English Spoken', 'L1T1', 0),
(36, 'CSE', 'PHY113', 'Physics - I: Mechanics: Heat & Thermodynamics: Waves: Optics', 'L1T1', 0),
(38, 'CSE', 'CSE122', 'Programming and Problem Solving', 'L1T2', 0),
(40, 'CSE', 'ENG123', 'Writing and Comprehension', 'L1T2', 0),
(41, 'CSE', 'CSE131', 'Discrete Mathematics', 'L1T3', 0),
(42, 'CSE', 'CSE132', 'Electrical Circuits', 'L1T3', 0),
(43, 'CSE', 'CSE134', 'Data Structures', 'L1T3', 0),
(44, 'CSE', 'MAT131', 'Mathematics - III:Ordinary and Partial Differential Equations ', 'L1T3', 0),
(45, 'CSE', 'MAT211', 'Mathematics - IV: Engineering Mathematics', 'L2T1', 0),
(46, 'CSE', 'CSE212', 'Digital Electronics', 'L2T1', 0),
(47, 'CSE', 'CSE214', 'Object Oriented Programming', 'L2T1', 0),
(48, 'CSE', 'GED201', 'Bangladesh Studies', 'L2T1', 0),
(49, 'CSE', 'CSE221', 'Algorithm', 'L2T2', 0),
(50, 'CSE', 'STA133', 'Statistics and Probability', 'L2T2', 0),
(51, 'CSE', 'CSE224', 'Electronic Devices and Circuits', 'L2T2', 0),
(52, 'CSE', 'CSE231', 'Microprocessor and Assembly Language', 'L2T3', 0),
(53, 'CSE', 'CSE233', 'Data Communication', 'L2T3', 0),
(54, 'CSE', 'CSE234', 'Numerical Methods', 'L2T3', 0),
(55, 'CSE', 'CSE235', 'Introduction to Bio-informatics', 'L2T3', 0),
(56, 'CSE', 'CSE233', 'Data Communication', '26', 1),
(57, 'CSE', 'ENG113', 'English Language - I', '29', 1),
(58, 'CSE', 'CSE221', 'Theory of Computing', '27', 1),
(59, 'CSE', 'CSE213', 'Algorithms', '28', 1),
(60, 'CSE', 'ACC214', 'Accounting', '28', 1),
(62, 'CSE', 'CSE222', 'Object Oriented Programming', '27', 1),
(63, 'CSE', 'CSE224', 'Electronic Devices and Circuits', '26', 1),
(64, 'CSE', 'PHY123', 'Physics- II: Electricity, Magnetism and Modern Physics', '29', 1),
(65, 'CSE', 'CSE411', 'Communication Engineering', '22', 1),
(67, 'CSE', 'MAT211', 'Mathematics - IV: Engineering Mathematics', '27', 1),
(68, 'CSE', 'CSE431', 'E-Commerce & Web Application', '23', 1),
(69, 'CSE', 'CSE311', 'Database Manaagement System', '25', 1),
(70, 'CSE', 'CSE413', 'Simulation and Modeling', '24', 1),
(71, 'CSE', 'CSE231', 'Microprocessor and Assembly Language', '26', 1),
(72, 'CSE', 'MAT134', 'Mathematics - III:Ordinary and Partial Differential Equations ', '28', 1),
(73, 'CSE', 'CSE432', 'Computer and Network Security', '21', 1),
(74, 'CSE', 'CSE131', 'Discrete Mathematics', '29', 1),
(75, 'CSE', 'MGT414', 'Industrial Management', '23', 1),
(76, 'CSE', 'CSE323', 'Operating System', '24', 1),
(77, 'CSE', 'CSE313', 'Computer Network', '25', 1),
(79, 'CSE', 'CSE232', 'Instrumentation and Control', '26', 1),
(80, 'CSE', 'MAT223', 'Statistics', '27', 1),
(81, 'CSE', 'ECO314', 'Economics', '28', 1),
(83, 'CSE', 'PHY123', 'Physics - II: Electicity: Magnetism and Modern Physics', 'L1T2', 0),
(84, 'CSE', 'CSE332', 'Software Engineering', '22', 1),
(86, 'CSE', 'CSE333', 'Peripherals & Interfacing', '21', 1),
(87, 'CSE', 'CSE421', 'Computer Graphics', '23', 1),
(88, 'CSE', 'MAT121', 'Mathematics - II: Linear Algebra and Coordinate Geometry', '29', 1),
(89, 'CSE', 'CSE412', 'Artificial Intelligence', 'L4T1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE IF NOT EXISTS `courseteacher` (
  `ct_id` int(12) NOT NULL,
  `course_teacher` text NOT NULL,
  `course_id` text NOT NULL,
  `department` text NOT NULL,
  `batch` text NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`ct_id`, `course_teacher`, `course_id`, `department`, `batch`, `section`) VALUES
(2, 'HH', 'CSE333', 'CSE', '21', 'A'),
(3, 'ABA', 'CSE432', 'CSE', '21', 'A'),
(4, 'FA', 'CSE332', 'CSE', '22', 'A'),
(5, 'TK', 'CSE411', 'CSE', '22', 'A'),
(6, 'BAA', 'CSE412', 'CSE', '22', 'A'),
(7, 'MO', 'CSE321', 'CSE', '23', 'A'),
(8, 'TK', 'CSE421', 'CSE', '23', 'A'),
(9, 'BAA', 'CSE431', 'CSE', '23', 'A'),
(10, 'PN', 'MGT414', 'CSE', '23', 'A'),
(11, 'PL', 'CSE323', 'CSE', '24', 'A'),
(12, 'FA', 'CSE331', 'CSE', '24', 'A'),
(13, 'NR', 'CSE413', 'CSE', '24', 'A'),
(14, 'AAH', 'CSE311', 'CSE', '25', 'A'),
(15, 'NR', 'CSE312', 'CSE', '25', 'A'),
(16, 'TT', 'CSE313', 'CSE', '25', 'A'),
(17, 'MM', 'CSE322', 'CSE', '25', 'A'),
(18, 'PA', 'CSE224', 'CSE', '26', 'A'),
(19, 'AL', 'CSE231', 'CSE', '26', 'A'),
(20, 'TY', 'CSE232', 'CSE', '26', 'A'),
(21, 'MO', 'CSE233', 'CSE', '26', 'A'),
(22, 'AY', 'CSE221', 'CSE', '27', 'A'),
(23, 'BAA', 'CSE222', 'CSE', '27', 'A'),
(24, 'MR', 'MAT211', 'CSE', '27', 'A'),
(25, 'PO', 'MAT223', 'CSE', '27', 'A'),
(26, 'PN', 'ACC214', 'CSE', '28', 'A'),
(27, 'PL', 'CSE213', 'CSE', '28', 'A'),
(28, 'PN', 'ECO314', 'CSE', '28', 'A'),
(29, 'AN', 'MAT134', 'CSE', '28', 'A'),
(30, 'MR', 'CSE131', 'CSE', '29', 'A'),
(31, 'MR', 'CSE131', 'CSE', '29', 'B'),
(32, 'AB', 'ENG113', 'CSE', '29', 'A'),
(33, 'TN', 'ENG113', 'CSE', '29', 'B'),
(34, 'AN', 'MAT121', 'CSE', '29', 'A'),
(35, 'CN', 'MAT121', 'CSE', '29', 'B'),
(36, 'KEH', 'PHY113', 'CSE', '29', 'A'),
(37, 'KEH', 'PHY113', 'CSE', '29', 'B'),
(38, 'ZZ', 'CSE112', 'CSE', 'L1T1', 'A'),
(39, 'ZZ', 'CSE112', 'CSE', 'L1T1', 'B'),
(40, 'TR', 'CSE112', 'CSE', 'L1T1', 'C'),
(41, 'TR', 'CSE112', 'CSE', 'L1T1', 'D'),
(42, 'TS', 'ENG113', 'CSE', 'L1T1', 'A'),
(43, 'TS', 'ENG113', 'CSE', 'L1T1', 'B'),
(44, 'TS', 'ENG113', 'CSE', 'L1T1', 'C'),
(45, 'TS', 'ENG113', 'CSE', 'L1T1', 'D'),
(46, 'MJU', 'MAT111', 'CSE', 'L1T1', 'A'),
(47, 'MJU', 'MAT111', 'CSE', 'L1T1', 'B'),
(48, 'MJU', 'MAT111', 'CSE', 'L1T1', 'C'),
(49, 'MJU', 'MAT111', 'CSE', 'L1T1', 'D'),
(50, 'MSN', 'PHY113', 'CSE', 'L1T1', 'A'),
(51, 'MSN', 'PHY113', 'CSE', 'L1T1', 'B'),
(52, 'SPT', 'PHY113', 'CSE', 'L1T1', 'C'),
(53, 'SPT', 'PHY113', 'CSE', 'L1T1', 'D'),
(54, 'SAH', 'CSE122', 'CSE', 'L1T2', 'A'),
(55, 'MSA', 'CSE122', 'CSE', 'L1T2', 'B'),
(56, 'MSA', 'CSE122', 'CSE', 'L1T2', 'C'),
(57, 'NN', 'ENG123', 'CSE', 'L1T2', 'A'),
(58, 'NN', 'ENG123', 'CSE', 'L1T2', 'B'),
(59, 'NN', 'ENG123', 'CSE', 'L1T2', 'C'),
(60, 'MSP', 'PHY123', 'CSE', 'L1T2', 'A'),
(61, 'MSP', 'PHY123', 'CSE', 'L1T2', 'B'),
(62, 'MSP', 'PHY123', 'CSE', 'L1T2', 'C'),
(63, 'SL', 'CSE131', 'CSE', 'L1T3', 'A'),
(64, 'SL', 'CSE131', 'CSE', 'L1T3', 'B'),
(65, 'SL', 'CSE131', 'CSE', 'L1T3', 'C'),
(66, 'HR', 'CSE132', 'CSE', 'L1T3', 'A'),
(67, 'HR', 'CSE132', 'CSE', 'L1T3', 'B'),
(68, 'HR', 'CSE132', 'CSE', 'L1T3', 'C'),
(69, 'SAH', 'CSE134', 'CSE', 'L1T3', 'A'),
(70, 'MR', 'CSE134', 'CSE', 'L1T3', 'B'),
(71, 'MR', 'CSE134', 'CSE', 'L1T3', 'C'),
(72, 'BCD', 'MAT131', 'CSE', 'L1T3', 'A'),
(73, 'BCD', 'MAT131', 'CSE', 'L1T3', 'B'),
(74, 'BCD', 'MAT131', 'CSE', 'L1T3', 'C'),
(75, 'NF', 'CSE212', 'CSE', 'L2T1', 'A'),
(76, 'NF', 'CSE212', 'CSE', 'L2T1', 'B'),
(77, 'NF', 'CSE212', 'CSE', 'L2T1', 'C'),
(78, 'SAH', 'CSE214', 'CSE', 'L2T1', 'A'),
(79, 'SJM', 'CSE214', 'CSE', 'L2T1', 'B'),
(80, 'SJM', 'CSE214', 'CSE', 'L2T1', 'C'),
(81, 'JUS', 'GED201', 'CSE', 'L2T1', 'A'),
(82, 'JUS', 'GED201', 'CSE', 'L2T1', 'B'),
(83, 'JUS', 'GED201', 'CSE', 'L2T1', 'C'),
(84, 'BCD', 'MAT211', 'CSE', 'L2T1', 'A'),
(85, 'BCD', 'MAT211', 'CSE', 'L2T1', 'B'),
(86, 'BCD', 'MAT211', 'CSE', 'L2T1', 'C'),
(87, 'SN', 'CSE221', 'CSE', 'L2T2', 'A'),
(88, 'SN', 'CSE221', 'CSE', 'L2T2', 'B'),
(89, 'TH', 'CSE224', 'CSE', 'L2T2', 'A'),
(90, 'TH', 'CSE224', 'CSE', 'L2T2', 'B'),
(91, 'DJ', 'STA133', 'CSE', 'L2T2', 'A'),
(92, 'DJ', 'STA133', 'CSE', 'L2T2', 'B'),
(93, 'FTJ', 'CSE231', 'CSE', 'L2T3', 'A'),
(94, 'FTJ', 'CSE231', 'CSE', 'L2T3', 'B'),
(95, 'FN', 'CSE233', 'CSE', 'L2T3', 'A'),
(96, 'FN', 'CSE233', 'CSE', 'L2T3', 'B'),
(97, 'MJU', 'CSE234', 'CSE', 'L2T3', 'A'),
(98, 'MJU', 'CSE234', 'CSE', 'L2T3', 'B'),
(99, 'RH', 'CSE235', 'CSE', 'L2T3', 'A'),
(100, 'RH', 'CSE235', 'CSE', 'L2T3', 'B'),
(101, 'MTR', 'CSE311', 'CSE', 'L3T1', 'A'),
(102, 'MTR', 'CSE311', 'CSE', 'L3T1', 'B'),
(103, 'NRC', 'CSE313', 'CSE', 'L3T1', 'A'),
(104, 'NRC', 'CSE313', 'CSE', 'L3T1', 'B'),
(105, 'MRR', 'GED321', 'CSE', 'L3T1', 'A'),
(106, 'MRR', 'GED321', 'CSE', 'L3T1', 'B'),
(107, 'TT', 'CSE321', 'CSE', 'L3T2', 'A'),
(108, 'TT', 'CSE321', 'CSE', 'L3T2', 'B'),
(109, 'MFH', 'CSE322', 'CSE', 'L3T2', 'A'),
(110, 'FTJ', 'CSE322', 'CSE', 'L3T2', 'B'),
(111, 'SL', 'CSE323', 'CSE', 'L3T2', 'A'),
(112, 'SL', 'CSE323', 'CSE', 'L3T2', 'B'),
(113, 'MNT', 'ECO314', 'CSE', 'L3T2', 'A'),
(114, 'MNT', 'ECO314', 'CSE', 'L3T2', 'B'),
(115, 'FP', 'ACT301', 'CSE', 'L3T3', 'A'),
(116, 'SAMM', 'CSE331', 'CSE', 'L3T3', 'A'),
(117, 'SAH', 'CSE333', 'CSE', 'L3T3', 'A'),
(118, 'MAH', 'CSE334', 'CSE', 'L3T3', 'A'),
(119, 'IRS', 'CSE412', 'CSE', 'L4T1', 'A'),
(120, 'MR', 'CSE414', 'CSE', 'L4T1', 'A'),
(121, 'MAH', 'CSE417', 'CSE', 'L4T1', 'A'),
(122, 'UH', 'CSE421', 'CSE', 'L4T2', 'A'),
(123, 'FF', 'CSE423', 'CSE', 'L4T2', 'A'),
(124, 'SAH', 'CSE450', 'CSE', 'L4T2', 'A'),
(125, 'MHZ', 'CSE433', 'CSE', 'L4T3', 'A'),
(126, 'NR', 'CSE498', 'CSE', 'L4T3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(12) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'CSE'),
(2, 'EEE'),
(3, 'ETE'),
(4, 'TE'),
(5, 'SWE'),
(6, 'BPharm'),
(7, 'CIS'),
(8, 'NFE'),
(9, 'LLB'),
(10, 'English'),
(11, 'Physics'),
(12, 'Chemistry'),
(13, 'BTHM'),
(14, 'BBA'),
(15, 'BRE'),
(16, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `registation`
--

CREATE TABLE IF NOT EXISTS `registation` (
  `username` varchar(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registation`
--

INSERT INTO `registation` (`username`, `userid`, `password`) VALUES
('Sagor', 131152218, '131152218'),
('Uzzal Kar', 131152302, '131152302'),
('sadrul', 131152402, '131152402'),
('rr', 710000399, '710000399'),
('ff', 710001697, '710001697');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `room_number` text NOT NULL,
  `building_name` text NOT NULL,
  `department` text NOT NULL,
  `room_capacity` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`, `building_name`, `department`, `room_capacity`) VALUES
(2, '102CSEB', 'DT4', 'CSE', 10),
(3, '601CSEB', 'DT4', 'CSE', 8),
(4, '602CSEB', 'DT4', 'CSE', 9),
(5, '701CSEB', 'DT4', 'CSE', 8),
(6, '702CSEB', 'DT4', 'CSE', 9),
(7, '801CSEB', 'DT4', 'CSE', 8),
(8, '802CSEB', 'DT4', 'CSE', 9),
(9, '901CSEB', 'DT4', 'CSE', 7),
(10, '902CSEB', 'DT4', 'CSE', 9),
(11, '101CSEB', 'DT4', 'CSE', 7),
(12, '903CSEB', 'DT4', 'CSE', 6);

-- --------------------------------------------------------

--
-- Table structure for table `room_allot`
--

CREATE TABLE IF NOT EXISTS `room_allot` (
  `id` int(12) NOT NULL,
  `room_number` text NOT NULL,
  `department` text NOT NULL,
  `date` date NOT NULL,
  `slot` text NOT NULL,
  `teacher1` int(20) NOT NULL,
  `teacher2` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_allot`
--

INSERT INTO `room_allot` (`id`, `room_number`, `department`, `date`, `slot`, `teacher1`, `teacher2`) VALUES
(161, '101CSEB', 'CSE', '2016-12-17', 'A', 710001430, 710000399),
(162, '102CSEB', 'CSE', '2016-12-17', 'A', 710001710, 710001446),
(163, '601CSEB', 'CSE', '2016-12-17', 'A', 710001511, 710000985),
(164, '602CSEB', 'CSE', '2016-12-17', 'A', 710001516, 710001512),
(165, '701CSEB', 'CSE', '2016-12-17', 'A', 710001621, 710001564),
(166, '101CSEB', 'CSE', '2016-12-17', 'B', 710001446, 710001428),
(167, '102CSEB', 'CSE', '2016-12-17', 'B', 710001338, 710001051),
(168, '101CSEB', 'CSE', '2016-12-17', 'C', 710001709, 710001668),
(169, '102CSEB', 'CSE', '2016-12-17', 'C', 710000985, 710001233),
(170, '601CSEB', 'CSE', '2016-12-17', 'C', 710001514, 710001513),
(171, '602CSEB', 'CSE', '2016-12-17', 'C', 710001630, 710001625),
(172, '701CSEB', 'CSE', '2016-12-17', 'C', 710001300, 710001631),
(173, '101CSEB', 'CSE', '2016-12-17', 'D', 710001468, 710001429),
(174, '102CSEB', 'CSE', '2016-12-17', 'D', 710001624, 710001473),
(175, '601CSEB', 'CSE', '2016-12-17', 'D', 710001450, 710001628),
(176, '602CSEB', 'CSE', '2016-12-17', 'D', 710001338, 710000187),
(177, '701CSEB', 'CSE', '2016-12-17', 'D', 710000878, 710001300);

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE IF NOT EXISTS `routine` (
  `r_id` int(12) NOT NULL,
  `course_id` text NOT NULL,
  `batch` text NOT NULL,
  `department` text NOT NULL,
  `date` date NOT NULL,
  `slot` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`r_id`, `course_id`, `batch`, `department`, `date`, `slot`) VALUES
(102, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A'),
(103, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A'),
(104, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B'),
(105, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B'),
(106, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C'),
(107, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C'),
(108, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C'),
(109, 'CSE431', '23', 'CSE', '2016-12-17', 'D'),
(110, 'CSE322', '25', 'CSE', '2016-12-17', 'D'),
(111, 'CSE233', '26', 'CSE', '2016-12-17', 'D'),
(112, 'MAT121', '29', 'CSE', '2016-12-17', 'D'),
(113, 'CSE333', '21', 'CSE', '2016-12-17', 'D'),
(114, 'CSE134', 'L1T3', 'CSE', '2016-12-18', 'A'),
(115, 'CSE412', 'L4T1', 'CSE', '2016-12-18', 'A'),
(116, 'CSE212', 'L2T1', 'CSE', '2016-12-18', 'B'),
(117, 'CSE235', 'L2T3', 'CSE', '2016-12-18', 'C'),
(118, 'CSE433', 'L4T3', 'CSE', '2016-12-18', 'C'),
(119, 'CSE331', '24', 'CSE', '2016-12-18', 'D'),
(120, 'CSE411', '22', 'CSE', '2016-12-18', 'D'),
(121, 'MAT223', '27', 'CSE', '2016-12-18', 'D'),
(122, 'ACC214', '28', 'CSE', '2016-12-18', 'D'),
(123, 'PHY113', 'L1T1', 'CSE', '2016-12-19', 'A'),
(124, 'CSE423', 'L4T2', 'CSE', '2016-12-19', 'A'),
(125, 'CSE333', 'L3T3', 'CSE', '2016-12-19', 'B'),
(126, 'STA133', 'L1T3', 'CSE', '2016-12-19', 'B'),
(127, 'ENG123', 'L1T2', 'CSE', '2016-12-19', 'C'),
(128, 'CSE323', 'L3T2', 'CSE', '2016-12-19', 'C'),
(129, 'MGT414', '23', 'CSE', '2016-12-19', 'D'),
(130, 'CSE313', '25', 'CSE', '2016-12-19', 'D'),
(131, 'CSE231', '26', 'CSE', '2016-12-19', 'D'),
(132, 'ENG113', '29', 'CSE', '2016-12-19', 'D'),
(133, 'CSE432', '21', 'CSE', '2016-12-19', 'D'),
(134, 'CSE131', 'L1T3', 'CSE', '2016-12-20', 'A'),
(135, 'CSE311', 'L3T1', 'CSE', '2016-12-20', 'A'),
(136, 'CSE214', 'L2T1', 'CSE', '2016-12-20', 'B'),
(137, 'CSE498', 'L4T3', 'CSE', '2016-12-20', 'B'),
(138, 'CSE231', 'L2T3', 'CSE', '2016-12-20', 'C'),
(139, 'CSE414', 'L4T1', 'CSE', '2016-12-20', 'C'),
(140, 'CSE413', '24', 'CSE', '2016-12-20', 'D'),
(141, 'CSE412', '22', 'CSE', '2016-12-20', 'D'),
(142, 'CSE222', '27', 'CSE', '2016-12-20', 'D'),
(143, 'ECO314', '28', 'CSE', '2016-12-20', 'D'),
(144, 'MAT111', 'L1T1', 'CSE', '2016-12-21', 'A'),
(145, 'CSE421', 'L4T2', 'CSE', '2016-12-21', 'A'),
(146, 'MAT121', 'L1T2', 'CSE', '2016-12-21', 'B'),
(147, 'CSE334', 'L3T3', 'CSE', '2016-12-21', 'B'),
(148, 'CSE224', 'L2T2', 'CSE', '2016-12-21', 'C'),
(149, 'CSE321', 'L3T2', 'CSE', '2016-12-21', 'C'),
(150, 'CSE321', '23', 'CSE', '2016-12-21', 'D'),
(151, 'CSE311', '25', 'CSE', '2016-12-21', 'D'),
(152, 'CSE224', '26', 'CSE', '2016-12-21', 'D'),
(153, 'CSE131', '29', 'CSE', '2016-12-21', 'D'),
(154, 'MAT131', 'L1T3', 'CSE', '2016-12-22', 'A'),
(155, 'CSE417', 'L4T1', 'CSE', '2016-12-22', 'A'),
(156, 'GED201', 'L2T1', 'CSE', '2016-12-22', 'B'),
(157, 'GED321', 'L3T1', 'CSE', '2016-12-22', 'B'),
(158, 'CSE233', 'L2T3', 'CSE', '2016-12-22', 'C'),
(159, 'CSE323', '24', 'CSE', '2016-12-22', 'D'),
(160, 'CSE332', '22', 'CSE', '2016-12-22', 'D'),
(161, 'MAT211', '27', 'CSE', '2016-12-22', 'D'),
(162, 'MAT134', '28', 'CSE', '2016-12-22', 'D'),
(163, 'CSE112', 'L1T1', 'CSE', '2016-12-24', 'A'),
(164, 'CSE132', 'L1T3', 'CSE', '2016-12-24', 'A'),
(165, 'PHY123', 'L1T2', 'CSE', '2016-12-24', 'B'),
(166, 'ACT301', 'L3T3', 'CSE', '2016-12-24', 'B'),
(167, 'MAT211', 'L2T1', 'CSE', '2016-12-24', 'B'),
(168, 'CSE234', 'L2T3', 'CSE', '2016-12-24', 'C'),
(169, 'ECO314', 'L3T2', 'CSE', '2016-12-24', 'C'),
(170, 'CSE421', '23', 'CSE', '2016-12-24', 'D'),
(171, 'CSE312', '25', 'CSE', '2016-12-24', 'D'),
(172, 'CSE232', '26', 'CSE', '2016-12-24', 'D'),
(173, 'CSE213', '28', 'CSE', '2016-12-24', 'D'),
(174, 'CSE221', '27', 'CSE', '2016-12-24', 'D'),
(175, 'PHY123', '29', 'CSE', '2016-12-24', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE IF NOT EXISTS `slot` (
  `id` int(12) NOT NULL,
  `slot` text NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `slot`, `timefrom`, `timeto`) VALUES
(1, 'A', '09:00:00', '11:00:00'),
(2, 'B', '12:00:00', '14:00:00'),
(3, 'C', '15:00:00', '17:00:00'),
(4, 'D', '18:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `studentseat`
--

CREATE TABLE IF NOT EXISTS `studentseat` (
  `ss_id` int(12) NOT NULL,
  `course_id` text NOT NULL,
  `batch` text NOT NULL,
  `department` text NOT NULL,
  `date` date NOT NULL,
  `slot` text NOT NULL,
  `room_number` text NOT NULL,
  `col` int(12) NOT NULL,
  `capacity` int(12) NOT NULL,
  `section` text NOT NULL,
  `courseteacher` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2597 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentseat`
--

INSERT INTO `studentseat` (`ss_id`, `course_id`, `batch`, `department`, `date`, `slot`, `room_number`, `col`, `capacity`, `section`, `courseteacher`) VALUES
(2495, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '101CSEB', 2, 8, '(A)', 'SN'),
(2496, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '101CSEB', 4, 8, '(A)', 'SN'),
(2497, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '101CSEB', 6, 8, '(A)', 'SN'),
(2498, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '101CSEB', 1, 7, '(A)', 'TS'),
(2499, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '101CSEB', 3, 8, '(A)', 'TS'),
(2500, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '101CSEB', 5, 8, '(A)', 'TS'),
(2501, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '101CSEB', 7, 6, '(A)', 'TS'),
(2502, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '102CSEB', 2, 12, '(A+B)', 'SN'),
(2503, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '102CSEB', 4, 12, '(B)', 'SN'),
(2504, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '102CSEB', 6, 12, '(B)', 'SN'),
(2505, 'CSE221', 'L2T2', 'CSE', '2016-12-17', 'A', '102CSEB', 8, 12, '(B)', 'SN'),
(2506, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '102CSEB', 1, 10, '(A+B)', 'TS'),
(2507, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '102CSEB', 3, 12, '(B)', 'TS'),
(2508, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '102CSEB', 5, 12, '(B)', 'TS'),
(2509, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '102CSEB', 7, 12, '(B+C)', 'TS'),
(2510, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '102CSEB', 9, 12, '(C)', 'TS'),
(2511, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '601CSEB', 1, 6, '(C)', 'TS'),
(2512, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '601CSEB', 3, 7, '(C)', 'TS'),
(2513, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '601CSEB', 5, 7, '(C)', 'TS'),
(2514, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '601CSEB', 7, 3, '(C)', 'TS'),
(2515, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '602CSEB', 1, 4, '(D)', 'TS'),
(2516, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '602CSEB', 3, 4, '(D)', 'TS'),
(2517, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '602CSEB', 5, 4, '(D)', 'TS'),
(2518, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '602CSEB', 7, 7, '(D)', 'TS'),
(2519, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '602CSEB', 9, 7, '(D)', 'TS'),
(2520, 'ENG113', 'L1T1', 'CSE', '2016-12-17', 'A', '701CSEB', 1, 6, '(D)', 'TS'),
(2521, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B', '101CSEB', 2, 8, '(A)', 'SAMM'),
(2522, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B', '101CSEB', 4, 8, '(A)', 'SAMM'),
(2523, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B', '101CSEB', 6, 8, '(A)', 'SAMM'),
(2524, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '101CSEB', 1, 7, '(A)', 'MFH'),
(2525, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '101CSEB', 3, 8, '(A)', 'MFH'),
(2526, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '101CSEB', 5, 8, '(A)', 'MFH'),
(2527, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '101CSEB', 7, 6, '(A)', 'MFH'),
(2528, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B', '102CSEB', 2, 12, '(A)', 'SAMM'),
(2529, 'CSE331', 'L3T3', 'CSE', '2016-12-17', 'B', '102CSEB', 4, 12, '(A)', 'SAMM'),
(2530, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '102CSEB', 1, 10, '(A+B)', 'MFH+FTJ'),
(2531, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '102CSEB', 3, 12, '(B)', 'FTJ'),
(2532, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '102CSEB', 5, 12, '(B)', 'FTJ'),
(2533, 'CSE322', 'L3T2', 'CSE', '2016-12-17', 'B', '102CSEB', 7, 12, '(B)', 'FTJ'),
(2534, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '101CSEB', 2, 8, '(A)', 'NRC'),
(2535, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '101CSEB', 4, 8, '(A)', 'NRC'),
(2536, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '101CSEB', 6, 8, '(A)', 'NRC'),
(2537, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C', '101CSEB', 1, 7, '(A)', 'SAH'),
(2538, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C', '101CSEB', 3, 8, '(A)', 'SAH'),
(2539, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C', '101CSEB', 5, 8, '(A)', 'SAH'),
(2540, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C', '101CSEB', 7, 6, '(A)', 'SAH'),
(2541, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '102CSEB', 2, 12, '(A+B)', 'NRC'),
(2542, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '102CSEB', 4, 12, '(B)', 'NRC'),
(2543, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '102CSEB', 6, 12, '(B)', 'NRC'),
(2544, 'CSE313', 'L3T1', 'CSE', '2016-12-17', 'C', '102CSEB', 8, 12, '(B)', 'NRC'),
(2545, 'CSE450', 'L4T2', 'CSE', '2016-12-17', 'C', '102CSEB', 1, 10, '(A)', 'SAH'),
(2546, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '102CSEB', 5, 12, '(A)', 'SAH'),
(2547, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '102CSEB', 7, 12, '(A)', 'SAH'),
(2548, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '102CSEB', 9, 12, '(A+B)', 'SAH'),
(2549, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '601CSEB', 1, 6, '(B)', 'MSA'),
(2550, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '601CSEB', 3, 7, '(B)', 'MSA'),
(2551, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '601CSEB', 5, 7, '(B)', 'MSA'),
(2552, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '601CSEB', 7, 3, '(B)', 'MSA'),
(2553, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '602CSEB', 1, 4, '(B)', 'MSA'),
(2554, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '602CSEB', 3, 4, '(B)', 'MSA'),
(2555, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '602CSEB', 5, 4, '(B)', 'MSA'),
(2556, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '602CSEB', 7, 7, '(C)', 'MSA'),
(2557, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '602CSEB', 9, 7, '(C)', 'MSA'),
(2558, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '701CSEB', 1, 6, '(C)', 'MSA'),
(2559, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '701CSEB', 3, 7, '(C)', 'MSA'),
(2560, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '701CSEB', 5, 7, '(C)', 'MSA'),
(2561, 'CSE122', 'L1T2', 'CSE', '2016-12-17', 'C', '701CSEB', 7, 3, '(C)', 'MSA'),
(2562, 'CSE322', '25', 'CSE', '2016-12-17', 'D', '101CSEB', 2, 8, '(A)', 'MM'),
(2563, 'CSE322', '25', 'CSE', '2016-12-17', 'D', '101CSEB', 4, 8, '(A)', 'MM'),
(2564, 'CSE322', '25', 'CSE', '2016-12-17', 'D', '101CSEB', 6, 8, '(A)', 'MM'),
(2565, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '101CSEB', 1, 7, '(A)', 'BAA'),
(2566, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '101CSEB', 3, 8, '(A)', 'BAA'),
(2567, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '101CSEB', 5, 8, '(A)', 'BAA'),
(2568, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '101CSEB', 7, 6, '(A)', 'BAA'),
(2569, 'CSE322', '25', 'CSE', '2016-12-17', 'D', '102CSEB', 2, 12, '(A)', 'MM'),
(2570, 'CSE322', '25', 'CSE', '2016-12-17', 'D', '102CSEB', 4, 12, '(A)', 'MM'),
(2571, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '102CSEB', 8, 12, '(A)', 'AN'),
(2572, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '102CSEB', 10, 10, '(A)', 'AN'),
(2573, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '102CSEB', 1, 10, '(A)', 'BAA'),
(2574, 'CSE431', '23', 'CSE', '2016-12-17', 'D', '102CSEB', 3, 12, '(A)', 'BAA'),
(2575, 'CSE233', '26', 'CSE', '2016-12-17', 'D', '102CSEB', 7, 12, '(A)', 'MO'),
(2576, 'CSE233', '26', 'CSE', '2016-12-17', 'D', '102CSEB', 9, 12, '(A)', 'MO'),
(2577, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '601CSEB', 2, 7, '(A)', 'AN'),
(2578, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '601CSEB', 4, 7, '(A+B)', 'AN+CN'),
(2579, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '601CSEB', 6, 3, '(B)', 'CN'),
(2580, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '601CSEB', 8, 2, '(B)', 'CN'),
(2581, 'CSE233', '26', 'CSE', '2016-12-17', 'D', '601CSEB', 1, 6, '(A)', 'MO'),
(2582, 'CSE233', '26', 'CSE', '2016-12-17', 'D', '601CSEB', 3, 7, '(A)', 'MO'),
(2583, 'CSE233', '26', 'CSE', '2016-12-17', 'D', '601CSEB', 5, 7, '(A)', 'MO'),
(2584, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '602CSEB', 2, 4, '(B)', 'CN'),
(2585, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '602CSEB', 4, 4, '(B)', 'CN'),
(2586, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '602CSEB', 6, 6, '(B)', 'CN'),
(2587, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '602CSEB', 8, 7, '(B)', 'CN'),
(2588, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '602CSEB', 1, 4, '(A)', 'HH'),
(2589, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '602CSEB', 3, 4, '(A)', 'HH'),
(2590, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '602CSEB', 5, 4, '(A)', 'HH'),
(2591, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '602CSEB', 7, 7, '(A)', 'HH'),
(2592, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '602CSEB', 9, 7, '(A)', 'HH'),
(2593, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '701CSEB', 2, 7, '(B)', 'CN'),
(2594, 'MAT121', '29', 'CSE', '2016-12-17', 'D', '701CSEB', 4, 7, '(B)', 'CN'),
(2595, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '701CSEB', 1, 6, '(A)', 'HH'),
(2596, 'CSE333', '21', 'CSE', '2016-12-17', 'D', '701CSEB', 3, 7, '(A)', 'HH');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_name` text NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `teacher_initial` text NOT NULL,
  `teacher_designation` text NOT NULL,
  `department` text NOT NULL,
  `enrollment` int(3) NOT NULL,
  `available` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_name`, `teacher_id`, `teacher_initial`, `teacher_designation`, `department`, `enrollment`, `available`) VALUES
('Mr. Raja Tariqul Hasan Tusher', 71001287, 'RTH', '1', 'CSE', 12, 12),
('Md Zahid Hasan', 71001622, 'ZH', '3', 'CSE', 8, 8),
('Mr. A.K.M. Zaidi Satter', 710000187, 'AKMZS', '2', 'CSE', 10, 9),
('Mr. Md. Riazur Rahman', 710000399, 'RR', '1', 'CSE', 12, 11),
('Mr. Mohammad Monirul Islam', 710000519, 'MMI', '1', 'CSE', 12, 12),
('Ms. Subhenur Latif', 710000632, 'SL', '2', 'CSE', 10, 10),
('Ms. Nazmun Nessa Moon', 710000878, 'NNM', '3', 'CSE', 8, 7),
('Ms. Bushra Hossain', 710000938, 'BH', '1', 'CSE', 12, 12),
('Ms. Fernaz Narin Nur', 710000940, 'FNN', '2', 'CSE', 10, 10),
('Ms. Rashida Hasan', 710000984, 'RH', '1', 'CSE', 12, 12),
('Ms. Samia Nawshin', 710000985, 'SN', '1', 'CSE', 12, 10),
('Mr. Md. Sadekur Rahman', 710001051, 'MSR', '2', 'CSE', 10, 9),
('Mr. Mohammad Tafiqur Rahman', 710001152, 'MTR', '1', 'CSE', 12, 12),
('Ms. Nasrin Akter', 710001169, 'NA', '1', 'CSE', 12, 12),
('Mr. Md. Sazzadur Ahamed', 710001170, 'SA', '1', 'CSE', 12, 12),
('Ms. Israt Ferdous', 710001205, 'IF', '1', 'CSE', 12, 12),
('Ms. Narzu Tarannum', 710001206, 'NT', '1', 'CSE', 12, 12),
('Ms. Tansin Jahan', 710001233, 'TJ', '1', 'CSE', 12, 11),
('Mr. Muhammad Sarawar Jahan Morshed', 710001290, 'SJM', '3', 'CSE', 8, 8),
('Ms. Tasmia Tasrin', 710001291, 'TT', '1', 'CSE', 12, 12),
('Ms. Fariha Tasmin Jaigirdar', 710001300, 'FTJ', '3', 'CSE', 8, 6),
('Mr. Masud Rabbani', 710001316, 'MR', '1', 'CSE', 12, 12),
('Mr. Seraj Al Mahmud Mostafa', 710001338, 'SAMM', '2', 'CSE', 10, 8),
('Ms. Rifat Ara Shams', 710001345, 'RAS', '2', 'CSE', 10, 10),
('Ms. Moushumi Zaman Bonny', 710001390, 'MZB', '2', 'CSE', 10, 10),
('Ms. Taslima Akter', 710001427, 'TA', '1', 'CSE', 12, 12),
('Mr. Md. Tanvir Rahman', 710001428, 'TR', '1', 'CSE', 12, 11),
('Ms. Farhana Irin', 710001429, 'FI', '1', 'CSE', 12, 11),
('Ms. Zakia Zaman', 710001430, 'ZZ', '1', 'CSE', 12, 11),
('Rubaiya Hafiz', 710001433, 'MRH', '1', 'CSE', 12, 12),
('Nusrat Jahan', 710001446, 'NJ', '1', 'CSE', 12, 10),
('Ms. Most. Hasna Hena', 710001450, 'HH', '2', 'CSE', 10, 9),
('Mr. Md. Al Maruf', 710001468, 'MAM', '1', 'CSE', 12, 11),
('Ms. Nadira Anjum Nipa', 710001473, 'NAN', '1', 'CSE', 12, 11),
('Ms. Sharmistha Chanda Tista', 710001511, 'SCT', '1', 'CSE', 12, 11),
('Ms. Amena Khatun', 710001512, 'AK', '1', 'CSE', 12, 11),
('Mr. Md. Sayedul Arefin', 710001513, 'MSA', '1', 'CSE', 12, 11),
('Mr. Shah Md Tanvir Siddiquee', 710001514, 'MTS', '1', 'CSE', 12, 11),
('Mr. Shoeb Mohammad Shahriar', 710001516, 'MS', '1', 'CSE', 12, 11),
('Mr. Shaon Bhatta Shuvo', 710001517, 'SBS', '1', 'CSE', 12, 12),
('Ms. Afsara Tasneem Misha', 710001518, 'AT', '1', 'CSE', 12, 12),
('Ms. Refath Ara Hossain', 710001564, 'RAH', '1', 'CSE', 12, 11),
('Ms. Sumaiya Sultana Rika', 710001582, 'SSR', '1', 'CSE', 12, 12),
('Mr. Md. Tarek Habib', 710001621, 'TH', '3', 'CSE', 8, 7),
('Mr. Sadat Shahriar', 710001623, 'SS', '1', 'CSE', 12, 12),
('Mr. Mohshi Masnad', 710001624, 'MM', '1', 'CSE', 12, 11),
('Mr. Aniruddha Rakshit', 710001625, 'AR', '1', 'CSE', 12, 11),
('Mr. Md. Nazmul Hoq', 710001626, 'MNH', '1', 'CSE', 12, 12),
('Ms. Nayeema Sultana', 710001628, 'NS', '1', 'CSE', 12, 11),
('Mr. Md Mezbahul Islam', 710001629, 'MI', '1', 'CSE', 12, 12),
('Ms. Rabeya Akhter', 710001630, 'MRA', '1', 'CSE', 12, 11),
('Mr. Toufik Ahmed Emon', 710001631, 'TAE', '1', 'CSE', 12, 11),
('Ms. Mahbuba Maliha Mourin', 710001665, 'MMM', '1', 'CSE', 12, 12),
('Ms. Amatul Bushra Akhi', 710001668, 'ABA', '1', 'CSE', 12, 11),
('Mr. Fahad Faisal', 710001697, 'FF', '2', 'CSE', 10, 10),
('Mr. Abdullah Al-Mamun', 710001698, 'AAM', '2', 'CSE', 10, 10),
('Ms. Tamanna Yasmin', 710001699, 'TY', '1', 'CSE', 12, 12),
('Ms. Nusrat Zerin Zenia', 710001700, 'NZZ', '1', 'CSE', 12, 12),
('Mr. Muhammad Muhaiminul Islam', 710001701, 'MMMI', '1', 'CSE', 12, 12),
('Ms. Tasmin Chowdhury', 710001702, 'TC', '1', 'CSE', 12, 12),
('Ms. Bashira Akter Anima', 710001706, 'BAA', '1', 'CSE', 12, 12),
('Ms. Umme Hafsa Billah', 710001708, 'UH', '1', 'CSE', 12, 12),
('Ms. Fahmida Afrin', 710001709, 'FA', '1', 'CSE', 12, 11),
('Ms. Tania Khatun', 710001710, 'TK', '1', 'CSE', 12, 11),
('Mr. Naziour Rahaman', 710001733, 'NR', '1', 'CSE', 12, 12),
('Mr. Ohidujjaman', 710001743, 'MO', '1', 'CSE', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `teacherset`
--

CREATE TABLE IF NOT EXISTS `teacherset` (
  `id` int(12) NOT NULL,
  `teacher1` int(20) NOT NULL,
  `teacher2` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherset`
--

INSERT INTO `teacherset` (`id`, `teacher1`, `teacher2`) VALUES
(1, 710001468, 710001429),
(2, 710001624, 710001473),
(3, 710001450, 710001628),
(4, 710001338, 710000187),
(5, 710000878, 710001300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `col`
--
ALTER TABLE `col`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registation`
--
ALTER TABLE `registation`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_allot`
--
ALTER TABLE `room_allot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentseat`
--
ALTER TABLE `studentseat`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacherset`
--
ALTER TABLE `teacherset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `col`
--
ALTER TABLE `col`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `courseteacher`
--
ALTER TABLE `courseteacher`
  MODIFY `ct_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `room_allot`
--
ALTER TABLE `room_allot`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `r_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studentseat`
--
ALTER TABLE `studentseat`
  MODIFY `ss_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2597;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
