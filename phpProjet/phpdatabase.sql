-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 06:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `code`, `nom`) VALUES
(1, 'GI', 'classe 2019'),
(2, 'ISIC', 'classe 2019'),
(3, '2ITE', 'classe 2019'),
(4, 'GEE', 'classe2019'),
(6, 'GI', 'classe 2018'),
(7, 'GEE', 'classe 2018'),
(8, 'GEE', 'classe 2017'),
(9, 'GI', 'classe 2020'),
(10, 'ISIC', 'classe 2020'),
(11, '2ITE', 'classe 2020'),
(12, 'GEE', 'classe 2020'),
(13, 'GI', 'classe 2021'),
(14, 'ISIC', 'classe 2021'),
(15, '2ITE', 'classe 2021'),
(16, 'GI', 'classe 2021'),
(17, 'GC', 'classe 2021');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `classe` int(11) NOT NULL,
  `filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`cin`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `password`, `role`, `photo`, `classe`, `filiere`) VALUES
('BB123456', 'Sorour', 'Soufiane', 'soufiane_sorour@hotmail.com', '0688180506', 'Hay chrifa', 'ad6dfb37902333874fb367626a187f76', 'Admin', '5f727e9d8c0bbb30b046cf94d1d9a9f1.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `code`, `libelle`) VALUES
(1, 'GI', 'Genie industriel'),
(2, 'ISIC', 'Genie resau telecom'),
(3, '2ITE', 'Genie informatique'),
(4, 'GEE', 'Genie electrique energitique'),
(5, 'GC', 'Genie civile');

-- --------------------------------------------------------

--
-- Table structure for table `pointage`
--

CREATE TABLE `pointage` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `employe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pointage`
--

INSERT INTO `pointage` (`id`, `date`, `etat`, `employe`) VALUES
(8, '2018-12-27 10:00:00', 'Entrer', 'EE819349'),
(12, '2018-12-27 18:30:00', 'Sortie', 'EE819349'),
(13, '2018-12-28 08:00:00', 'Entrer', 'EE55021'),
(14, '2018-12-28 16:30:00', 'Sortie', 'EE55021'),
(15, '2019-01-01 08:30:00', 'Entrer', 'EE60601'),
(16, '2019-01-01 18:00:00', 'Sortie', 'EE60601'),
(17, '2019-01-03 09:04:00', 'Entrer', 'EE60601'),
(18, '2019-01-03 15:04:00', 'Sortie', 'EE60601'),
(19, '2018-12-30 09:15:00', 'Entrer', 'EE819349'),
(20, '2018-12-30 05:33:00', 'Sortie', 'EE819349'),
(21, '2018-12-12 12:00:00', 'Entrer', 'EE55021'),
(22, '2019-01-09 08:00:00', 'Entrer', 'EE55021'),
(23, '2019-01-09 12:00:00', 'Sortie', 'EE55021'),
(24, '2019-01-08 08:00:00', 'Entrer', 'EE55021'),
(25, '2019-01-08 11:30:00', 'Sortie', 'EE55021');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pointageh`
-- (See below for the actual view)
--
CREATE TABLE `pointageh` (
`nom` varchar(50)
,`prenom` varchar(50)
,`date` date
,`cin` varchar(50)
,`heure_entrer` time
,`heure_sortie` time
,`heure` int(2)
,`minute` int(2)
);

-- --------------------------------------------------------

--
-- Structure for view `pointageh`
--
DROP TABLE IF EXISTS `pointageh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `pointageh`  AS SELECT `e`.`nom` AS `nom`, `e`.`prenom` AS `prenom`, cast(`p1`.`date` as date) AS `date`, `p1`.`employe` AS `cin`, cast(`p1`.`date` as time) AS `heure_entrer`, cast(`p2`.`date` as time) AS `heure_sortie`, hour(timediff(`p2`.`date`,`p1`.`date`)) AS `heure`, minute(timediff(`p2`.`date`,`p1`.`date`)) AS `minute` FROM ((`pointage` `p1` join `pointage` `p2` on(`p1`.`employe` = `p2`.`employe`)) join `employe` `e` on(`e`.`cin` = `p1`.`employe`)) WHERE cast(`p1`.`date` as date) = cast(`p2`.`date` as date) AND `p1`.`id` < `p2`.`id` GROUP BY cast(`p1`.`date` as date), `p1`.`employe`, `e`.`nom`, `e`.`prenom` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `classe` (`classe`),
  ADD KEY `filiere` (`filiere`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe` (`employe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`filiere`) REFERENCES `filiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
