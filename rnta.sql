-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 07:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rnta`
--

-- --------------------------------------------------------

--
-- Table structure for table `aradhiyin`
--

CREATE TABLE `aradhiyin` (
  `dateL` datetime NOT NULL,
  `metheka` int(50) NOT NULL,
  `nb` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aradhiyin`
--

INSERT INTO `aradhiyin` (`dateL`, `metheka`, `nb`, `total`) VALUES
('2024-01-26 13:50:33', 280, 7, 280);

-- --------------------------------------------------------

--
-- Table structure for table `cristal`
--

CREATE TABLE `cristal` (
  `idC` varchar(11) NOT NULL,
  `dateC` date NOT NULL,
  `quentiteC` int(11) NOT NULL,
  `retoueC` int(11) NOT NULL,
  `totalC` int(11) NOT NULL,
  `whayC` varchar(110) NOT NULL,
  `debutC` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kbatha`
--

CREATE TABLE `kbatha` (
  `dateL` datetime NOT NULL,
  `methekaL` int(50) NOT NULL,
  `nbL` int(50) NOT NULL,
  `totalL` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legere`
--

CREATE TABLE `legere` (
  `idL` varchar(11) NOT NULL,
  `dateL` date NOT NULL,
  `quentiteL` int(11) NOT NULL,
  `retoueL` int(11) NOT NULL,
  `totalL` int(11) NOT NULL,
  `whayL` varchar(10000) NOT NULL,
  `debutL` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `legere`
--

INSERT INTO `legere` (`idL`, `dateL`, `quentiteL`, `retoueL`, `totalL`, `whayL`, `debutL`) VALUES
('019/24', '2024-01-04', 80000, 0, 80000, '', 320000),
('080/24', '2024-01-08', 50000, 90, 50090, 'مداقة خاصة بالعون عبد الكريم الكحلاويرقم 3353 بعنوان شهر اوت 2023 تم \n استرجاعها من مركز التوزيع بقصر سعيد', 370090),
('384', '2023-12-13', 80000, 0, 80000, '', 80000),
('392', '2023-12-20', 80000, 0, 80000, '', 160000),
('396', '2023-12-25', 80000, 0, 80000, '', 240000);

-- --------------------------------------------------------

--
-- Table structure for table `majlech`
--

CREATE TABLE `majlech` (
  `dateL` datetime NOT NULL,
  `metheka` int(50) NOT NULL,
  `nb` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metkadin`
--

CREATE TABLE `metkadin` (
  `dateL` datetime NOT NULL,
  `metheka` int(50) NOT NULL,
  `nb` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metkadin`
--

INSERT INTO `metkadin` (`dateL`, `metheka`, `nb`, `total`) VALUES
('2024-01-26 13:48:08', 88970, 1271, 89040),
('2024-01-26 13:49:09', 0, 0, 70),
('2024-01-26 13:49:57', 0, 0, 3990),
('2024-01-29 12:43:08', 0, 0, 5000),
('2024-01-29 12:43:25', 0, 0, 5000),
('2024-01-29 13:59:24', 0, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `mobechirinc`
--

CREATE TABLE `mobechirinc` (
  `dateL` datetime NOT NULL,
  `methekaC` int(50) NOT NULL,
  `horas` int(50) NOT NULL,
  `nbC` int(50) NOT NULL,
  `totalC` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobechirinc`
--

INSERT INTO `mobechirinc` (`dateL`, `methekaC`, `horas`, `nbC`, `totalC`) VALUES
('2024-01-26 13:45:28', 0, 0, 0, 0),
('2024-01-26 13:46:08', 0, 0, 0, 0),
('2024-01-26 13:46:54', 0, 0, 0, 0),
('2024-01-29 12:41:08', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobechirinl`
--

CREATE TABLE `mobechirinl` (
  `dateL` datetime NOT NULL,
  `methekaL` int(50) NOT NULL,
  `mowezna1L` int(50) NOT NULL,
  `mowezna2L` int(50) NOT NULL,
  `nbL` int(50) NOT NULL,
  `totalL` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobechirinl`
--

INSERT INTO `mobechirinl` (`dateL`, `methekaL`, `mowezna1L`, `mowezna2L`, `nbL`, `totalL`) VALUES
('2024-01-26 13:45:28', 134792, 134792, 133800, 1363, 268592);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `dateL` date NOT NULL,
  `quentite` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`dateL`, `quentite`) VALUES
('2023-12-11', 156443),
('2024-01-11', 163928);

-- --------------------------------------------------------

--
-- Table structure for table `stock1`
--

CREATE TABLE `stock1` (
  `dateL` datetime NOT NULL,
  `quentite` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock1`
--

INSERT INTO `stock1` (`dateL`, `quentite`) VALUES
('2023-12-11 13:30:48', 2725);

-- --------------------------------------------------------

--
-- Table structure for table `tethkirc`
--

CREATE TABLE `tethkirc` (
  `dateL` datetime NOT NULL,
  `nomC` varchar(50) NOT NULL,
  `matriculeC` int(50) NOT NULL,
  `quentiteC` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tethkirc`
--

INSERT INTO `tethkirc` (`dateL`, `nomC`, `matriculeC`, `quentiteC`) VALUES
('2024-01-26 13:45:28', '', 0, 0),
('2024-01-26 13:46:08', '', 0, 0),
('2024-01-26 13:46:54', '', 0, 0),
('2024-01-29 12:41:08', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tethkirl`
--

CREATE TABLE `tethkirl` (
  `dateL` datetime NOT NULL,
  `nomL` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `matriculeL` varchar(11) NOT NULL,
  `quentiteL` int(11) NOT NULL,
  `adresse` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tethkirl`
--

INSERT INTO `tethkirl` (`dateL`, `nomL`, `matriculeL`, `quentiteL`, `adresse`) VALUES
('2024-01-29 13:59:24', 'على بن صالح', '0055', 4130, 'MT'),
('2024-01-29 14:14:21', 'محسن', '7410', 633, 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aradhiyin`
--
ALTER TABLE `aradhiyin`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `cristal`
--
ALTER TABLE `cristal`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `kbatha`
--
ALTER TABLE `kbatha`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `legere`
--
ALTER TABLE `legere`
  ADD PRIMARY KEY (`idL`);

--
-- Indexes for table `majlech`
--
ALTER TABLE `majlech`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `metkadin`
--
ALTER TABLE `metkadin`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `mobechirinc`
--
ALTER TABLE `mobechirinc`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `mobechirinl`
--
ALTER TABLE `mobechirinl`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `stock1`
--
ALTER TABLE `stock1`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `tethkirc`
--
ALTER TABLE `tethkirc`
  ADD PRIMARY KEY (`dateL`);

--
-- Indexes for table `tethkirl`
--
ALTER TABLE `tethkirl`
  ADD PRIMARY KEY (`dateL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
