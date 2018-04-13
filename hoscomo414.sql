-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 10:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoscomo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `RegID` varchar(100) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Pword` varchar(100) NOT NULL,
  `MemDate` date NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `SOI` varchar(100) NOT NULL,
  `PBNO` bigint(20) NOT NULL,
  `collateral` text NOT NULL,
  `code` varchar(5) NOT NULL,
  `verify` int(1) NOT NULL DEFAULT '0',
  `QIDone` int(11) NOT NULL,
  `QIDtwo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`RegID`, `Fname`, `Lname`, `Mname`, `Uname`, `Pword`, `MemDate`, `DOB`, `Address`, `Contact`, `Email`, `Gender`, `reference`, `SOI`, `PBNO`, `collateral`, `code`, `verify`, `QIDone`, `QIDtwo`) VALUES
('aa201800027', 'aqw', 'asdq', 'qwdqw', 'aqwasdq', '1234', '2018-04-10', '1995-06-20', '2461 Middleville Road, Monrovia', '09205197067', 'qaz@gg.com', 'Male', '', 'None', 4645451548445, 'House', 'ADD9A', 0, 1, 2),
('AS201700009', 'Adriane', 'Schumacher', 'Mak', 'AdrianSchumacher', 'user8', '2018-04-04', '1992-01-30', '1560 Owen Lane, Traverse City, Michigan', '2319127206', 'asm@gmail.com', 'Male', '', '', 5525402315458268, '', '0', 0, 1, 6),
('BJ201800019', 'Bill', 'John', 'Jaducana', 'BillJohn', 'bill12345', '2018-04-03', '1998-09-01', 'bill', '09323266156', 'billjohn@yahoo.com', 'Male', 'wewe', '', 1212, '', '8ED32', 0, 1, 2),
('BS201700013', 'Brandy', 'Stern', 'Dana', 'BrandyStern', 'user12', '2017-03-30', '1966-08-29', '1688 Gladwell Street, HOUSTON, Texas', '2319127206', 'bsd@gmail.com', 'Male', '', '', 5442224960655125, '', '0', 0, 1, 6),
('CH201700008', 'Chiquita', 'Hernandez', 'Wort', 'ChiquitaHernandez', 'user7', '2017-03-30', '1994-05-23', '1226 Hamilton Drive, Hanover, Maryland', '2319127206', 'chw@gmail.com', 'Female', '', '', 5121050434560130, '', '0', 0, 1, 6),
('CK201700012', 'Courtney', 'Kellog', 'Jas', 'CourtneyKellog', 'user11', '2017-03-30', '1985-10-03', '1953 Grant View Drive, Milwaukee, Wisconsin', '2319127206', 'asm@gmail.com', 'Female', '', '', 4532446226214108, '', '0', 0, 1, 6),
('CV201700002', 'Jennesa', 'Seras', 'General', 'JennesaSeras', 'user1', '2017-03-30', '1998-10-28', '2461 Middleville Road, Monrovia, ', '09054948358', 'cvj@gmail.com', 'Female', '', '', 5180926136384143, '', '0', 1, 1, 6),
('EB201800022', 'Erald', 'Belena', 'Cabal', 'EraldBelena', 'eraldbelena', '2018-04-03', '1998-03-04', 'Upper malubog cebu City', '09177731771', 'erald2018@gmail.com', 'Male', 'Teaching', '', 6565676, '', '6861C', 0, 1, 2),
('EM201700007', 'Eileen', 'Matthews', 'Dian', 'EileenMatthews', 'user6', '2017-03-30', '1981-06-03', '2342 Adams Avenue, MEDFORD, Oregon', '2319127206', 'amd@gmail.com', 'Female', '', '', 5301394646589525, '', '0', 0, 1, 6),
('FA201800018', 'Fritzel', 'Assd', 'Alcuizar', 'FritzelAssd', '123123', '2018-04-03', '1998-12-12', 'asdasd', '09422191516', 'asda@yahoo.com', 'Male', '123123', '', 123, '', 'C476C', 0, 1, 2),
('GP201700015', 'Gabrielle', 'Polintan', 'Jimenez', 'GabriellePolintan', 'gabemain', '2017-03-31', '1997-03-29', '268 B Army Rd. Veterans Village, Brgy. Holy Spirit Q.C.', '2319127206', 'gabepolintan@gmail.com', 'Male', '', '', 234561765487887, '', '0', 0, 1, 6),
('JG201700003', 'Judith', 'Gina', 'Drumheller', 'JudithGina', 'user2', '2017-03-30', '1996-02-08', '4559 Tator Patch Road, Elk Grove Village, Illinois', '2319127206', 'jgd@gmail.com', 'Female', '', '', 5576210625350127, '', '0', 0, 1, 6),
('JG201800016', 'John', 'Go', 'Ellie', 'JohnGo', '123123', '2018-04-03', '1998-12-23', 'asdsad', '09979103357', '123123@yahoo.com', 'Male', '115123', '', 12312, '', '1F960', 0, 1, 2),
('KD201700010', 'Keri', 'Dinapoli', 'Caz', 'KeriDinapoli', 'user9', '2017-03-30', '1960-11-22', '1423 Filbert Street, Bensalem, Pennsylvania', '2319127206', 'kdc@gmail.com', 'Female', '', '', 5153552109407639, '', '0', 0, 1, 6),
('KI201700001', 'Killian', 'IIao', 'Toribio', 'KillianIlao', 'usermain', '0000-00-00', '1998-09-07', '53B Don Matias St., Don Antonio Heights, Quezon City', '2319127206', 'klite2nd@gmail.com', 'Male', '', '', 112548987621, '', '0', 0, 1, 6),
('ME201800020', 'Maria', 'Estrella', 'Juana', 'MariaEstrella', 'maria12345', '2018-04-03', '1996-09-03', 'Talisay City', '09322159289', 'maria@gmail.com', 'Male', 'Teaching', '', 12121, '', 'C7D9C', 0, 1, 2),
('MK201700005', 'Adriane', 'Schumacher', 'Mak', 'MargieKaufman', 'user4', '2017-03-30', '1965-03-29', '3120 White Avenue, Corpus Christi, Texas', '2319127206', 'asm@gmail.com', 'Female', '', '', 5160317766811965, '', '0', 0, 1, 6),
('MT201700011', 'Adriane', 'Schumacher', 'Mak', 'MarkTyler', 'user10', '2017-03-30', '1985-12-27', '4537 Green Street, Franklin, Tennessee', '2319127206', 'asm@gmail.com', 'Male', '', '', 4929234548435788, '', '0', 0, 1, 6),
('NF201800021', 'Noreen', 'Fuentes', 'Bbbb', 'NoreenFuentes', 'noreen', '2018-04-03', '2000-03-31', 'Busay, Cebu City', '09255001355', 'noreen@gmail.com', 'Female', 'Business', '', 9098987, '', '9629B', 0, 1, 2),
('PB201700004', 'Adriane', 'Schumacher', 'Mak', 'PaulBrody', 'user3', '2017-03-30', '1974-07-04', '4802 Ersel Street, Dallas, Texas', '2319127206', 'asm@gmail.com', 'Male', '', '', 5563640783996821, '', '0', 0, 1, 6),
('PM201700014', 'Adriane', 'Schumacher', 'Mak', 'PaulineMagbual', 'KILLIAN', '2017-03-31', '1998-07-07', '54B Don Matias, Don Antonio, Quezon City', '2319127206', 'asm@gmail.com', 'Female', '', '', 986533557874367, '', '0', 0, 1, 6),
('qM201800026', 'qwer', 'Moe', 'mroot', 'qwerMoe', '123456', '2018-04-09', '1997-06-19', '2461 Middleville Road, Monrovia', '092051970672', 'mindlesh13@gmail.com', 'Male', '', 'OFW', 5442224960655125, 'House', '4F110', 1, 1, 2),
('rl201800024', 'root', 'lroot', 'mroot', 'rootlroot', '123456', '2018-04-09', '1997-02-12', '2461 Middleville Road, Monrovia', '04245757', 'abc@gmail.com', 'Male', '', 'OFW', 5442224960655125, '', 'CFC74', 0, 1, 2),
('rl201800025', 'rootw', 'lroot', 'mroot', 'rootwlroot', '123456', '2018-04-09', '1996-07-10', '2461 Middleville Road, Monrovia', '09054948358', 'zxc@gmail.com', 'Male', '', 'OFW', 5442224960655125, '', 'C3489', 0, 1, 2),
('TT201800018', 'Tanya', 'Tanya', 'Tanya', 'TanyaTanya', '123123', '2018-04-03', '1998-12-12', 'tayan', '09056533341', 'tanya@yahoo.com', 'Male', '123123', '', 123123, '', '49BC0', 0, 1, 2),
('VE201800023', 'Victoria', 'Ester', 'Lola', 'VictoriaEster', 'VICTORIA1234', '2018-04-05', '1998-09-08', 'Banawa', '09089859969', 'victoria1234@gmail.com', 'Male', 'teaching', '', 12233242, '', '09D99', 0, 1, 2),
('WF201700006', 'William', 'French', 'Anton', 'WilliamFrench', 'user5', '2017-03-30', '1977-07-13', '496 Sunny Glen Lane, Shaker Heights, Ohio', '2319127206', 'wfa@gmail.com', 'Male', '', '', 5180935578755769, '', '0', 0, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(100) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(13) NOT NULL,
  `Pword` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Uname`, `Fname`, `Lname`, `Mname`, `Email`, `Contact`, `Pword`, `isActive`) VALUES
('ADMIN-aaa201800004', '', 'admin1', 'admin2', 'admin3', 'admin123@admin.com', '09214454', '4321', 1),
('ADMIN-JDD201700002', 'JohnDoe', 'John', 'Doe', 'Dominican', 'jdd.a@admin.com', '09178250475', 'g0TIoJ94U5', 1),
('ADMIN-KMI201700001', 'Killian', 'Killian Maynard', 'Ilao', 'Toribio', 'kmi.a@admin.com', '09178250475', 'adminmaster', 1),
('ERA778', 'Erald', 'Erald', 'Belena', 'C', 'eraldbelena@gmail.com', '9057722314', 'erald', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'admin', 'admin', 'Private', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `archive_useractive`
--

CREATE TABLE `archive_useractive` (
  `Archive_UAID` bigint(20) NOT NULL,
  `AdminID` varchar(100) NOT NULL,
  `Msg` varchar(255) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_useractive`
--

INSERT INTO `archive_useractive` (`Archive_UAID`, `AdminID`, `Msg`, `UserID`, `Date`) VALUES
(6, 'ADMIN-KMI201700001', 'ACTIVATION SUCCESS: Admin ID: ADMIN-KMI201700001 activated User ID: BS201700013 at 2017-04-01', 'BS201700013', '2017-04-01'),
(9, 'ADMIN-KMI201700001', 'ACTIVATION SUCCESS: Admin ID: ADMIN-KMI201700001 activated User ID: BS201700013 at 2017-04-01', 'BS201700013', '2017-04-01'),
(12, 'ADMIN-KMI201700001', 'ACTIVATION SUCCESS: Admin ID: ADMIN-KMI201700001 activated User ID: CH201700008 at 2018-03-07', 'CH201700008', '2018-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CatID` int(11) NOT NULL,
  `CatDesc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CatID`, `CatDesc`) VALUES
(1001, 'Home Cleaners'),
(1002, 'Laundry Care\r\n'),
(1003, 'Hand Hygiene');

-- --------------------------------------------------------

--
-- Table structure for table `credit_comm`
--

CREATE TABLE `credit_comm` (
  `CreditID` varchar(200) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(13) NOT NULL,
  `Pword` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_comm`
--

INSERT INTO `credit_comm` (`CreditID`, `Fname`, `Lname`, `Mname`, `Email`, `Contact`, `Pword`, `isActive`) VALUES
('CREDIT-AJP201700003', 'Alyzza', 'Polintan', 'Jimenez', 'alyzzapolintan@gmail.com', '09179324919', 'eJvuLQ4TKl', 1),
('CREDIT-ECB201800004', 'Erald ', 'Belena', 'Cabal', 'eraldbelena@gmail.com', '09084494496', 'JYn8l0RgFa', 1),
('CREDIT-JDD201700002', 'Jayne', 'Doe', 'Dominicano', 'jayned.cc@credit.com', '09978250475', 'EnACp6THbZ', 1),
('CREDIT-JRA201800005', 'James', 'Anthony', 'Racaza', 'gg@credit.com', '954528442', '123456', 1),
('CREDIT-KMI201700001', 'Killian Maynard', 'Ilao', 'Toribio', 'kmi.cc@credit.com', '09178250475', 'creditcommmaster', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `date`, `action`, `data`) VALUES
(104, '2018-04-03 10:26:13', 'Login', 'kmi.cc@credit.com'),
(105, '2018-04-03 11:18:27', 'Login', 'kmi.cc@credit.com'),
(106, '2018-04-03 12:06:49', 'Login', 'kmi.cc@credit.com'),
(107, '2018-04-03 12:22:45', 'Login', 'eraldbelena@gmail.com'),
(108, '2018-04-03 13:47:05', 'Login', 'billjohn@yahoo.com'),
(109, '2018-04-03 13:47:46', 'Login', 'billjohn@yahoo.com'),
(110, '2018-04-03 13:48:59', 'Login', 'eraldbelena@gmail.com'),
(111, '2018-04-03 15:04:16', 'Login', 'eraldbelena@gmail.com'),
(112, '2018-04-03 15:08:20', 'Login', 'eraldbelena@gmail.com'),
(113, '2018-04-03 15:10:29', 'Login', 'eraldbelena@gmail.com'),
(114, '2018-04-03 15:11:51', 'Login', 'billjohn@yahoo.com'),
(115, '2018-04-03 17:23:03', 'Login', 'cvj@gmail.com'),
(116, '2018-04-05 14:31:17', 'Login', 'cvj2@gmail.com'),
(117, '2018-04-05 14:32:18', 'Login', 'billjohn@gmail.com'),
(118, '2018-04-05 14:32:55', 'Login', 'cvj@gmail.com'),
(119, '2018-04-05 14:52:18', 'Login', 'cvj@gmail.com'),
(120, '2018-04-05 15:09:46', 'Login', 'eraldbelena@gmail.com'),
(121, '2018-04-05 15:10:17', 'Login', 'kmi.cc@credit.com'),
(122, '2018-04-07 03:05:41', 'Login', ''),
(123, '2018-04-07 03:06:35', 'Login', 'cvj@gmail.com'),
(124, '2018-04-07 03:15:51', 'Login', 'cvj@gmail.com'),
(125, '2018-04-07 03:16:10', 'Login', 'cvj@gmail.com'),
(126, '2018-04-07 03:17:08', 'Login', 'cvj@gmail.com'),
(127, '2018-04-07 03:21:05', 'Login', 'cvj@gmail.com'),
(128, '2018-04-07 03:23:43', 'Login', 'cvj@gmail.com'),
(129, '2018-04-07 03:26:27', 'Login', 'cvj@gmail.com'),
(130, '2018-04-07 03:27:18', 'Login', 'cvj@gmail.com'),
(131, '2018-04-07 03:27:23', 'Login', 'cvj@gmail.com'),
(132, '2018-04-07 03:30:48', 'Login', 'cvj@gmail.com'),
(133, '2018-04-07 03:31:29', 'Login', 'cvj@gmail.com'),
(134, '2018-04-07 03:32:17', 'Login', 'cvj@gmail.com'),
(135, '2018-04-07 03:34:38', 'Login', 'cvj@gmail.com'),
(136, '2018-04-07 03:34:43', 'Login', 'cvj@gmail.com'),
(137, '2018-04-07 03:35:37', 'Login', 'cvj@gmail.com'),
(138, '2018-04-07 03:35:48', 'Login', 'cvj@gmail.com'),
(139, '2018-04-07 03:37:22', 'Login', 'cvj@gmail.com'),
(140, '2018-04-07 03:37:38', 'Login', 'cvj@gmail.com'),
(141, '2018-04-07 03:41:04', 'Login', 'cvj@gmail.com'),
(142, '2018-04-07 14:44:49', 'Login', 'cvj@gmail.com'),
(143, '2018-04-08 15:16:07', 'Login', 'cvj@gmail.com'),
(144, '2018-04-08 15:16:27', 'Login', 'cvj@gmail.com'),
(145, '2018-04-08 15:24:34', 'Login', 'kmi.cc@credit.com'),
(146, '2018-04-08 15:28:14', 'Login', 'cvj@gmail.com'),
(147, '2018-04-08 15:33:05', 'Login', 'kmi.cc@credit.com'),
(148, '2018-04-08 15:36:35', 'Login', 'cvj@gmail.com'),
(149, '2018-04-08 15:37:14', 'Login', 'kmi.cc@credit.com'),
(150, '2018-04-08 15:37:27', 'Login', 'kmi.cc@credit.com'),
(151, '2018-04-08 15:37:57', 'Login', 'eraldbelena@gmail.com'),
(152, '2018-04-08 15:49:09', 'Login', 'kmi.cc@credit.com'),
(153, '2018-04-08 15:55:27', 'Login', 'cvj@gmail.com'),
(154, '2018-04-08 15:59:21', 'Login', 'cvj@gmail.com'),
(155, '2018-04-08 18:18:58', 'Login', 'cvj@gmail.com'),
(156, '2018-04-08 18:19:06', 'Login', 'cvj@gmail.com'),
(157, '2018-04-09 03:08:48', 'Login', 'kmi.cc@credit.com'),
(158, '2018-04-09 03:13:36', 'Login', 'cvj@gmail.com'),
(159, '2018-04-09 04:11:46', 'Login', 'eraldbelena@gmail.com'),
(160, '2018-04-09 04:12:08', 'Login', 'kmi.cc@credit.com'),
(161, '2018-04-09 04:12:18', 'Login', 'kmi.cc@credit.com'),
(162, '2018-04-09 04:13:56', 'Login', 'cvj@gmail.com'),
(163, '2018-04-09 04:15:22', 'Login', 'kmi.cc@credit.com'),
(164, '2018-04-09 04:18:45', 'Login', 'cvj@gmail.com'),
(165, '2018-04-09 04:21:04', 'Login', 'kmi.cc@credit.com'),
(166, '2018-04-09 05:18:05', 'Login', 'kmi.cc@credit.com'),
(167, '2018-04-09 05:41:01', 'Login', 'cvj@gmail.com'),
(168, '2018-04-09 14:27:42', 'Login', 'kmi.cc@credit.com'),
(169, '2018-04-09 14:27:49', 'Login', 'kmi.cc@credit.com'),
(170, '2018-04-09 14:33:53', 'Login', 'eraldbelena@gmail.com'),
(171, '2018-04-09 14:34:41', 'Login', 'cvj@gmail.com'),
(172, '2018-04-09 14:44:34', 'Login', 'kmi.cc@credit.com'),
(173, '2018-04-09 14:54:51', 'Login', 'kmi.cc@credit.com'),
(174, '2018-04-09 14:55:02', 'Login', 'cvj@gmail.com'),
(175, '2018-04-09 14:55:09', 'Login', 'eraldbelena@gmail.com'),
(176, '2018-04-09 14:57:04', 'Login', 'kmi.cc@credit.com'),
(177, '2018-04-09 14:57:09', 'Login', 'kmi.cc@credit.com'),
(178, '2018-04-09 15:13:19', 'Login', 'eraldbelena@gmail.com'),
(179, '2018-04-09 15:13:28', 'Login', 'eraldbelena@gmail.com'),
(180, '2018-04-09 15:13:33', 'Login', 'eraldbelena@gmail.com'),
(181, '2018-04-09 15:43:43', 'Login', 'cvj@gmail.com'),
(182, '2018-04-09 15:51:54', 'Login', 'eraldbelena@gmail.com'),
(183, '2018-04-09 21:12:14', 'Login', 'cvj@gmail.com'),
(184, '2018-04-09 21:14:02', 'Login', 'cvj@gmail.com'),
(185, '2018-04-09 21:14:20', 'Login', 'mindlesh13@gmail.com'),
(186, '2018-04-09 21:14:56', 'Login', 'kmi.cc@credit.com'),
(187, '2018-04-09 21:15:07', 'Login', 'kmi.cc@credit.com'),
(188, '2018-04-09 21:19:10', 'Login', 'kmi.cc@credit.com'),
(189, '2018-04-09 21:20:29', 'Login', 'kmi.cc@credit.com'),
(190, '2018-04-09 21:21:24', 'Login', 'kmi.cc@credit.com'),
(191, '2018-04-09 21:22:01', 'Login', 'mindlesh13@gmail.com'),
(192, '2018-04-09 21:23:06', 'Login', 'eraldbelena@gmail.com'),
(193, '2018-04-09 21:23:42', 'Login', 'kmi.cc@credit.com'),
(194, '2018-04-09 21:24:40', 'Login', 'cvj@gmail.com'),
(195, '2018-04-09 21:26:37', 'Login', 'cvj@gmail.com'),
(196, '2018-04-09 21:26:41', 'Login', 'cvj@gmail.com'),
(197, '2018-04-09 21:28:36', 'Login', 'kmi.cc@credit.com'),
(198, '2018-04-09 23:56:14', 'Login', 'eraldbelena@gmail.com'),
(199, '2018-04-10 01:05:57', 'Login', 'cvj@gmail.com'),
(200, '2018-04-10 01:13:25', 'Login', 'eraldbelena@gmail.com'),
(201, '2018-04-10 01:13:50', 'Login', 'cvj@gmail.com'),
(202, '2018-04-10 02:50:46', 'Login', 'eraldbelena@gmail.com'),
(203, '2018-04-10 02:52:02', 'Login', 'gg@credit.com'),
(204, '2018-04-10 02:56:49', 'Login', 'cvj@gmail.com'),
(205, '2018-04-10 02:57:37', 'Login', 'abc@gmail.com'),
(206, '2018-04-10 02:58:32', 'Login', 'mindleh13@gmail.com'),
(207, '2018-04-10 02:58:38', 'Login', 'mindleh13@gmail.com'),
(208, '2018-04-10 02:58:53', 'Login', 'mindleh13@gmail.com'),
(209, '2018-04-10 02:59:08', 'Login', 'mindlesh13@gmail.com'),
(210, '2018-04-10 03:00:10', 'Login', 'mindlesh13@gmail.com'),
(211, '2018-04-10 03:02:39', 'Login', 'mindlesh13@gmail.com'),
(212, '2018-04-10 03:03:03', 'Login', 'mindlesh13@gmail.com'),
(213, '2018-04-10 03:03:19', 'Login', 'mindlesh13@gmail.com'),
(214, '2018-04-10 03:03:41', 'Login', 'gg@credit.com'),
(215, '2018-04-10 08:53:13', 'Login', 'cvj@gmail.com'),
(216, '2018-04-13 19:50:52', 'Login', 'cvj@gmail.com'),
(217, '2018-04-13 19:51:24', 'Login', 'gg@credit.com'),
(218, '2018-04-13 19:51:31', 'Login', 'gg@credit.com'),
(219, '2018-04-13 19:54:55', 'Login', 'eraldbelena@gmail.com'),
(220, '2018-04-13 19:55:01', 'Login', 'eraldbelena@gmail.com'),
(221, '2018-04-13 19:55:53', 'Login', 'eraldbelena@gmail.com'),
(222, '2018-04-13 19:57:05', 'Login', 'eraldbelena@gmail.com'),
(223, '2018-04-13 19:57:58', 'Login', 'eraldbelena@gmail.com'),
(224, '2018-04-13 19:58:24', 'Login', 'gg@credit.com'),
(225, '2018-04-13 19:58:30', 'Login', 'gg@credit.com'),
(226, '2018-04-13 19:58:36', 'Login', 'gg@credit.com'),
(227, '2018-04-13 20:09:41', 'Login', 'eraldbelena@gmail.com'),
(228, '2018-04-13 20:09:49', 'Login', 'eraldbelena@gmail.com'),
(229, '2018-04-13 23:22:55', 'Login', 'gg@credit.com'),
(230, '2018-04-13 23:23:00', 'Login', 'gg@credit.com'),
(231, '2018-04-13 23:34:21', 'Login', 'cvj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `history_attendance`
--

CREATE TABLE `history_attendance` (
  `historyID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_attendance`
--

INSERT INTO `history_attendance` (`historyID`, `date`, `action`, `data`) VALUES
(1, '2018-04-02 11:25:07', 'Time in', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_logs`
--

CREATE TABLE `history_logs` (
  `historyID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `RegID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_logs`
--

INSERT INTO `history_logs` (`historyID`, `date`, `action`, `data`, `RegID`) VALUES
(19, '2018-04-07 16:28:55', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(20, '2018-04-07 16:29:18', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(21, '2018-04-07 16:29:26', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(22, '2018-04-07 16:32:20', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(23, '2018-04-07 16:32:36', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(24, '2018-04-07 16:32:43', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(25, '2018-04-07 16:32:46', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(26, '2018-04-07 16:34:00', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(27, '2018-04-07 21:47:25', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(28, '2018-04-07 21:51:29', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(29, '2018-04-07 21:52:30', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(30, '2018-04-07 22:05:17', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(31, '2018-04-08 19:09:58', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(32, '2018-04-08 19:15:48', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(33, '2018-04-08 19:16:24', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(34, '2018-04-08 19:30:52', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(35, '2018-04-08 19:40:23', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(36, '2018-04-08 19:42:49', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(37, '2018-04-08 19:49:41', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(38, '2018-04-08 19:57:35', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(39, '2018-04-08 19:59:57', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(40, '2018-04-09 03:41:35', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(41, '2018-04-09 03:42:49', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(42, '2018-04-09 03:44:01', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(43, '2018-04-09 03:45:51', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(44, '2018-04-09 03:46:31', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(45, '2018-04-09 03:49:28', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(46, '2018-04-09 03:50:19', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(47, '2018-04-09 03:51:00', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(48, '2018-04-09 03:53:07', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(49, '2018-04-09 04:14:12', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(50, '2018-04-09 04:19:07', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(51, '2018-04-09 05:53:10', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(52, '2018-04-09 05:58:11', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(53, '2018-04-09 06:02:40', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(54, '2018-04-09 06:11:49', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(55, '2018-04-09 21:27:14', 'Apply Loan', 'Jennesa General Seras', 'CV201700002'),
(56, '2018-04-09 23:02:46', 'Apply Loan', 'Jennesa General Seras', 'CV201700002');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(11) NOT NULL,
  `RegID` varchar(100) NOT NULL,
  `PBNo` bigint(20) NOT NULL,
  `Income` varchar(100) NOT NULL,
  `LT_ID` varchar(100) NOT NULL,
  `ComakersOne` varchar(200) NOT NULL,
  `ComakersTwo` varchar(200) NOT NULL,
  `Amount` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `Pay_ID` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BRGYPermit` varchar(100) NOT NULL DEFAULT 'empty',
  `BSNPermit` varchar(100) NOT NULL DEFAULT 'empty',
  `collateral` text NOT NULL,
  `duesent` int(11) NOT NULL DEFAULT '0',
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `RegID`, `PBNo`, `Income`, `LT_ID`, `ComakersOne`, `ComakersTwo`, `Amount`, `total`, `Pay_ID`, `date`, `BRGYPermit`, `BSNPermit`, `collateral`, `duesent`, `Status`) VALUES
(120184, 'CV201700002', 5180926136384143, '', 'loan1', 'AS201700009', 'KD201700010', 1000, '1050.00', 'p2', '2018-04-09 06:11:49', 'images/brgy.jpg', 'images/bsn.jpg', '', 1, 'Fully Paid'),
(120185, 'CV201700002', 5180926136384143, '', 'loan1', 'AS201700009', 'ME201800020', 1000, '1050.00', 'p2', '2018-04-09 09:27:14', 'images/DVD_Label_120mm_cmyk.png', 'images/150506112202-old-website-apple-1024x640.png', '', 1, 'Fully Paid'),
(120186, 'CV201700002', 5180926136384143, '', 'loan1', 'AS201700009', 'ME201800020', 1000, '1050.00', 'p4', '2018-04-09 11:02:46', 'images/ddd.png', 'images/150506112202-old-website-apple-1024x640.png', '', 1, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `LT_ID` varchar(50) NOT NULL,
  `LTDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`LT_ID`, `LTDesc`) VALUES
('loan1', 'Business Loan'),
('loan2', 'Personal Loan'),
('loan3', 'Emergency Loan');

-- --------------------------------------------------------

--
-- Table structure for table `loan_config`
--

CREATE TABLE `loan_config` (
  `l_conf` int(11) NOT NULL,
  `l_perc` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_config`
--

INSERT INTO `loan_config` (`l_conf`, `l_perc`) VALUES
(1, '0.05'),
(2, '0.10'),
(3, '0.15'),
(4, '0.20'),
(5, '0.25'),
(6, '0.30'),
(7, '0.35'),
(8, '0.40'),
(9, '0.45'),
(10, '0.50'),
(11, '0.55'),
(12, '0.60'),
(13, '0.70'),
(14, '0.75'),
(15, '0.80'),
(16, '0.85'),
(17, '0.90'),
(18, '0.95'),
(19, '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `loan_set`
--

CREATE TABLE `loan_set` (
  `RegID` varchar(100) NOT NULL,
  `ls_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_set`
--

INSERT INTO `loan_set` (`RegID`, `ls_conf`) VALUES
('AS201700009', 18),
('BS201700013', 18),
('CH201700008', 18),
('CK201700012', 18),
('CV201700002', 5),
('EM201700007', 17),
('JG201700003', 17),
('KD201700010', 17),
('KI201700001', 17),
('MK201700005', 17),
('MT201700011', 17),
('PB201700004', 17),
('WF201700006', 17);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `RegID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_fundnshare`
--

CREATE TABLE `membership_fundnshare` (
  `fnsID` int(11) NOT NULL,
  `RegID` varchar(100) NOT NULL,
  `Capital` decimal(11,2) NOT NULL,
  `Savings` decimal(11,2) NOT NULL,
  `Damayan` decimal(11,2) NOT NULL,
  `Marketing` decimal(11,2) NOT NULL,
  `HealthCare` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_fundnshare`
--

INSERT INTO `membership_fundnshare` (`fnsID`, `RegID`, `Capital`, `Savings`, `Damayan`, `Marketing`, `HealthCare`) VALUES
(1, 'CV201700002', '10000.00', '2000.00', '200.00', '3232.00', '2323.00'),
(2, 'JG201700003', '30000.00', '10000.00', '2500.00', '2500.00', '2600.00'),
(3, 'PB201700004', '3223.00', '2323.00', '2323.00', '4322.00', '3232.00'),
(4, 'MK201700005', '4000.00', '230.00', '100.00', '1200.00', '200.00'),
(5, 'WF201700006', '800.00', '200.00', '200.00', '310.00', '223.00'),
(6, 'EM201700007', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, 'CH201700008', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 'AS201700009', '0.00', '0.00', '0.00', '0.00', '0.00'),
(9, 'KD201700010', '0.00', '0.00', '0.00', '0.00', '0.00'),
(10, 'MT201700011', '0.00', '0.00', '0.00', '0.00', '0.00'),
(11, 'CK201700012', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, 'BS201700013', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, 'KI201700001', '10000.00', '5000.00', '2600.00', '2500.00', '2500.00'),
(14, 'PM201700014', '10000.00', '5000.00', '2500.00', '2500.00', '2500.00'),
(15, 'GP201700015', '20000.00', '5000.00', '2300.00', '2500.00', '3000.00'),
(16, 'qM201800026', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `LoanID` int(50) NOT NULL,
  `paid` decimal(11,2) NOT NULL,
  `date` datetime NOT NULL,
  `RegID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `LoanID`, `paid`, `date`, `RegID`) VALUES
(24, 120184, '50.00', '2018-04-09 06:20:37', 'CV201700002'),
(25, 120184, '1000.00', '2018-04-09 06:20:45', 'CV201700002'),
(26, 120185, '500.00', '2018-04-09 09:48:07', 'CV201700002'),
(27, 120185, '550.00', '2018-04-09 09:49:06', 'CV201700002');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE `paymenttype` (
  `Pay_ID` varchar(50) NOT NULL,
  `PDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `paymenttype`
--

INSERT INTO `paymenttype` (`Pay_ID`, `PDesc`) VALUES
('p1', 'Daily'),
('p2', 'Weekly'),
('p3', 'Semi Monthly'),
('p4', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `historyID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_logs`
--

INSERT INTO `payment_logs` (`historyID`, `date`, `action`, `data`) VALUES
(2, '2018-04-03 12:08:00', 'Payment', 'Nicole Tanya Luna'),
(3, '2018-04-05 14:43:03', 'Payment', ''),
(4, '2018-04-05 14:44:13', 'Payment', ''),
(5, '2018-04-07 15:27:39', 'Payment', ''),
(6, '2018-04-08 15:26:26', 'Payment', ''),
(7, '2018-04-08 15:33:09', 'Payment', ''),
(8, '2018-04-09 03:08:51', 'Payment', ''),
(9, '2018-04-09 04:15:24', 'Payment', ''),
(10, '2018-04-09 04:21:10', 'Payment', ''),
(11, '2018-04-09 04:24:13', 'Payment', ''),
(12, '2018-04-09 04:24:33', 'Payment', ''),
(13, '2018-04-09 04:25:02', 'Payment', ''),
(14, '2018-04-09 04:25:13', 'Payment', ''),
(15, '2018-04-09 04:27:38', 'Payment', ''),
(16, '2018-04-09 04:28:29', 'Payment', ''),
(17, '2018-04-09 04:29:42', 'Payment', ''),
(18, '2018-04-09 04:32:14', 'Payment', ''),
(19, '2018-04-09 04:33:35', 'Payment', ''),
(20, '2018-04-09 04:34:30', 'Payment', ''),
(21, '2018-04-09 04:55:31', 'Payment', ''),
(22, '2018-04-09 05:01:01', 'Payment', ''),
(23, '2018-04-09 05:02:00', 'Payment', ''),
(24, '2018-04-09 05:03:22', 'Payment', ''),
(25, '2018-04-09 05:05:42', 'Payment', ''),
(26, '2018-04-09 05:08:09', 'Payment', ''),
(27, '2018-04-09 05:08:22', 'Payment', ''),
(28, '2018-04-09 05:08:57', 'Payment', ''),
(29, '2018-04-09 05:16:22', 'Payment', ''),
(30, '2018-04-09 05:16:35', 'Payment', ''),
(31, '2018-04-09 05:17:07', 'Payment', ''),
(32, '2018-04-09 05:18:26', 'Payment', ''),
(33, '2018-04-09 05:19:39', 'Payment', ''),
(34, '2018-04-09 05:24:32', 'Payment', ''),
(35, '2018-04-09 05:24:46', 'Payment', ''),
(36, '2018-04-09 05:25:29', 'Payment', ''),
(37, '2018-04-09 05:25:38', 'Payment', ''),
(38, '2018-04-09 05:26:11', 'Payment', ''),
(39, '2018-04-09 05:26:39', 'Payment', ''),
(40, '2018-04-09 05:28:42', 'Payment', ''),
(41, '2018-04-09 05:30:55', 'Payment', ''),
(42, '2018-04-09 05:31:22', 'Payment', ''),
(43, '2018-04-09 05:31:42', 'Payment', ''),
(44, '2018-04-09 05:31:56', 'Payment', ''),
(45, '2018-04-09 05:32:19', 'Payment', ''),
(46, '2018-04-09 05:39:06', 'Payment', ''),
(47, '2018-04-09 05:39:17', 'Payment', ''),
(48, '2018-04-09 05:39:28', 'Payment', ''),
(49, '2018-04-09 05:39:38', 'Payment', ''),
(50, '2018-04-09 05:40:29', 'Payment', ''),
(51, '2018-04-09 05:40:38', 'Payment', ''),
(52, '2018-04-09 05:46:10', 'Payment', ''),
(53, '2018-04-09 05:47:26', 'Payment', ''),
(54, '2018-04-09 05:51:03', 'Payment', ''),
(55, '2018-04-09 05:52:28', 'Payment', ''),
(56, '2018-04-09 05:52:44', 'Payment', ''),
(57, '2018-04-09 05:54:27', 'Payment', ''),
(58, '2018-04-09 06:12:23', 'Payment', ''),
(59, '2018-04-09 06:12:49', 'Payment', ''),
(60, '2018-04-09 06:13:01', 'Payment', ''),
(61, '2018-04-09 06:18:38', 'Payment', ''),
(62, '2018-04-09 06:18:47', 'Payment', ''),
(63, '2018-04-09 06:19:21', 'Payment', ''),
(64, '2018-04-09 06:19:34', 'Payment', ''),
(65, '2018-04-09 06:20:37', 'Payment', ''),
(66, '2018-04-09 06:20:46', 'Payment', ''),
(67, '2018-04-09 14:27:52', 'Payment', ''),
(68, '2018-04-09 14:32:13', 'Payment', '');

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `penaltyID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `RegID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`penaltyID`, `amount`, `date`, `RegID`) VALUES
(27, 100, '2018-04-13', 'TT201800018'),
(28, 100, '2018-04-13', 'BS201700013'),
(29, 100, '2018-04-13', 'TT201800018');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProdID` int(11) NOT NULL,
  `ProdName` varchar(100) NOT NULL,
  `ProdDesc` varchar(200) NOT NULL,
  `CatID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProdID`, `ProdName`, `ProdDesc`, `CatID`, `image`, `Price`) VALUES
(2003, 'Bleach', 'LIQUID BLEACH is a hypochlorite bleach that kills 99% of germs. It removes tough stains, whitens and disinfects white fabrics. Can also be used for cleaning, disinfecting and deodorizing surfaces.', 1002, 'eshop inv/bleach.jpg', 60),
(2004, 'Detergent Powder', 'PREMIUM DETERGENT POWDER with SKIN CONDITIONING FORMULA is a biodegradable, high-density and all-temperature powder detergent suitable for hand washing and machine washing. It is safe for all types of', 1002, 'eshop inv/detergent-powder.jpg', 300),
(2005, 'Dishwashing Liquid', 'DISHWASHING LIQUID is a low cost phosphate free dishwashing liquid with high active degreasing formula that removes oil, grease and food residues from soiled areas. It provides outstanding cleaning pe', 1001, 'eshop inv/dishwashing-liquid.jpg', 50),
(2006, 'Fabcon', 'EXTRA STRONG PREMIUM FABRIC SOFTENER is a strong scented biodegradable fabric softener designed to make laundry soft and smooth with high retention of scent and formulated with perfume microcapsule te', 1002, 'eshop inv/fabcon.jpg', 120),
(2007, 'Liquid Hand Soap', 'LIQUID HAND SOAP has gentle formula that keeps hands clean and conditioned. It has a moisturizer that makes hands smooth after every wash and essential oil that leaves long lasting freshness to skin.', 1003, 'eshop inv/handsoap.jpg', 35),
(2008, 'Toilet Bowl Cleaner', 'TOILET BOWL CLEANER WITH MURIATIC ACID is an acid cleaner that effectively eliminates hard to remove dirt, molds, scales, rust stains and mildews on tiled and concrete surfaces. Also gets rid of water', 1001, 'eshop inv/toilet-cleaner.jpg', 68),
(2009, 'Hand Sanitizer', 'HAND SANITIZER is an alternative to hand washing with soap and water. Designed to kill 99.9% of germs. Thoroughly cleans and sanitizes skin without drying. With excellent antiseptic formula.', 1003, 'eshop inv/alcogel.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QID` int(11) NOT NULL,
  `QDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QID`, `QDesc`) VALUES
(1, 'What primary school did you attend?'),
(2, 'Who is your favorite actor, musician, or artist?'),
(3, 'What is the name of your favorite pet?'),
(4, 'What is your favorite movie?'),
(5, 'What street did you grow up on?'),
(6, 'What kind of animal do you like?'),
(7, 'Who was your favorite President?'),
(8, 'What is your secret talent/hobby?'),
(9, 'What was your first phone?'),
(10, 'What subject did you fail in school?');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `RegID` int(15) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Mname` varchar(100) NOT NULL,
  `Uname` varchar(100) NOT NULL,
  `MemDate` date NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `SOI` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `PBNO` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `verify` int(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RegID` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Mname` varchar(100) NOT NULL,
  `Uname` varchar(100) NOT NULL,
  `Pword` varchar(100) NOT NULL,
  `MemDate` datetime NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `SOI` varchar(100) NOT NULL,
  `PBNO` date NOT NULL,
  `code` int(5) NOT NULL,
  `verify` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `StreetID` int(11) NOT NULL,
  `StreetName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`StreetID`, `StreetName`) VALUES
(1, 'Adelfa'),
(2, 'AFP Rd'),
(3, 'Alley 2'),
(4, 'A. Bonifacio'),
(5, 'A. Labrador'),
(6, 'A. Luna'),
(7, 'Amethyst Street'),
(8, 'Antonio Barreon'),
(9, 'Army Rd'),
(10, 'Aurora'),
(11, 'Artesia'),
(12, 'Artillery Rd'),
(13, 'Aurora'),
(14, 'B. F. Homes Rd'),
(15, 'Besang Pass Rd'),
(16, 'Calle Siete'),
(17, 'Capas Rd'),
(18, 'Cattleya'),
(19, 'Champca'),
(20, 'Cherry Blosson'),
(21, 'Cirlo'),
(22, 'Commodore Rd'),
(23, 'Commonwealth Av'),
(24, 'Constabulary Rd'),
(25, 'Dahila'),
(26, 'Dalton Rd'),
(27, 'De Leon'),
(28, 'Don Armando'),
(29, 'Don Asterio'),
(30, 'Don Carlos'),
(31, 'Don Damaso'),
(32, 'Don Diosdado'),
(33, 'Don Doroteo'),
(34, 'Don Edilberto'),
(35, 'Don Elpidio Street'),
(36, 'Don Ernesto Street'),
(37, 'Don Faustino'),
(38, 'Don Francisco'),
(39, 'Don Gregorio'),
(40, 'Don Jose Rd'),
(41, 'Don Juan'),
(42, 'Don Mario'),
(43, 'Don Matias'),
(44, 'Don Miguel'),
(45, 'Don Narciso'),
(46, 'Don Pedro'),
(47, 'Don Pio'),
(48, 'Don Primitivo'),
(49, 'Don Rafael'),
(50, 'Don Ramon'),
(51, 'Don Ramon'),
(52, 'Don Romeo'),
(53, 'Don Senen'),
(54, 'Don Sergio'),
(55, 'Don Torribio'),
(56, 'Don Vicente'),
(57, 'Don Victorino'),
(58, 'Don Wilfredo'),
(59, 'Dona Felicidad'),
(60, 'Dona Isidora'),
(61, 'E. Ocampo'),
(62, 'Emerald Street'),
(63, 'Everlasting'),
(64, 'F. Sotto'),
(65, 'F. Ventura'),
(66, 'Faustino'),
(67, 'Florentino Chioco'),
(68, 'Fort Santiago Rd'),
(69, 'General Rd'),
(70, 'Guerilla Rd');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_no` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course` int(11) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_no`, `firstname`, `middlename`, `lastname`, `course`, `section`) VALUES
(1, '123456', 'Juan', '', 'Dela Cruz', 2147483647, 'Manalili'),
(2, '11526333', 'Jennesa', '', 'Seras', 2147483647, 'Cebu City'),
(3, 'AS201700009', 'Adriane', 'Mak', 'Schumach', 2147483647, '1560 Owen Lane, Traverse City, Michigan');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `AdminID` varchar(100) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(13) NOT NULL,
  `Pword` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`AdminID`, `Fname`, `Lname`, `Mname`, `Email`, `Contact`, `Pword`, `isActive`) VALUES
('JEN777', 'Jennesa', 'Seras', 'General', 'jennesa@gmail.com', '09303459331', 'jennesa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL,
  `account_no` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `account_no`, `time`, `date`) VALUES
(128, 'aa201800027', '22:50:07', '2018-04-13'),
(129, 'FA201800018', '22:50:07', '2018-04-13'),
(130, 'EB201800022', '22:50:07', '2018-04-13'),
(131, 'KD201700010', '22:50:07', '2018-04-13'),
(132, 'VE201800023', '22:50:07', '2018-04-13'),
(133, 'ME201800020', '22:50:07', '2018-04-13'),
(134, 'WF201700006', '22:50:07', '2018-04-13'),
(135, 'NF201800021', '22:50:07', '2018-04-13'),
(136, 'JG201700003', '22:50:07', '2018-04-13'),
(137, 'JG201800016', '22:50:07', '2018-04-13'),
(138, 'CH201700008', '22:50:07', '2018-04-13'),
(139, 'KI201700001', '22:50:07', '2018-04-13'),
(140, 'BJ201800019', '22:50:07', '2018-04-13'),
(141, 'CK201700012', '22:50:07', '2018-04-13'),
(142, 'rl201800024', '22:50:07', '2018-04-13'),
(143, 'rl201800025', '22:50:07', '2018-04-13'),
(144, 'EM201700007', '22:50:07', '2018-04-13'),
(145, 'qM201800026', '22:50:07', '2018-04-13'),
(146, 'GP201700015', '22:50:07', '2018-04-13'),
(147, 'AS201700009', '22:50:07', '2018-04-13'),
(148, 'MK201700005', '22:50:07', '2018-04-13'),
(149, 'MT201700011', '22:50:07', '2018-04-13'),
(150, 'PB201700004', '22:50:07', '2018-04-13'),
(151, 'PM201700014', '22:50:07', '2018-04-13'),
(152, 'CV201700002', '22:50:07', '2018-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`RegID`),
  ADD KEY `QIDone` (`QIDone`),
  ADD KEY `QIDtwo` (`QIDtwo`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `archive_useractive`
--
ALTER TABLE `archive_useractive`
  ADD PRIMARY KEY (`Archive_UAID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `credit_comm`
--
ALTER TABLE `credit_comm`
  ADD PRIMARY KEY (`CreditID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `history_attendance`
--
ALTER TABLE `history_attendance`
  ADD PRIMARY KEY (`historyID`);

--
-- Indexes for table `history_logs`
--
ALTER TABLE `history_logs`
  ADD PRIMARY KEY (`historyID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `RegID` (`RegID`),
  ADD KEY `LT_ID` (`LT_ID`),
  ADD KEY `Pay_ID` (`Pay_ID`);

--
-- Indexes for table `loantype`
--
ALTER TABLE `loantype`
  ADD PRIMARY KEY (`LT_ID`);

--
-- Indexes for table `loan_config`
--
ALTER TABLE `loan_config`
  ADD PRIMARY KEY (`l_conf`);

--
-- Indexes for table `loan_set`
--
ALTER TABLE `loan_set`
  ADD KEY `RegID` (`RegID`),
  ADD KEY `ls_conf` (`ls_conf`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `membership_fundnshare`
--
ALTER TABLE `membership_fundnshare`
  ADD PRIMARY KEY (`fnsID`),
  ADD KEY `RegID` (`RegID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `LoanID` (`LoanID`),
  ADD KEY `RegID` (`RegID`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`historyID`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`penaltyID`),
  ADD KEY `RegID` (`RegID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProdID`),
  ADD KEY `CatID` (`CatID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive_useractive`
--
ALTER TABLE `archive_useractive`
  MODIFY `Archive_UAID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `history_attendance`
--
ALTER TABLE `history_attendance`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_logs`
--
ALTER TABLE `history_logs`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120187;

--
-- AUTO_INCREMENT for table `loan_config`
--
ALTER TABLE `loan_config`
  MODIFY `l_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `RegID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_fundnshare`
--
ALTER TABLE `membership_fundnshare`
  MODIFY `fnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `penaltyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `RegID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RegID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`QIDone`) REFERENCES `questions` (`QID`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`QIDtwo`) REFERENCES `questions` (`QID`);

--
-- Constraints for table `archive_useractive`
--
ALTER TABLE `archive_useractive`
  ADD CONSTRAINT `archive_useractive_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `accounts` (`RegID`),
  ADD CONSTRAINT `archive_useractive_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`RegID`) REFERENCES `accounts` (`RegID`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`LT_ID`) REFERENCES `loantype` (`LT_ID`),
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`Pay_ID`) REFERENCES `paymenttype` (`Pay_ID`);

--
-- Constraints for table `loan_set`
--
ALTER TABLE `loan_set`
  ADD CONSTRAINT `loan_set_ibfk_1` FOREIGN KEY (`RegID`) REFERENCES `accounts` (`RegID`),
  ADD CONSTRAINT `loan_set_ibfk_2` FOREIGN KEY (`ls_conf`) REFERENCES `loan_config` (`l_conf`);

--
-- Constraints for table `membership_fundnshare`
--
ALTER TABLE `membership_fundnshare`
  ADD CONSTRAINT `membership_fundnshare_ibfk_1` FOREIGN KEY (`RegID`) REFERENCES `accounts` (`RegID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`LoanID`) REFERENCES `loan` (`LoanID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`RegID`) REFERENCES `accounts` (`RegID`);

--
-- Constraints for table `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_ibfk_1` FOREIGN KEY (`RegID`) REFERENCES `accounts` (`RegID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CatID`) REFERENCES `categories` (`CatID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
