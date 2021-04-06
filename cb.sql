-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 02:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cb`
--

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `ID` int(11) NOT NULL,
  `UID` varchar(9) NOT NULL,
  `MODEL` varchar(3) NOT NULL,
  `SEQ` varchar(10) DEFAULT 'N/A',
  `BODY_NO` varchar(6) DEFAULT 'N/A',
  `PART_NAME` varchar(20) NOT NULL,
  `PART_NO` varchar(20) DEFAULT 'N/A',
  `O_PLACE` varchar(25) NOT NULL,
  `PROBLEM_DES` text NOT NULL,
  `RESPONSIBLE` varchar(20) DEFAULT 'N/A',
  `DATE` datetime NOT NULL,
  `WHO` varchar(7) NOT NULL,
  `SHIFT` char(1) NOT NULL,
  `HOUSE` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defect`
--

INSERT INTO `defect` (`ID`, `UID`, `MODEL`, `SEQ`, `BODY_NO`, `PART_NAME`, `PART_NO`, `O_PLACE`, `PROBLEM_DES`, `RESPONSIBLE`, `DATE`, `WHO`, `SHIFT`, `HOUSE`) VALUES
(17, 'M00000001', 'DWF', 'asda', '123456', 'ASD', 'SDASD', 'Asdas', 'asdas', '', '2020-04-15 12:31:05', '3101719', 'A', ''),
(18, 'M00000002', 'DWF', 'asda', '123456', 'ASD', 'SDASD', 'Asdas', 'asdas', '', '2020-04-15 12:32:23', '3101719', 'A', 'M'),
(19, 'M00000003', 'DWF', '1234', '', 'SDA', 'ASDASDASDA', 'Asdas', 'asdasdasd', '', '2020-04-15 13:01:07', '3101719', 'A', 'M'),
(20, 'M00000004', 'DWF', '1234', '', 'SDASD', '', 'Electrical Repair', 'asdasd', 'asdas', '2020-04-15 13:17:15', '3101719', 'A', 'M'),
(21, 'O00000001', 'DWF', 'N/A', '123456', 'SDFSDF', '', 'Electrical Repair', 'asd asd asdas.', 'N/A', '2020-04-15 13:23:43', '3101719', 'A', 'O'),
(22, 'O00000002', 'F3F', 'N/A', '123456', 'CLUSTER', '81905-F2250', 'Electrical Repair', 'There was something wrong.', 'N/A', '2020-04-15 18:22:15', '3101719', 'B', 'O'),
(23, 'M00000005', 'F3F', '1234', '123456', 'CLUSTER', '81905-F2250', 'CP-26', 'There was something really serious.', 'Denso', '2020-04-15 18:23:57', '3101719', 'B', 'M'),
(24, 'O00000003', 'DWF', 'N/A', '123456', 'CLUSTER', '81905-F2220', 'Electrical Repair', 'There is something wrong.', 'N/A', '2020-04-15 18:29:49', '3101719', 'B', 'O'),
(25, 'O00000004', 'F3F', 'N/A', '123456', 'DVSD', '', 'Dfddv', 'dvxdv', 'N/A', '2020-04-15 20:32:44', '3101719', 'B', 'O'),
(26, 'M00000006', 'DWF', '1345', '', 'CLUSTER', '', 'CP-26', 'Something wrong.', '', '2020-04-26 22:43:39', '3101719', 'C', 'M'),
(27, 'M00000007', 'DWF', '1345', '', 'CLUSTER', '', 'CP-26', 'Something wrong.', '', '2020-04-26 22:47:08', '3101719', 'C', 'M'),
(28, 'M00000008', 'F3F', '7896', '', 'SCZ', '', 'Zxczxc', 'zxczxczxcz', 'zxc', '2020-04-26 22:47:54', '3101719', 'C', 'M'),
(29, 'M00000009', 'F3F', '7896', '', 'SCZ', '', 'Zxczxc', 'zxczxczxcz', 'zxc', '2020-04-26 22:50:08', '3101719', 'C', 'M'),
(30, 'M00000010', 'F3F', '7896', '', 'SCZ', '', 'Zxczxc', 'zxczxczxcz', 'zxc', '2020-04-26 22:50:36', '3101719', 'C', 'M'),
(31, 'M00000011', 'DWF', '1234', '', 'DZC', '', 'Zcd', 'zdczsd', '', '2020-04-26 22:54:24', '3101719', 'C', 'M'),
(32, 'M00000012', 'DWF', '1234', '', 'DZC', '', 'Zcd', 'zdczsd', '', '2020-04-26 23:14:16', '3101719', 'C', 'M'),
(33, 'M00000013', 'DWF', '1234', '', 'ASDA', '', 'Asdas', 'asdasdas', 'asdas', '2020-04-26 23:14:53', '3101719', 'C', 'M'),
(34, 'M00000014', 'DWF', '1234', '', 'ASDA', '', 'Asdas', 'asdasdas', 'asdas', '2020-04-26 23:16:20', '3101719', 'C', 'M'),
(35, 'M00000015', 'DWF', '1234', '', 'ASDA', '', 'Asdas', 'asdasdas', 'asdas', '2020-04-26 23:22:28', '3101719', 'C', 'M'),
(36, 'M00000016', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:22:41', '3101719', 'C', 'M'),
(37, 'M00000017', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:23:28', '3101719', 'C', 'M'),
(38, 'M00000018', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:24:23', '3101719', 'C', 'M'),
(39, 'M00000019', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:24:37', '3101719', 'C', 'M'),
(40, 'M00000020', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:29:04', '3101719', 'C', 'M'),
(41, 'M00000021', 'DWF', '1234', '', 'SADAS', '', 'Asd', 'asdasd', 'asd', '2020-04-26 23:29:33', '3101719', 'C', 'M'),
(42, 'M00000022', 'F3F', '1234', '', 'ASDAS', '', 'Asdasd', 'asdasd', '', '2020-04-26 23:30:56', '3101719', 'C', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `defect_files`
--

CREATE TABLE `defect_files` (
  `ID` int(11) NOT NULL,
  `UID` varchar(9) NOT NULL,
  `PATH` varchar(45) NOT NULL,
  `FILE_NAME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defect_files`
--

INSERT INTO `defect_files` (`ID`, `UID`, `PATH`, `FILE_NAME`) VALUES
(36, 'M00000012', 'Array[0]', 'Array[0]'),
(37, 'M00000013', 'Array[0]', 'Array[0]'),
(38, 'M00000001', 'somethdong', 'sdasda'),
(39, 'M00000015', 'Array[0]', 'Array[0]'),
(40, 'M00000016', 'Array[0]', 'Array[0]'),
(41, 'M00000022', 'Array[0]', 'Array[0]');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `ID` int(11) NOT NULL,
  `PROJECT_NAME` varchar(5) NOT NULL,
  `BODY_3C` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`ID`, `PROJECT_NAME`, `BODY_3C`) VALUES
(1, 'ADa', 'F3F'),
(2, 'DN8a', 'DWF'),
(3, 'TMa', 'S2A');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `ID` int(11) NOT NULL,
  `E_ID` varchar(7) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DEP` varchar(2) NOT NULL,
  `P_PIC` varchar(20) NOT NULL DEFAULT 'no_pic',
  `AUTH` int(11) NOT NULL,
  `EMAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`ID`, `E_ID`, `PASSWORD`, `NAME`, `DEP`, `P_PIC`, `AUTH`, `EMAIL`) VALUES
(1, '3101719', 'mi1719qc%', 'M. Ali Ipsuz', 'QC', 'no_pic', 1, 'mehmet.ipsuz@gmobis.com'),
(2, '3101718', '1234', 'Isadore Andrew', 'QC', 'no_pic', 1, 'isadore.andrew@gmobis.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UID` (`UID`),
  ADD KEY `MODEL` (`MODEL`),
  ADD KEY `WHO` (`WHO`);

--
-- Indexes for table `defect_files`
--
ALTER TABLE `defect_files`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BODY_3C` (`BODY_3C`),
  ADD UNIQUE KEY `PROJECT_NAME` (`PROJECT_NAME`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `E_ID` (`E_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defect`
--
ALTER TABLE `defect`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `defect_files`
--
ALTER TABLE `defect_files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `defect`
--
ALTER TABLE `defect`
  ADD CONSTRAINT `defect_ibfk_1` FOREIGN KEY (`WHO`) REFERENCES `people` (`E_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `defect_ibfk_2` FOREIGN KEY (`MODEL`) REFERENCES `model` (`BODY_3C`) ON UPDATE CASCADE;

--
-- Constraints for table `defect_files`
--
ALTER TABLE `defect_files`
  ADD CONSTRAINT `defect_files_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `defect` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
