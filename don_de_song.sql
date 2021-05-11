-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 mai 2020 à 17:14
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
-- Base de données :  `don_de_song`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresse`
--

DROP TABLE IF EXISTS `addresse`;
CREATE TABLE IF NOT EXISTS `addresse` (
  `id_add` int(11) NOT NULL,
  `lat` int(11) NOT NULL,
  `lng` int(11) NOT NULL,
  `label` varchar(225) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `tab` varchar(22) NOT NULL,
  `dat_save` date NOT NULL,
  `id_co` int(11) NOT NULL,
  `id_don` int(11) NOT NULL,
  `id_ad` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `id_coo` int(11) NOT NULL,
  `id_ee` int(11) NOT NULL,
  PRIMARY KEY (`id_add`),
  KEY `id_ee` (`id_ee`),
  KEY `id_coo` (`id_coo`),
  KEY `id_e` (`id_e`),
  KEY `id_ad` (`id_ad`),
  KEY `id_don` (`id_don`),
  KEY `id_co` (`id_co`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `date_update` date NOT NULL,
  `date_save` date NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appel`
--

DROP TABLE IF EXISTS `appel`;
CREATE TABLE IF NOT EXISTS `appel` (
  `id_a` int(11) NOT NULL,
  `groupage` varchar(255) NOT NULL,
  `rhesuse` varchar(255) NOT NULL,
  `image` varchar(225) NOT NULL,
  `itablissement` varchar(20) NOT NULL,
  `service` varchar(22) NOT NULL,
  `type_sang` varchar(22) NOT NULL,
  `date_save` date NOT NULL,
  `id_don` int(11) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `id_don` (`id_don`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chatter`
--

DROP TABLE IF EXISTS `chatter`;
CREATE TABLE IF NOT EXISTS `chatter` (
  `date` date NOT NULL,
  `heur` date NOT NULL,
  `message` text NOT NULL,
  `file_url` varchar(225) NOT NULL,
  `statu` varchar(20) NOT NULL,
  `id_don` int(11) NOT NULL,
  KEY `id_don` (`id_don`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `Iid_co` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `codepostal` int(11) NOT NULL,
  PRIMARY KEY (`Iid_co`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consulter`
--

DROP TABLE IF EXISTS `consulter`;
CREATE TABLE IF NOT EXISTS `consulter` (
  `id_con` int(11) NOT NULL,
  `id_don` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  KEY `id_a` (`id_a`),
  KEY `id_don` (`id_don`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donneur`
--

DROP TABLE IF EXISTS `donneur`;
CREATE TABLE IF NOT EXISTS `donneur` (
  `id_don` int(11) NOT NULL,
  `groupage` varchar(25) NOT NULL,
  `rhesus` varchar(25) NOT NULL,
  `kell` varchar(22) NOT NULL,
  `phynotypage` varchar(20) NOT NULL,
  `type_donneur` varchar(20) NOT NULL,
  `statu` varchar(22) NOT NULL,
  `date_dernier_donnation` date NOT NULL,
  `date_save` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_e` int(11) NOT NULL,
  `url` varchar(22) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `statu` varchar(22) NOT NULL,
  `id_ad` int(11) NOT NULL,
  `id_par` int(11) NOT NULL,
  PRIMARY KEY (`id_e`),
  KEY `id_ad` (`id_ad`),
  KEY `id_par` (`id_par`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_l` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_l`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_l`, `user`, `pass`) VALUES
(1, 'yasin', 'passpower'),
(2, 'ABDLAH', 'JQFFUYQGZKDGQUSUOH'),
(3, 'RIDA', 'HELOWORLD');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_no` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `statu` varchar(20) NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `id_don` int(11) NOT NULL,
  PRIMARY KEY (`id_no`),
  KEY `id_ad` (`id_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id_par` int(11) NOT NULL,
  `scoci_name` varchar(255) NOT NULL,
  `scoci_type` varchar(255) NOT NULL,
  `scoci_lieu` varchar(225) NOT NULL,
  PRIMARY KEY (`id_par`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
