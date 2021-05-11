-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 mai 2020 à 15:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `donneurs`
--

DROP TABLE IF EXISTS `donneurs`;
CREATE TABLE IF NOT EXISTS `donneurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `tel` varchar(22) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `groupage` varchar(22) CHARACTER SET latin2 NOT NULL,
  `rhesus` varchar(22) NOT NULL,
  `kell` varchar(22) NOT NULL,
  `phynotypage` varchar(22) NOT NULL,
  `type_donneur` varchar(22) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donneurs`
--

INSERT INTO `donneurs` (`id`, `username`, `password`, `email`, `created_at`, `tel`, `groupage`, `rhesus`, `kell`, `phynotypage`, `type_donneur`) VALUES
(14, 'yasin', '$2y$10$f9xJjyzSsTpW7RO8MOi28u8BZvk9ZaiBee3ERXUy2TWvKkKofcn32', 'yassinaithamid@gmail.com', '2020-05-15 18:15:39', '', '', '', '', '', ''),
(17, 'abdllah', '$2y$10$StUpA1U6OBGAyE8VF4Hqi.iXDJXXVd8YdgEa73xe1J6T4bVCItgvK', 'abdllah@gmail.com', '2020-05-16 14:44:22', '0651168813', 'B-positive', 'RH+', 'K+', 'CCEE', 'Don de plasma.'),
(18, 'arrow', '$2y$10$xkh6mRQlj7XNcwsWTcyELecOx9ikk05CKazH2FDloMbi9VWUJy.3y', 'helloworl@gmail.com', '2020-05-16 14:57:14', '06515243562', 'AB-positive', 'RH-', 'F-', 'CCEE', 'Don par aphÃ©rÃ¨se');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
