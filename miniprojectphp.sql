-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 03:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniprojectphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bac`
--

CREATE TABLE `bac` (
  `code_bac` int(11) NOT NULL,
  `lib_bac` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bac`
--

INSERT INTO `bac` (`code_bac`, `lib_bac`) VALUES
(1, 'Science math A'),
(3, 'Science la vie et la terre'),
(4, 'Science math B');

-- --------------------------------------------------------

--
-- Table structure for table `bac_etd`
--

CREATE TABLE `bac_etd` (
  `code_bac_etd` int(11) NOT NULL,
  `annee_obt_bac` date DEFAULT NULL,
  `code_etd` int(11) DEFAULT NULL,
  `code_bac` int(11) DEFAULT NULL,
  `code_men` int(11) DEFAULT NULL,
  `code_etb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bac_etd`
--

INSERT INTO `bac_etd` (`code_bac_etd`, `annee_obt_bac`, `code_etd`, `code_bac`, `code_men`, `code_etb`) VALUES
(2, '2020-07-05', 2, 4, 4, 4),
(6, '2022-03-09', 15, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE `etablissement` (
  `code_etb` int(11) NOT NULL,
  `lib_etb` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`code_etb`, `lib_etb`) VALUES
(1, 'Lycée Ibn Sina'),
(2, 'Lycée Mansour Dahbi'),
(3, 'Lycée Allal fasi'),
(4, 'Lycée Wahda');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `code_etd` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `situation_familiale` varchar(15) DEFAULT NULL,
  `cne` varchar(10) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `code_province` int(11) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `ville_naissance` varchar(50) NOT NULL,
  `cin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`code_etd`, `nom`, `prenom`, `sexe`, `date_naissance`, `situation_familiale`, `cne`, `adresse`, `code_province`, `tel`, `ville_naissance`, `cin`) VALUES
(2, 'Abdallah', 'El Montaser', 'Mas', '2002-12-03', 'Celebataire', 'S136272371', 'Fés', 2, '0622554466', 'Fés', 'ZT147895'),
(15, 'Osama', 'Jebbari', 'Mas', '0000-00-00', 'Celebataire', 'S32145697', '', NULL, '', '', ''),
(34, 'nasser', 'amimi', 'Mas', '2002-03-13', 'Celebataire', 'S131208025', 'Fés', 1, '0622554466', 'Fés', 'AT302569');

-- --------------------------------------------------------

--
-- Table structure for table `mention`
--

CREATE TABLE `mention` (
  `code_men` int(11) NOT NULL,
  `lib_men` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mention`
--

INSERT INTO `mention` (`code_men`, `lib_men`) VALUES
(1, 'Passable'),
(2, 'Assez bien'),
(3, 'Bien'),
(4, 'Trés bien');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `code_province` int(11) NOT NULL,
  `lib_province` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`code_province`, `lib_province`) VALUES
(1, 'taounate'),
(2, 'fes'),
(3, 'meknes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bac`
--
ALTER TABLE `bac`
  ADD PRIMARY KEY (`code_bac`);

--
-- Indexes for table `bac_etd`
--
ALTER TABLE `bac_etd`
  ADD PRIMARY KEY (`code_bac_etd`),
  ADD KEY `code_bac` (`code_bac`),
  ADD KEY `code_etb` (`code_etb`),
  ADD KEY `code_men` (`code_men`),
  ADD KEY `code_etd` (`code_etd`);

--
-- Indexes for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`code_etb`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`code_etd`),
  ADD KEY `code_province` (`code_province`);

--
-- Indexes for table `mention`
--
ALTER TABLE `mention`
  ADD PRIMARY KEY (`code_men`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`code_province`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bac_etd`
--
ALTER TABLE `bac_etd`
  MODIFY `code_bac_etd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `code_etd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bac_etd`
--
ALTER TABLE `bac_etd`
  ADD CONSTRAINT `bac_etd_ibfk_2` FOREIGN KEY (`code_bac`) REFERENCES `bac` (`code_bac`),
  ADD CONSTRAINT `bac_etd_ibfk_3` FOREIGN KEY (`code_etb`) REFERENCES `etablissement` (`code_etb`),
  ADD CONSTRAINT `bac_etd_ibfk_4` FOREIGN KEY (`code_men`) REFERENCES `mention` (`code_men`),
  ADD CONSTRAINT `bac_etd_ibfk_5` FOREIGN KEY (`code_etd`) REFERENCES `etudiant` (`code_etd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`code_province`) REFERENCES `province` (`code_province`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
